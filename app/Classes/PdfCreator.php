<?php

namespace App\Classes;

use App\Catalog;
use App\Link;
use PHPHtmlParser\Dom;
use Storage;

class PdfCreator
{
    /**
     * List of links to scrap for each school.
     *
     * @var array
     */
    protected $links;

    /**
     * Unique ID for PDF
     * @var string
     */
    protected $uid;

    /**
     * undergraduate or graduate school
     * @var string
     */
    protected $school;

    /**
     * the year for the catalog currenting being created
     * @var [type]
     */
    protected $year;
    /**
     * Initializes class.
     *
     * @param string $school
     */
    public function __construct($school = 'undergraduate', $year = null)
    {
        ($year == null) ? $this->year = date('Y') : $this->year = $year;
        $this->school                 = $school;
        $this->links                  = Link::where('type', '=', $school)
                                        ->where('start_year', '=', $this->year)
                                        ->get();
    }

    /**
     * Generates minimized html file ready for PDF conversion.
     *
     * @return bool
     */
    public function generateHtmlFile()
    {
        $this->generateUid();
        $dom = new Dom();

        $dom->setOptions([
            'removeScripts' => true,
            'removeStyles'  => true,
        ]);

        foreach ($this->links as $key => $link) {
            if (!$dom->loadFromUrl($link->url)) {
                dd('Could not load link: ' . $link->url);
            }

            $html = $dom->find('#yui-main');

            foreach ($html as $key => $elements) {
                $this->removeUnwantedTags($elements);
                Storage::disk('public')->append($this->uid . DIRECTORY_SEPARATOR . $this->school . ".html", $elements->outerHtml);
            }
        }

        $this->createCoverPage();
        return $this;
    }

    /**
     * Uses wkhtmltopdf to create PDF from command line
     * @return PdfCreator
     */
    public function createPdf()
    {
        
        chdir(public_path('assets') . DIRECTORY_SEPARATOR . $this->uid);
        // shell_exec("htmldoc --quiet --color --no-strict -t pdf --outfile $this->school.pdf $this->school.html");
        echo exec("wkhtmltopdf -q -s Letter $this->school.html $this->school.pdf ");

        return $this;
    }

    /**
     * Persist record of PDF to database
     * @return PdfCreator
     */
    public function save($name)
    {
        $catalog = new Catalog;

        $catalog->id         = $this->uid;
        $catalog->type       = $this->school;
        $catalog->name       = $name;
        $catalog->pdf_path   = $this->uid . DIRECTORY_SEPARATOR . $this->school . ".pdf";
        $catalog->html_path  = $this->uid . DIRECTORY_SEPARATOR . $this->school . ".html";
        $catalog->start_year = $this->year;
        $catalog->end_year   = ($this->year + 1);

        $catalog->save();

        return $this;
    }

    /**
     * Returns the unique id for the
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Remove unnecessary html tags to reduce size of file.
     *
     * @param Dom $content
     */
    protected function removeUnwantedTags($content)
    {
        //Add classes, tags, or id's that you do not want shown
        $blacklist = [
            '.sideCol',
            '.leftNavBot',
            '.crumbTrail',
            '.right',
            'img',
        ];

        foreach ($blacklist as $key => $reject) {
            $elements = $content->find($reject);

            foreach ($elements as $key => $element) {
                $element->delete();
                unset($element);
            }
        }
    }

    /**
     * Finds specific tags and adds inline styles to them
     *
     * @param Dom $content
     */
    protected function addCssStyle($content)
    {
        $styleMap = [
            'table' => 'width:100%;background-color:#D5D5D5;padding:8px 10px;',
            'td'    => 'padding:8px 10px; border-bottom: solid 1px #bfbfbf; border-right:solid 1px #bfbfbf;',
        ];

        foreach ($styleMap as $key => $style) {
            $elements = $content->find($key);

            foreach ($elements as $key => $element) {
                $element->setAttribute('style', $style);
            }
        }
    }

    /**
     * Hashes the time with a unique ID generator
     *
     * @return string
     */
    protected function generateUid()
    {
        return $this->uid = md5(time() . uniqid());
    }

    protected function createCoverPage()
    {
        $coverPageHtml = '<link rel="stylesheet" type="text/css" href="https://dl.dropboxusercontent.com/u/49693340/print.css">
                          <div style="padding-top:400px;margin-bottom:800px;text-align:center;"><h1>St. John Fisher College</h1>
                          <h3>' . $this->year . '-' . ($this->year + 1) . '</h3><p>' . ucwords($this->school) . ' Catalog</p></div>';
        
        Storage::disk('public')->prepend($this->uid . DIRECTORY_SEPARATOR . $this->school . ".html", $coverPageHtml);

        return $this;
    }

}

<?php 

namespace App\Classes;

use PHPHtmlParser\Dom;

class HtmlUtil 
{

	
	protected $html;
	protected $tags;

	function __construct($html, $tags = [])
	{
		$this->html = $html;
		$this->tags = $tags;
	}
	public function stripTags()
	{       
       	$tagList = '';
        foreach ($this->tags as $tag) {
        	$tagList .= '<' . $tag . '>';
        }
       	return strip_tags($this->html, $tagList);
	}


}
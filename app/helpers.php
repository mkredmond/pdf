<?php 

/**
 * Checks if current link is active
 * @param string $uri
 * @return  string
 */
function set_active($uri)
{
    return Request::is($uri) ? 'active' : '';
}

function setActiveSelect($selectedYear)
{
	if(Request::has('year')){
		return Request::input('year') == $selectedYear ? 'selected=""' : Request::input('year');
	}
}

/**
 * Global helper for sending flash messages.
 * @param  string|null $title
 * @param  string|null $message
 * @return App\Classes\Flash 
 */
function flash($title = null, $message = null)
{
	$flash = app('App\Classes\Flash');

	if(func_num_args() == 0){
		return $flash;
	}

	return $flash->info($title, $message);
}
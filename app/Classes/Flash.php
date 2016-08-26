<?php 

namespace App\Classes;

class Flash
{
	/**
	 * Registers a flash event
	 * @param  string $title  
	 * @param  string $message 
	 * @param  string $level   
	 * @param  string $key    
	 * @return void         
	 */
	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level' => $level,
		]);
	}

	/**
	 * Sets flash message to info
	 * @param  string $title   
	 * @param  string $message 
	 * @return void          
	 */
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}

	/**
	 * Sets flash message to success
	 * @param  string $title  
	 * @param  string $message 
	 * @return void          
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}

	/**
	 * Sets flash message to error
	 * @param  string $title   
	 * @param  string $message 
	 * @return void          
	 */
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}

	/**
	 * Sets flash message to overlay and changes the default key
	 * @param  string $title   
	 * @param  string $message 
	 * @param  string $level   
	 * @return void
	 */
	public function overlay($title, $message, $level = 'success')	
	{
		return $this->create($title, $message, $level, 'flash_message_overlay');
	}
}
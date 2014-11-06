<?php
use LaravelBook\Ardent\Ardent;

class News extends Ardent  {
	public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
	public $autoPurgeRedundantAttributes = true;
 	public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
	public static $rules = array(
	    'title'		=> 'required|between:5,50',
	    'body'		=> 'required|max:2000',
  	);
	public $fillable = array('title', 'body');
	public static $customMessages = array(
		'required' => 'Pole :attribute jest wymagane.',
	);
	
}
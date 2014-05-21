<?php

/* This class exists as a placeholder for a database it should
 * suffice for prototyping purposes, but shoud NOT be used in 
 * production
 */ 
class NoDb {

	protected $noDbFile 	= '';
 
    // Contstructor
    public function __construct($noDbFile = null) {

		$parentDir = dirname(dirname(__FILE__));
    	$this->noDbFile = 'public/noDb/storage.txt';
    }

    //
    public function post($preJson) {
		$json = json_encode($preJson);
		 
		$file = fopen($this->noDbFile, 'w');
		fwrite($file, $json);
		fclose($file);
    }

    //
    public function get() {
		$json = file_get_contents($this->noDbFile);
		 
		$jsonArray = json_decode($json,true);
		 
		$result = $jsonArray;

		return $result;
    }    
}
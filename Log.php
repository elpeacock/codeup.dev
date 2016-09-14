<?php
//set timezone default
date_default_timezone_set('America/Chicago');

//create 'Log' class
class Log 
{
    //create '$filename' property
    public $filename;
    //add a property called handle
    public $handle;
    //make date useable
    public $today;

    //add constructor to Log class
    public function __construct($prefix = 'log') {
        $this->today = date("Y-m-d");
        //set filename property
        $this->filename = "{$prefix}-{$this->today}.log";
        //open $filename for appending and assign to property handle
        $this->handle = fopen($this->filename, 'a');
    }

    //add a destructor to Log Class
    public function __destruct(){
        fclose($this->handle);
    }
    
    //create method to logMessage
    public function logMessage($logLevel, $message) {
        $timestamp = date("H:i:s e");
        $output = "$this->today" . " $timestamp " . "$logLevel" . ": " . "$message" . PHP_EOL;
        fwrite ($this->handle, $output);

    }

    //create method to log info message
    public function info($message) {
        $this->logMessage('INFO', $message);
    }

    //create method to log error message
    public function error($message) {
        $this->logMessage('ERROR', $message);
    }

}
<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        return isset($_REQUEST[$key]);
        
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        if (self::has($key)) {
            //return the value of specified key
            return $_REQUEST[$key];
        } else {
            //if key is not set, return null
            return null;
        }
    }

    public static function getString($key)
    {
        if (!self::has($key) && $default === null) {
            throw new Exception ('Request does not contain $key');
        } 

        if (!is_string(self::get($key)) && !is_numeric (self::get($key, $defualt))) {
            throw new Exception ('$key given is not a string');
        }
        return $value = self::get($key);
    }

    public static function getNumber($key)
    {
        
        if (!self::has($key)) {
            throw new Exception ('Request does not contain $key');
        }

        if (!is_numeric(self::get($key))) {
            throw new Exception ('the $value associated with $key given is not a number');
        }

        $value = self::has($key);
        return floatval($value);
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}

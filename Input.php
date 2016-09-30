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
    public static function get($key)
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

    public static function getString($key, $min = 2, $max = 75)
    {
        
        if (self::has($key) && !empty(self::get($key))) {
            throw new outOfRangeException ('Please enter an input');
        } 

        if (!is_string(self::get($key)) || is_numeric(self::get($key))) {
            throw new invalidArgumentException ('input value is not valid');
        }

        if (strlen(self::get($key)) < $min || strlen(self::get($key)) > $max) {
            throw new rangeException ('input length is out of range');
        }
        return $value = self::get($key);
    }

    public static function getNumber($key, $min = 0.1, $max = 1000000)
    {
        
        if (self::has($key) && !empty(self::get($key))) {
            throw new outOfRangeException ('Please enter an input');
        }

        if (!is_numeric(self::get($key))) {
            throw new invalidArgumentException ('input value given is not a number');
        }

        if ((self::get($key)) < $min || (self::get($key)) > $max) {
            throw new rangeException ('value given is out of range');
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

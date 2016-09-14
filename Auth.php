<?php
//require Log class so we can log info/errors about log in
require_once 'Log.php';
//create Auth class
class Auth
{
    public static $hashedPassword = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    public static $isMatch;
    //hash the password
    // public static function hashIt ($correctPassword) {
    //     $correctPassword = 'password';
    //     $hashedPassword = password_hash($correctPassword, PASSWORD_DEFAULT);  
    // } 

    //attempted login function
    public static function attempt($username, $password) {
        $isMatch = password_verify($password, self::$hashedPassword);      //verify password, boolean saved in $isMatch
        $LogObject = new Log();
        if ( ($username === 'guest') && ($isMatch == true) ) {                      //check the name + password match 
            $_SESSION['sessionId'] = session_id();                                  //assigning session id on log in
            $_SESSION['loggedInUser'] = $username;                         //assigning username to session on log in 
            if (isset($_SESSION['loggedInUser'])) {                                 //checking if user is logged in
                $LogObject->info("User {$_SESSION['loggedInUser']} is logged in");         //Log info
                header('location: /authorized.php');                                //logged in user = redirect to authpg
                die;                                                                //kill php after redirect
            }
        } else {
            $LogObject->error("User login failed");                                 //not logged in = resend to login/Log error 
        }

    }

    //check if a user is logged in (return boolean)
    public static function check() {
        
        if (isset($_SESSION['loggedInUser'])) {                //checks to see if the user is logged in
            return true;
        } else {
            return false;
            header('location: /login_form.php');                //if not logged in, redirect to login_fomr.php
            die;                                                //murder php after redirect
            
        }

    }
    //return username of currently logged in person
    public static function user() {
        return ['username' => $_SESSION['loggedInUser']];
    }

    //end and clear the session
    public static function logout() {
        // clear $_SESSION array
        session_unset();

        // delete session data on the server
        session_destroy();

        // ensure client is sent a new session cookie
        session_regenerate_id();

        // start a new session - session_destroy() ended our previous session so
        // if we want to store any new data in $_SESSION we must start a new one
        session_start();
    }
}
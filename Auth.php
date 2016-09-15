<?php
//require Log class so we can log info/errors about log in
require_once 'Log.php';
//create Auth class
class Auth
{
    public static $hashedPassword = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    public static $isMatch;
    public static $message = 'Enter your login info:';
    //hash the password
    // public static function hashIt ($correctPassword) {
    //     $correctPassword = 'password';
    //     $hashedPassword = password_hash($correctPassword, PASSWORD_DEFAULT);  
    // } 

    //function to verify log in attempts
    public static function attempt($username, $password) {
        //verify password, $isMatch returns boolean
        $isMatch = password_verify($password, self::$hashedPassword);      
        //create an instance of log
        $LogObject = new Log();
        //check that the username and password match
        if ( ($username === 'guest') && ($isMatch == true) ) { 
            //assign session Id on successful log in
            $_SESSION['sessionId'] = session_id();                                 
            //assign username to the session on successful log in
            $_SESSION['loggedInUser'] = $username;
            //checks if the user is already logged in
            if (isset($_SESSION['loggedInUser'])) {          
                //log login info
                $LogObject->info("User {$_SESSION['loggedInUser']} is logged in");   
                //if user is successfullly logged in -> redirect them to the authorized page
                header('location: /authorized.php');
                //ALWAYS KILL THE SCRIPTS AFTER A REDIRECT
                die;
            }
        } else {
            //if user is not logged in/log in failed, stay on log in page & log an error in the log
            $LogObject->error("User login failed");
            //change message to display login in failed message to user
            self::$message = 'Login failed. Try Again.';
        }

    }

    //check if a user is logged in (return boolean)
    public static function check() {
        
        //if logged in return true
        if (isset($_SESSION['loggedInUser'])) {                
            return true;
        //if not logged in, return false & redirect to login_fomr.php
        } else {
            return false;
            header('location: /login_form.php');                
            //ALWAYS KILL THE SCRIPTS AFTER A REDIRECT
            die;
            
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
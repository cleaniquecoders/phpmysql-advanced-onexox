<?php

class Session
{
    public static function init()
    {
    	// php 5.4 and above
    	if(function_exists('session_status'))
    	{
    		if (session_status() == PHP_SESSION_NONE) {
            	session_start();
        	}
	    } else if(function_exists('session_id')) { // php version below 5.4
			if(session_id() == '') {
			    session_start();
			}	
    	}
    }

    public static function destroy()
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    }

    public static function set($key, $value)
    {
    	self::init();
        $_SESSION[$key] = $value;
    }

    public static function unset($key)
    {
    	self::init();
        if (isset($_SESSION[$key])) {
        	unset($_SESSION[$key]);
        }
    }

    public static function get($key)
    {
    	self::init()
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
}

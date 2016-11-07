<?php

class Cookie
{
    public static function enabled()
    {
        return (count($_COOKIE) > 0) ? true : false;
    }

    public static function get($key)
    {
        if (self::enabled()) {
            if (isset($_COOKIE[$key])) {
                return $_COOKIE[$key];
            }
        }
    }

    public static function set($key, $value, $time = null, $directory = '/')
    {
        if (self::enabled()) {
            if (empty($time)) {
                $time = time() + (86400 * 30);
            }
            setcookie($key, $value, $time, $directory);
        }
    }

    function unset($key) {
        if (self::enabled()) {
            if (isset($_COOKIE[$key])) {
                unset($_COOKIE[$key]); // setcookie($key, "", time() - 3600);
            }
        }
    }
}

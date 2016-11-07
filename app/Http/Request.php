<?php

class Request
{
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }

    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
    }

    public static function input($key = null)
    {
        if ($this->isPost()) {
            // if post
            if (empty($key)) {
                // if empty key provided, return all
                return $_POST;
            }
            if (isset($_POST[$key])) {
                // if key exist, return the key
                return $_POST[$key];
            }
        } else if ($this->isGet()) {
            // if get
            if (empty($key)) {
                // if empty key provided, return all
                return $_GET;
            }
            if (isset($_GET[$key])) {
                // if key exist, return the key
                return $_GET[$key];
            }
        }
    }
}

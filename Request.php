<?php
/**
 *
 */
class Request
{
    public function isPost()
    {
        /*if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        return true;
        } else {
        return false;
        }*/

        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }

    public function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
    }

    public function input($key = null)
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

// $request = new Request();
// $password = $request->input('password');
// $confirmation_password = $request->input('confirmation_password');
// $username = $request->input('username');
// $email = $request->input('email');

// // regisration
// echo '<pre>';
// var_dump($request->input());
// echo '</pre>';

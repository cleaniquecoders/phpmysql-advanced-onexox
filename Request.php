<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

}
/**
 *
 */
class Request
{
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }

    function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
    }

    function input($key = null)
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

$request = new Request();

echo '<pre>';
var_dump($request->input());
echo '</pre>';

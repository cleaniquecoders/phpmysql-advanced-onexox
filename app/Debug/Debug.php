<?php

class Debug
{
    public static function dd($value, $exit = true)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        if ($exit) {
            exit();
        }
    }

    public static function log($value)
    {
        // do logging
    }
}

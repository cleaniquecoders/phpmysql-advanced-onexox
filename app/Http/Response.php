<?php

class Response
{
    public static function json($value)
    {
        header('content-type: application/json');
        echo json_encode($value);
    }
}

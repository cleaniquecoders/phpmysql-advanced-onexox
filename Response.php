<?php

/**
 *
 */
class Response
{
    public function output()
    {
        // html
    }

    public function json()
    {

    }

    public function pdf()
    {

    }

    public function download()
    {

    }
}

$response = new Response();
// based on request
$response->download();

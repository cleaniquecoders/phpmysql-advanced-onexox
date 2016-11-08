<?php

trait ErrorHandler
{
    private $errors = [];
    public function isError()
    {
        return empty($this->errors) ? false : true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setError($message)
    {
        $this->errors[] = $message;
    }

    public function clear()
    {
        $this->errors = [];
    }
}

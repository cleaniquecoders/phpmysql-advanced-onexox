<?php

trait Error
{
    private $errors;
    public function isError()
    {
        return empty($this->errors) ? false : true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

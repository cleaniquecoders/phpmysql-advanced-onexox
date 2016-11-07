<?php

class Validator
{
    private $rules = [
        'name' => 'required|min:6|max:12',
    ];

    public function setRules($value)
    {
        $this->rules = $value;
    }
    // validate based on rules set
    public function handle($inputs)
    {
        // based on rules given, do validation
    }
}

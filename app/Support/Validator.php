<?php

class Validator
{
    private $rules = [
        'name' => 'required|min:6|max:12',
    ];
    private errors = [];

    public function isError()
    {
        return empty($this->errors) ? false : true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setRules($value)
    {
        $this->rules = $value;
    }
    // validate based on rules set
    public function handle($inputs)
    {
        foreach ($this->rules as $key => $value) {
            if (isset($inputs[$key])) {
                $rules = $this->explodeRules($value);
                $this->validate($inputs[$key], $rules);
            }
        }
    }

    private function validate($input, $rules)
    {
        $this->errors = [];
        foreach ($rules as $key => $value) {
            if($value == 'required')
            {
                if(empty($input))
                {
                    $this->errors[] = 'This field is required';
                }
            }

            if(strpos($value, 'min') === true)
            {
                $length = (int) str_replace('min:',$value);
                if(strlen($input) < $length)
                {
                    $this->errors[] = 'Minimum characters required is ' . $length;
                }
            }

            if(strpos($value, 'max') === true)
            {
                $length = (int) str_replace('max:',$value);
                if(strlen($input) > $length)
                {
                    $this->errors[] = 'Maximum characters is ' . $length;
                }
            }
        }
    }

    private function explodeRules($rules)
    {
        return explode('|', $rules);
    }
}

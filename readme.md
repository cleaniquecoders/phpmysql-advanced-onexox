# Web Development with PHP & MySQL (Advanced - OOP)

## How to create a class

```php
class Request 
{

}
```

## How to create a public property

```php
class Request
{
	public $data;
}
```

## How to create a private property

```php
class Request
{
	private $data;
}
```

## How to create a public method

```php
class Request
{
	public function methodName()
	{

	}
}
```

## How to create a private method

```php
class Request
{
	private function methodName()
	{

	}
}
```

## How to access to properties from within the class's method

```php
class Request
{
	private $data;

	public function getData()
	{
		return $this->data;
	}
}
```

## How to create a static method and how to use it

```php
class Request
{
	public static function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
	}
}
```

Usage

```php
if(Request::isPost())
{
	// do something
}
```

## How to create chaining method

```php
<?php

class Upload
{
    public function handle($file)
    {
        // using the chaining method
        $this->checkFileExist()
            ->checkFormat()
            ->checkFileSize()
            ->move();
    }

    private function checkFileExist()
    {
        // logic to check file existence
        return $this;
    }

    private function checkFormat()
    {
        // check if the right format used
        return $this;
    }

    private function checkFileSize()
    {
        // Check file size
        return $this;
    }

    private function move()
    {
        // move the uploaded file
    }
}
```

## Using Procedural, Object and Static

```php
// procedural
if($_SERVER['REQUEST_METHOD'] == 'POST') {

}

// using oop, create object
$request = new Request();

if($request->isPost()) {

}

// using static
if(Request::isPost()) {
    // save data...
}
```
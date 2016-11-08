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
<?php

// interface
interface Message
{
	// abstract method
    abstract public function notify($message);
    // abstract protected function...
    // abstract private function...
}

// trait
trait Notifiable implements Message
{
    public function notify($message) {
    	// do your logic here
    }
}

class User {
	use Notifiable; // use the trait
}

$user = new User();
$user->notify($message); // call the method in trait


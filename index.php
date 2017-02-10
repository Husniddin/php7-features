<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

define(MY_CONST, 'hello world');

function sayHello(string $name): string
{
	// return 'Hello ' . $name . '<br>';
	return 'Hello ' . $name . '<br>';
}

echo sayHello('Husniddin');
// echo sayHello(5);

// throw new Exception("Error Processing Request", 1);
throw new InvalidArgumentException();

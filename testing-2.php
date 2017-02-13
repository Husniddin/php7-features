<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

class Foo
{
    public static function bar(?string $name) : ?string
    {
        return $name;
    }
}

// string(13) "Hello, world!"
var_dump( Foo::bar('Hello, world!') );

// NULL
var_dump( Foo::bar(null) );

// string(0) ""
var_dump( Foo::bar('' ?? null) );

// NULL
var_dump( Foo::bar($unknownVariable ?? null) );

// вернёт ошибку TypeError
var_dump( Foo::bar(1) );

// вернёт ошибку ArgumentCountError
var_dump( Foo::bar() );
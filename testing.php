<?php
// declare(strict_types=1);

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

class Foo
{
    public static function bar(int $a, float $b, string $c) : int
    {
        return $a + $b + $c;
    }
}

// вернёт int(6)
var_dump( Foo::bar('1', 2, 3.0) );

class Foo1
{
    public static function bar(int $a, float $b, string $c) : string
    {
        return $a + $b + $c;
    }
}

// вернёт string(6)
var_dump( Foo1::bar('1', 2, 3.0) );

class Foo2
{
    public static function bar(int $a, float $b, string $c)
    {
        return $a + $b + $c;
    }
}

// вернёт float(6)
var_dump( Foo2::bar('1', 2, 3.0) );

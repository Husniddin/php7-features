<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');


// #1. Добавлен возвращаемый тип «void». Hechnarsa qaytarmaydigan funksiyalar uchun void tipi qo'shildi.
function sayHello(): void
{
	echo "Hello World";

	// Hech narsa qaytarmasa bo'ladi. 
	return;
}

sayHello();



// #2 Добавлен новый псевдо-тип: «iterable»
function walkList(iterable $list): iterable {
    foreach ($list as $value) {
        yield $value['id'];
    }
}

$w = walkList([['id'=>1], ['id'=>2], ['id'=>3]]);


// foreach ($w as $value) {
// 	echo $value;
//}

// Yoki
echo $w->current();  
$w->next();
echo $w->current();  
$w->next();
echo $w->current();  
$w->next();


// #3. Появилась возможность разрешать null в типизированных и возвращаемых параметрах

function getName(?string $name): ?string
{
	return $name;
}

var_dump(getName('Zend'));
var_dump(getName(null));


// #4. Добавлена возможность использовать отрицательное значение для смещения в строках
$message = 'Hello world';

echo $message[-2]; // Keinchalik olib tashlanishi mumkin
echo $message{-2}; // Shu ma'qulroq


// #5. Разрешено использовать строковые ключи в конструкции list()
["test" => $a, "name" => $b] = ["name" => "Hello", "test" => "World!"];
var_dump($a); // World!
var_dump($b); // Hello


// #6. Поддержка модификаторов видимости для констант класса
class Token {
	// Константа без модификатора по умолчанию “public”
	const PUBLIC_CONST = 0;
 
    // Константы с различной областью видимости
    private const PRIVATE_CONST = 0;
    protected const PROTECTED_CONST = 0;
    public const PUBLIC_CONST_TWO = 0;

    // Весь список имеет одну область видимости
    private const FOO = 1, BAR = 2;
}


// #7. Ловить исключения можно объединяя несколько типов исключений в один блок
try {
   echo "OK";
} catch (Exception | DomainException $e) {
   // ... обработка 2ух типов исключений сразу
} catch (TypeError $e) {
   // ...
}

/*
* Manba: https://habrahabr.ru/post/309858/
*/
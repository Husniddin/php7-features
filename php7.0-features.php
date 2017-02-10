<!-- https://github.com/sstalle/php7cc -->
<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Синтаксический сахар в PHP 7

// #1. Группировка объявлений импорта
// use Framework\Module\Foo;
// use Framework\Module\Bar;
// use Framework\Module\Baz;

// В PHP 7 можно написать:
// use Framework\Module\{Foo, Bar, Baz};


// Или же, если вы предпочитаете многострочный стиль:
use Framework\Module\{
    Foo,
    Bar,
    Baz
};



// #2. Null-коалесцентный оператор
// До PHP 7:

if (isset($foo)) {
    $bar = $foo;
} else {
    $bar = 'default'; // присваиваем $bar значение 'default' если $foo равен NULL
}

//В PHP 7:
$bar = $foo ?? 'default';

// Можно использовать с цепочкой переменных:
$bar = $foo ?? $baz ?? 'default';


// #3. Оператор “космический корабль”
switch ($bar <=> $foo) {
    case 0:
        echo '$bar и $foo равны';
    case -1:
        echo '$foo больше';
    case 1:
        echo '$bar больше';
}



/*
Новое в PHP 7

Конечно, в PHP 7 появилась новая, впечатляющая функциональность.

// #1. Типы скалярных параметров и подсказки (hints) по возвращаемым типам

В PHP 7 расширили ранее существовавшее объявление параметров в методах (классах, интерфейсах и массивах) путем добавления четырех скалярных типов — целого (int), с плавающей запятой (float), логического (bool) и строкового (string) в качестве возможного типа параметра.*/


/*Кроме того, опционально мы можем указать тип результата, возвращаемого функцией или методом. Поддерживаются типы bool, int, float, string, array, callable, имя класса или интерфейса и parent (для методов класса).*/

class Calculator
{
// объявляем, что параметры имеют целый тип integer
    public function addTwoInts(int $x, int $y): int { 
// явно объявляем, что метод возвращает целое
        return $x + $y;
    }
}


// #2. Анонимные классы
// До PHP 7:
class MyLogger {
  public function log($msg) {
    print_r($msg . "\n");
  }
}

$pusher->setLogger( new MyLogger() );



// Использование анонимного класса:
$pusher->setLogger(new class {
  public function log($msg) {
    print_r($msg . "\n");
  }
});


// #3. Функции CSPRNG

// Две новых функции для генерации крипографически безопасной строки и целых. Первая возвращает случайную строку длиной $len:
random_bytes(int $len);

// Вторая возвращает число в диапазоне $min… $max.
random_int(int $min, int $max);


// #4. Синтаксис Escape-кода для Unicode
echo "\u{1F602}"; // выводит смайлик


// #5. Обновленные генераторы
function genA() {
    yield 2;
    yield 3;
    yield 4;
}

function genB() {
    yield 1;
    yield from genA(); // 'genA' вызывается и отрабатывает в этом месте
    yield 5;
    return 'success'; // финальный результат, который мы позже можем проверить
}

foreach (genB() as $val) {
    echo "\n $val"; // выдаст значения от 1 до 5
}

$genB()->getReturn(); // вернет 'success' при отсутствии ошибок



// #6.
// Однообразный синтаксис описания переменных

// Это обновление привнесло некоторые изменения в части согласованности для конструкций переменная-переменная. Оно позволит использовать более прогрессивные выражения с переменными, что, в отдельных случаях, приведет к изменению поведения кода, как показано ниже:

                               // старый смысл           // новый смысл
$$foo['bar']['baz']     ${$foo['bar']['baz']}     ($$foo)['bar']['baz']
$foo->$bar['baz']       $foo->{$bar['baz']}       ($foo->$bar)['baz']
$foo->$bar['baz']()     $foo->{$bar['baz']}()     ($foo->$bar)['baz']()
Foo::$bar['baz']()      Foo::{$bar['baz']}()      (Foo::$bar)['baz']()



// Это изменит поведение приложений, получающих доступ к переменным указанным способом. С другой стороны, вы сможете выделывать вот такие фокусы:

// вложенный ()
foo()(); // Calls the return of foo()
$foo->bar()();

//IIFE (Immediately-invoked function expression или немедленно вызываемое выражение функции) синтаксис как в JavaScript
(function() {
    // тело функции
})();

// Вложенный ::
$foo::$bar::$baz


// #7

// Убраны тэги в старом стиле

// Убраны или более некорректны открывающие/закрывающие тэги

// <% ... %>, <%= ... %>, <script language="php"> ... </script>


// Manba: https://habrahabr.ru/post/280071/


// #8. Теперь можно создать массив (группу) констант 
$conf = [
    'user' => 'root',
    'password' => 'my_password',
    'step' => 'Next step !'
];

// определите CONFIGURATION как константу

echo CONFIGURATION['step'];

// Manba: https://habrahabr.ru/post/302942/
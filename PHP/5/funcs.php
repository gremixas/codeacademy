<?php

// function someFn(Closure $lambda) {
//     return $lambda();
// }
// echo someFn(function() {
//     return "This is anonymous function call\n";
// });

$firstName = "Andrius\n";
$lastName = "aaaaa\n";
$getName = function(int $age) use($firstName, $lastName) {
    // echo gettype($age);
    echo $firstName . $lastName . $age . "\n";
};
// echo $getName();

function closureAsArgument(Closure $closure, $age = 0) {
    for ($i=$age; $i > 0; $i--) { 
        $closure($i);
    }
}
echo closureAsArgument($getName, 3);

$driver = (function(): Closure {
    $name = "James";
    $car = "Aston Martin";

    $closure = function() use($name, $car) {
        return "$name drives $car\n";
    };

    return $closure;
})();

// echo $driver();

function test(Closure $closure):void {
    echo $closure();
}

test($driver);
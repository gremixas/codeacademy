<?php
// 1.
function getCities(): array
{
    return [
        [
            'name' => 'Tokyo',
            'population' => 37435191,
        ],
        [
            'name' => 'Delhi',
            'population' => 29399141,
        ],
        [
            'name' => 'Shanghai',
            'population' => 26317104,
        ],
        [
            'name' => 'Sao Paulo',
            'population' => 21846507,
        ],
        [
            'name' => 'Mexico City',
            'population' => 21671908,
        ],
        [
            'name' => 'New York',
            'population' => 25000000,
        ],
    ];
}

// 1.1
function exercise1($arr): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami paprastu 'foreach' ir grąžinkite ją iš funkcijos.
    Miestus pasiimkite iškvietę funkciją 'getCities'
    */
    $totalPopulation = 0;
    foreach($arr as $city){
        $totalPopulation += $city['population'];
    }
    return $totalPopulation;
}
echo exercise1(getCities());
echo "\n";

// 1.2
function exercise2($arr): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcijomis array_column ir array_sum
    ir grąžinkite ją iš funkcijos
    */
    return array_sum(array_column($arr, 'population'));
}
echo exercise2(getCities());
echo "\n";

// 1.3
function exercise3($arr): int
{
    /*
    Suskaičiuokite bendrą miestų populiaciją pasinaudodami funkcija array_reduce ir grąžinkite ją iš funkcijos
    */
    return array_reduce($arr, fn($acc, $item) => $acc += $item['population'], 0);
}
echo exercise3(getCities());
echo "\n";

// 1.4
function exercise4($arr): int
{
    /*
    Suskaičiuokite populiaciją miestų, kurie yra didesni nei 25,000,000 gyventojų.
    Rinkites sau patogiausią skaičiavimo būdą.
    */
    return array_reduce($arr, fn($acc, $item) => $item['population'] > 25000000 ? $acc += $item['population'] : $acc, 0);
}
echo exercise4(getCities());
echo "\n";

// 1.5
function exercise5($arr): array
{
    /*
    Grąžinkite masyvą, kuriame būtų tik tie miestai, kurie yra didesni nei 25,000,000 gyventojų
    Rezultatas turi būti tokios pat struktūros, kaip ir pradinis miestų masyvas:
    [
        [
            'name' => 'Tokyo',
            'population' => 37435191,
        ],
        ...
    ]
    */
    return array_filter($arr, fn($city) => $city['population'] > 25000000);
}
print_r(exercise5(getCities()));
echo "\n";

 /*
2. Parašykite funkciją, kuris grąžins šią figūrą. Panaudokite ciklus.
*
**
***
****
*****
******
*******
******
*****
****
***
**
*
*/
function upDown($howMany): void {
    for ($i = 0; $i < $howMany; $i++) { 
        for ($j = 0; $j < $i; $j++) { 
            echo "*";
        }
        echo "\n";
    }
    for ($i=$howMany; $i > 0; $i--) { 
        for ($j=$i; $j > 0; $j--) { 
            echo "*";
        }
        echo "\n";
    }
}
upDown(7);
echo "\n";

/*
3. Parašykite funkciją, kuri grąžina tokį stačiakampį. Matmenys turi būti perduodami parametrais. Panaudokite ciklus.
$length = 5;
$height = 4;
*  *  *  *  *
*  *  *  *  *
*  *  *  *  *
*  *  *  *  *
*/
function colRow($length, $height): void {
    for ($i = 0; $i < $height; $i++) { 
        for ($j = 0; $j < $length; $j++) { 
            echo "*";
        }
        echo "\n";
    }
}
colRow(5, 4);
echo "\n";
/*
4. Parašykite funkciją, kuri grąžina kiekvieno sveiko skaičiaus daliklius.
Pvz.: nuo  1 iki 12 būtų:
1:
2: 1
3: 1
4: 1 2
5: 1
6: 1 2 3
7: 1
8: 1 2 4
9: 1 3
10: 1 2 5
11: 1
12: 1 2 3 4 6
...

Panaudokite ciklus.
Ribas perduokite parametrais.
*/
function dividers($from = 1, $to = 12): string {
    $returnStr = "";
    for ($i = $from; $i <= $to; $i++) { 
        $returnStr .= "$i: ";
        for ($j = 1; $j < $i; $j++) { 
            $returnStr .= $i % $j === 0 ? "$j " : "";
        }
        $returnStr .= "\n";
    }
    return $returnStr;
}
print_r(dividers(1, 12));
echo "\n";

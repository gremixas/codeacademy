<?php
// 1. Aprašyti enumeruotą/indeksuotą masyvą iš 4 reikšmių milk, bread, eggs, salads. Priskirkite kintamajam "shoppingList".
$shoppingList = ['milk', 'bread', 'eggs', 'salads'];
print_r($shoppingList);

// 2. Pridėkite 1 vertę prie "shoppingList" - "potato".
$shoppingList[] = 'potato';
print_r($shoppingList);

// 3. Pašalinkite "shoppingList" 1 vertę - salad.
$shoppingList = array_values(array_filter($shoppingList, fn($item)=> $item !== "salads"));
// unset($shoppingList[3]);
// $shoppingList = array_values($shoppingList);
print_r($shoppingList);

// 4. Parašykite for ciklą ir išspausdinkite kiekvieną masyvo elemento
// vertę į tokį sąkinį - 'Shopping list:  milk  bread  eggs  potato'.
$sentence = 'Shopping list:';
for ($i=0; $i < count($shoppingList); $i++) { 
    $sentence .= "  $shoppingList[$i]";
}
echo "$sentence\n";

// 5. Parašykite funkciją  getModifiedValue().
// Funkcija priima 3 parametrus: $array, $index, $modifier. Grąžina string tipo vertę.
// 1 parametras - masyvas, 2 - jo indekas, 3 - tekstas, kuris bus pridėtas vertės prieky ir gale.
// Funkcija patikrina ar toks indekas egzistuoja masyve. Jei egzistuoja,
// paima vertę pagal indeksą, ją modifikuoja ir grąžina.
// Pvz.: getModifiedValue($shoppingList, 0, "**"); grįš string "**potato**"
// Jei tokio indekso  nėra, grįš tekstas "Vertė nerasta!".
function getModifiedValue($array, $index, $modifier): string {
    return array_key_exists($index, $array) ? "$modifier{$array[$index]}$modifier\n" : "Vertė nerasta!\n";
}
echo getModifiedValue($shoppingList, 0, "**");//**milk** */
echo getModifiedValue($shoppingList, 4, "**");//Vertė nerasta!

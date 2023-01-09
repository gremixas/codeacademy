<?php
// 6. Advanced pyramid

// Išspausdinkite šią struktūrą. 

// Sukurti 1 failą generate_pyramid.php.
// Failas turi linką generate, kuris veda į tą patį puslapį, su parametru generate=true.
// Paspaudus linką perkraunamas puslapis su parametru ir išspausdinama figura.

   
// ----------------1----------------
// --------------2***2--------------
// ------------3***3***3------------
// ----------4***4***4***4----------
// --------5***5***5***5***5--------
// ------6***6***6***6***6***6------
// ----7***7***7***7***7***7***7----
// --8***8***8***8***8***8***8***8--
// 9***9***9***9***9***9***9***9***9

function hyphen(int $howMany): string {
    $hyphen = "";
    for ($i=0; $i < $howMany; $i++) {
        $hyphen .= "-";
    }
    return $hyphen;
}
function pyramid(): string {
    $tree = "";
    for ($i=1; $i < 10; $i++) {
        $tree .= hyphen((9 - $i)*2);
        for ($j=0; $j < $i; $j++) {
            $tree .= $j ? "***" . $i : $i;
        }
        $tree .= hyphen((9 - $i)*2);
        $tree .= "<br>\n";
    }
    return $tree;
}

if(isset($_GET['generate']) && $_GET['generate'] === "true") {
    echo pyramid();
} else {
    echo "<a href=generate_pyramid.php?generate=true>Generate</a>";
}

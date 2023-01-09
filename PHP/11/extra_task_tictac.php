<?php
// 7. TIC TAC TOE
// Parašykite programą(terminalui), kuri su jumis žaistų kryžiukų nuliukų žaidimą.
// Expected input: php -f extra_task_tictac.php begin
//    A  B  C
// 1 |   |   |   |
//   ------------
// 2 |   |   |   |
//   ------------
// 3 |   |   |   |
// Expected input: php -f extra_task_tictac.php A1
//    A  B  C
// 1 | X |   |   |
//   -------------
// 2 |   | 0 |   |
//   -------------
// 3 |   |   |   |
// Expected input: php -f extra_task_tictac.php B1
//    A  B  C
// 1 | X | X |   |
//   -------------
// 2 |   | 0 |   |
//   -------------
// 3 | 0 |   |   |
// Expected input: php -f extra_task_tictac.php C1
//    A  B  C
// 1 | X | X | X |
//   -------------
// 2 |   | 0 |   |
//   -------------
// 3 | 0 |   |   |
// You won!

$filePath = __DIR__ . "/storage.json";
$arg = isset($argv[1]) && $argv[1] ? $argv[1] : null;
$validMoves = ["A1", "A2", "A3", "B1", "B2", "B3", "C1", "C2", "C3", "begin"];

function initGame(string $filePath): void
{
    file_put_contents($filePath, json_encode([" ", " ", " ", " ", " ", " ", " ", " ", " "]));
}

function readGame(string $filePath): array
{
    return json_decode(file_get_contents($filePath), true);
}

function showGame(array $game): void
{
    echo "    A   B   C
1 | {$game[0]} | {$game[3]} | {$game[6]} |
2 | {$game[1]} | {$game[4]} | {$game[7]} |
3 | {$game[2]} | {$game[5]} | {$game[8]} |
";
}

function computersMove(array $game): array
{
    if (in_array(" ", $game)) {
        while (true) {
            $randomNumber = rand(0, 8);
            if ($game[$randomNumber] === " ") {
                $game[$randomNumber] = "O";
                break;
            }
        }
    } else {
        recho("\n\nthe game is over. no valid moves left.\n\n");
    }
    return $game;
}

function checkForWinner(array $game, string $filePath): void
{
    if (
        $game[0] === "X" && $game[1] === "X" && $game[2] === "X" ||
        $game[3] === "X" && $game[4] === "X" && $game[5] === "X" ||
        $game[6] === "X" && $game[7] === "X" && $game[8] === "X" ||
        $game[0] === "X" && $game[3] === "X" && $game[6] === "X" ||
        $game[1] === "X" && $game[4] === "X" && $game[7] === "X" ||
        $game[2] === "X" && $game[5] === "X" && $game[8] === "X" ||
        $game[0] === "X" && $game[4] === "X" && $game[8] === "X" ||
        $game[2] === "X" && $game[4] === "X" && $game[6] === "X"
    ) {
        recho("\n\n\033[01;31myou've won!\033[0m\n\n");
        saveGame($filePath, $game);
        showGame($game);
        die();
    } else if (
        $game[0] === "O" && $game[1] === "O" && $game[2] === "O" ||
        $game[3] === "O" && $game[4] === "O" && $game[5] === "O" ||
        $game[6] === "O" && $game[7] === "O" && $game[8] === "O" ||
        $game[0] === "O" && $game[3] === "O" && $game[6] === "O" ||
        $game[1] === "O" && $game[4] === "O" && $game[7] === "O" ||
        $game[2] === "O" && $game[5] === "O" && $game[8] === "O" ||
        $game[0] === "O" && $game[4] === "O" && $game[8] === "O" ||
        $game[2] === "O" && $game[4] === "O" && $game[6] === "O"
    ) {
        recho("\n\nyou've lost.\n\n");
        saveGame($filePath, $game);
        showGame($game);
        die();
    }
}

function saveGame(string $filePath, array $game): void
{
    file_put_contents($filePath, json_encode($game));
}

function recho(string $text): void {
    echo "\033[01;31m$text\033[0m";
}

if ($arg) { // If argument is passed ...
    if (array_filter($validMoves, fn($move) => $move === $arg)) {
        $input = array_search($arg, $validMoves);
        if ($input === 9) { // "Begin"
            initGame($filePath);
            $game = readGame($filePath);
            showGame($game);
        } else {
            $game = readGame($filePath);
            if ($game[$input] === " " && in_array(" ", $game)) {
                $game[$input] = "X";
                checkForWinner($game, $filePath);
                $game = computersMove($game);
                checkForWinner($game, $filePath);
                showGame($game);
                saveGame($filePath, $game);
            } else {
                recho("\n\nthe seat is taken of no free spaces left.\n\n");
                showGame($game);
                die();
            }
        }
    } else {
        recho("valid commands are:\n");
        recho(implode(", ", $validMoves));
    }
} else {
    recho("no argument given. die");
}
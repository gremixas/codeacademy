<?php
include_once(__DIR__ . "/../dump.php");

session_start();

function getMessage(): array {
    return $_SESSION['message'] ?? [];
}

function messageBuilder(string $title = '', string $body = '', string $status = ''): string {
    $colors = ["red", "green", "blue"];
    $titles = ["Klaida", "Operacija sekminga", "Info"];
    return "<div class='box " . $colors[$status] . "'>
                <h2>$titles[$status]</h2>
                <p>$title</p>
                <p>$body</p>
            </div>";
}

function message(): string {
    $message = getMessage();
    return messageBuilder(...$message);
}


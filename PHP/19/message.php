<?php
function getMessages(): array {
    $messages = $_SESSION['messages'] ?? [];
    unset($_SESSION['messages']);
    return $messages ?? [];
}

function buildAllMessages(array $messages = []): string {
    // $colors = ["red", "green", "blue"];
    // $titles = ["Klaida", "Operacija sekminga", "Info"];
    $returnValue = "";

    foreach ($messages as $message) {
        $returnValue .= buildMessage($message);
    }

    return $returnValue;
}

function buildMessage($message): string {
    $colors = ["red", "green", "blue"];
    $titles = ["Klaida", "Operacija sekminga", "Info"];

    return "<div class='message " . $colors[$message['status']] . "'>
                <p>" . $titles[$message['status']] . ":</p>
                <p>" . $message['title'] . "</p>
                <p>" . $message['body'] . "</p>
            </div>";
}

function messages(): string {
    $messages = getMessages();
    return buildAllMessages($messages);
}

<?php

declare(strict_types=1);

class Messages {
    private const COLORS = ["red", "green", "blue"];
    private const TITLES = ["Klaida", "Operacija sekminga", "Info"];

    // public function __construct(){
    //     self::get();
    // }

    public static function get(): void {
        $messages = self::getMessages();
        echo self::buildAllMessages($messages);
    }

    private static function getMessages(): array {
        $messages = $_SESSION['messages'] ?? [];
        unset($_SESSION['messages']);
        return $messages ?? [];
    }

    private static function buildAllMessages(array $messages = []): string {
        $returnValue = "";
        foreach ($messages as $message) {
            $returnValue .= self::buildMessage($message);
        }
        return $returnValue;
    }
    
    private static function buildMessage(array $message): string {
        return "<div class='message " . self::COLORS[$message['status']] . "'>
                    <p>" . self::TITLES[$message['status']] . ":</p>
                    <p>" . $message['title'] . "</p>
                    <p>" . $message['body'] . "</p>
                </div>";
    }
}

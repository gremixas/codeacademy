<?php

declare(strict_types=1);

class Messages {
    private static array $colors = ["red", "green", "blue"];
    private static array $titles = ["Klaida", "Operacija sekminga", "Info"];

    public function __construct(){
        self::get();
    }

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
        return "<div class='message " . self::$colors[$message['status']] . "'>
                    <p>" . self::$titles[$message['status']] . ":</p>
                    <p>" . $message['title'] . "</p>
                    <p>" . $message['body'] . "</p>
                </div>";
    }
}

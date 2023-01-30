<?php

class Messages {
    private const COLORS = ["red", "green", "blue"];
    private const TITLES = ["Error", "Success", "Info"];

    public function __toString(): string {
        return self::get();
    }

    public static function get(): string {
        $messages = self::getMessages();
        return self::buildAllMessages($messages);
    }

    private static function getMessages(): array {
        $messages = $_SESSION['messages'] ?? [];
        self::clearMessages();
        return $messages ?? [];
    }

    private static function clearMessages(): void {
        unset($_SESSION['messages']);
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

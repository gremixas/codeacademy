<?php

class Database {
    
    public static function readDbFile($filePath) {
        if (file_exists($filePath)) {
            $users = json_decode(file_get_contents($filePath), true) ?? [];
        } else {
            $users = [];
        }
        return $users;
    }

    public static function writeDbFile(string $filePath, mixed $data) {
        file_put_contents($filePath, json_encode($data));
    }

}
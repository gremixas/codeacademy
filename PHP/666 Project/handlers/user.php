<?php

include_once(__DIR__ . "/database.php");

class User {

    public function __construct(
        public string $first_name = "",
        public string $last_name = "",
        public string $email = "",
        public string $password = "",
        public string $id = "",
    ){}

    public static function createUser(User $user): void {
        $users = Database::readDbFile(USERS_FILE_PATH);
        $allIds = array_column($users, "id");
        $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
        $user->id = $newId;
        $users[] = $user;
        Database::writeDbFile(USERS_FILE_PATH, $users);
    }
    
    public static function findUserByEmail(string $userName) {
        $users = Database::readDbFile(USERS_FILE_PATH);
        $user = array_values(array_filter($users, fn($user) => $user['email'] === $userName))[0] ?? [];
        return $user;
    }
        
    public static function findUserById(string $id) {
        $users = Database::readDbFile(USERS_FILE_PATH);
        $user = array_values(array_filter($users, fn($user) => $user['id'] === $id))[0] ?? [];
        return $user;
    }
    
    public static function findUserByToken(string $token) {
        $users = Database::readDbFile(USERS_FILE_PATH);
        return array_values(array_filter($users, fn($user) => $user['password'] === $token))[0] ?? [];
    }
    
}
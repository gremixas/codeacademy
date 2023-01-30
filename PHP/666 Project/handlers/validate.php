<?php

class Validate {

    public static function validateData(array $data): array {
        $errorMsg = [];
        foreach ($data as $key => $value) {
            if (!$value) {
                $errorMsg[$key] = "Empty input value: $key";
            }
            if ($key === "email") {
                if (!(self::validateEmail($value))) {
                    $errorMsg[$key] = "Invalid $key";
                }
            }
            if ($key === "password") {
                if (!(self::validatePassword($value))) {
                    $errorMsg[$key] = "Invalid $key";
                }
            }
        }
        return $errorMsg;
    }
    
    public static function validateEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    public static function validatePassword(string $password): bool {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            return false;
        }else{
        //     // echo 'Strong password.';
            return true;
        }
        // return false;
    }
    
    public static function setErrorMessages(array $messages): void {
        foreach ($messages as $message) {
            self::setErrorMessage($message);
        }
    }
    
    public static function setErrorMessage($message): void {
            $_SESSION['messages'][] = [
                'status' => 0,
                'title' => 'Operation failed.',
                'body' => $message
            ];
    }
    
    public static function setSuccessMessage(): void {
        $_SESSION['messages'][] = [
            'status' => 1,
            'title' => 'Operation successful.',
        ];
    }
    
}
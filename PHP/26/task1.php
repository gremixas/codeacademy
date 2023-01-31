<?php

declare(strict_types=1);

class ValidationException extends \Exception{}

class AmountValidator {
    public function validate(int $amount) {
        if ($amount < 0) {
            throw new \ValidationException("Amount must be a positive number");
        } else {
            echo $amount . PHP_EOL;
        }
    }
}

try {
    $validator = new AmountValidator();
    $validator->validate(5);
    $validator->validate(-1);
} catch (ValidationException $exception) {
    echo "Validation error: " . $exception->getMessage() . PHP_EOL;
}


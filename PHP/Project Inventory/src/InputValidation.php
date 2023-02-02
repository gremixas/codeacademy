<?php

namespace src;

date_default_timezone_set("Europe/Vilnius");

class InputValidation {
    public function checkSyntax(string $checkString): void
    {
        $args = explode(",", $checkString);
        foreach ($args as $arg)
        {
            $variables = explode(':', $arg);
            $id = $variables[0] ?? null;
            $quantity = $variables[1] ?? null;

            if (!is_numeric($id) || !is_numeric($quantity))
            {
                throw new InputValidationException("Invalid input " . $checkString . ". Format: id:quantity,id:quantity");
            }
        }
    }
}



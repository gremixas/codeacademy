<?php

declare(strict_types=1);

/*
 
1. Sukurti klasę File
2. Į konstruktorių paduoti kelią iki failo, kuris bus saugomas savybėj $filePath
3. Parašykite metodą getFileContents, kuris paima failo turinį. Jei failas neegzistuoja,
metamas Exception. Jei egzistuoja, grąžinamas jo turinys.
4. Parašykite metodą createFile. Jei failas egzistuoja, metama išlyga Exception.Jei neegzistuoja,
sukuriamas failas su touch() metodu.
5. Parašykite metodą writeToFile. Metodas priima tekstą įrašymui string $content ir bool $overwrite = false.
        Patikrinama:
        Ar failas egzistuoja
        Ar failas turi turinį
        Ar nustatyta overwrite
   
        Jei failas egzistuoja ir turi turinį, bet overwrite yra false, metamas exception, kad negalim perrašyti.
 
        Jei turinys tuščias arba  overwrite true, atliekamas įrašymas.
*/
// Visi metodai išbandomi try catch bloke
class FileException extends \Exception{};

class File {
    public function __construct(public string $FilePath = ""){}

    public function getFileContents(): string {
        if (!file_exists($this->FilePath)) {
            throw new FileException("File does not exist");
        } else {
            return file_get_contents($this->FilePath);
        }
    }

    public function createFile(): void {
        if (file_exists($this->FilePath)) {
            throw new FileException("File already exist");
        } else {
            touch($this->FilePath);
        }
    }

    public function writeToFile(string $content, bool $overwrite = false): void {
        if ($this->getFileContents() && !$overwrite) {
            throw new FileException("File is not empty OR overwrite is FALSE");
        }
        file_put_contents($this->FilePath, $content);
    }
}

$file = new File(__DIR__ . "/file.txt");

try {
    // $file->createFile();
    echo $file->getFileContents();
    // $file->writeToFile("Opapa", true);
} catch (FileException $exception) {
    echo "File error: " . $exception->getMessage() . PHP_EOL;
}


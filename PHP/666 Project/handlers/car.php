<?php

class Car {

    public function __construct(
        public string $id = "",
        public string $make = "",
        public string $model = "",
        public string $year = "",
        public string $engine = "",
        public string $transmission = "",
        public string $price = "",
        public string $image = "",
    ){}

    public static function createCar(Car $car): self {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $allIds = array_column($cars, "id");
        $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
        $car->id = $newId;
        $cars[] = $car;
        Database::writeDbFile(CARS_FILE_PATH, $cars);
        return $car;
    }

    public static function freeId(): int {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $allIds = array_column($cars, "id");
        $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
        return $newId;
    }

    public static function findCarById(string $id): array {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $car = array_values(array_filter($cars, fn($car) => $car['id'] === $id))[0] ?? [];
        return $car;
    }
    
    public static function deleteCarById(string $id): string {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $cars = array_values(array_filter($cars, fn($car) => $car['id'] !== $id)) ?? [];
        Database::writeDbFile(CARS_FILE_PATH, $cars);
        return $id;
    }

    public static function updateCar(array $updatedCar): array {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $carIndex = array_search($updatedCar['id'], array_column($cars, "id")) ?? "-1";
        if ($carIndex !== "-1") {
            $cars[$carIndex] = array_replace($cars[$carIndex], $updatedCar);
            Database::writeDbFile(CARS_FILE_PATH, $cars);
        }
        return $updatedCar;
    }

    public static function drawCars($adminLoggedIn = 0): string {
        $returnValue = "";
        $cars = Database::readDbFile(CARS_FILE_PATH);
        foreach ($cars as $car) {
            $returnValue .= "<div class=car-card data-carid=" . $car['id'] . ">
                                <div class='car-img-container'>
                                    <img class='car-img' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "car_images/" . $car['image'] . ">
                                </div>
                                <div class='car-row'>
                                    <span class='car-make'>" . $car['make'] . "</span>
                                    <span class='car-model'>" . $car['model'] . "</span>
                                </div>
                                <div class='car-row'>
                                    <img class='car-icon' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "/assets/engine.svg>
                                    <span class='car-engine'>" . $car['engine'] . "</span>
                                    </div>
                                    <div class='car-row'>
                                    <img class='car-icon' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "/assets/gears.svg>
                                    <span class='car-transmission'>" . $car['transmission'] . "</span>
                                </div>
                                <span class='car-year'>" . $car['year'] . "</span>
                                <span class='car-price'>" . $car['price'] . "&euro;</span>" .
                                ($adminLoggedIn ? "
                                        <a class='car-button car-update' href='./update_form.php?id=" . $car['id'] . "'>Edit</a>
                                        <a class='car-button car-delete' href='./delete_form.php?id=" . $car['id'] . "'>Delete</a>
                                    " : "")
                                . "
                            </div>";
        }
        return $returnValue;
    }

    public static function drawCarById(string $id): string {
        $returnValue = "";
        $car = self::findCarById($id);
        $returnValue .= "<div class=car-card data-carid=" . $car['id'] . ">
                            <div class='car-img-container'>
                                <img class='car-img' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "car_images/" . $car['image'] . ">
                            </div>
                            <div class='car-row'>
                                <span class='car-make'>" . $car['make'] . "</span>
                                <span class='car-model'>" . $car['model'] . "</span>
                            </div>
                            <div class='car-row'>
                                <img class='car-icon' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "/assets/engine.svg>
                                <span class='car-engine'>" . $car['engine'] . "</span>
                                </div>
                                <div class='car-row'>
                                <img class='car-icon' src=" . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) . "/assets/gears.svg>
                                <span class='car-transmission'>" . $car['transmission'] . "</span>
                            </div>
                            <span class='car-year'>" . $car['year'] . "</span>
                            <span class='car-price'>" . $car['price'] . "&euro;</span>
                        </div>";

        return $returnValue;
    }
}
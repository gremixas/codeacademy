<?php

class Car {

    public function __construct(
        public string $make = "",
        public string $model = "",
        public string $year = "",
        public string $engine = "",
        public string $transmission = "",
        public string $price = "",
        public string $image = "",
        public string $id = "",
    ){}

    public static function createCar(Car $car): void {
        $cars = Database::readDbFile(CARS_FILE_PATH);
        $allIds = array_column($cars, "id");
        $newId = !empty($allIds) ? (max($allIds) + 1) : 1;
        $car->id = $newId;
        $cars[] = $car;
        Database::writeDbFile(CARS_FILE_PATH, $cars);
    }

    public static function drawCars($adminLoggedIn = 0): string {
        $returnValue = "";
        $cars = Database::readDbFile(CARS_FILE_PATH);
        // dump($adminLoggedIn);
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
                                        <a class='car-button car-delete' href='./delete.php?id=" . $car['id'] . "'>Delete</a>
                                    " : "")
                                . "
                            </div>";
        }
        return $returnValue;
    }
}
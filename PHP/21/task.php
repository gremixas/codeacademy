<?php

declare(strict_types=1);

/*
Sukurkite klasių hierarchiją, skirtą valdyti kliento prekių krepšelį.
Reikalingos klasės - Cart, CartItem, CartDiscount, Customer.

Customer metodai:
__construct(string $name, string $surname, string $level)
getFullName()
getLevel() - gali būti 'A', 'B' arba 'C'

CartItem metodai:
__construct(string $name, int $price, int $quantity)
getName() - prekės pavadinimas pvz.: 'Iphone 13'
getPrice() - prekė kaina pvz.: 1300 (naudokite int)
getQuantity() - prekės vienetų kiekis pvz.: 3 (naudokite int)

CartDiscount metodai:
__construct(int $percent, string $customerLevel)
getDiscountPercent() - nuolaidos procentas pvz.: 15
getCustomerLevel() - gali būti 'A', 'B' arba 'C'

Cart metodai:
__construct(Customer $customer)
addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve.
addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus
getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis.
    Suapvalinkite iki 2 skaičių po kablelio
    Skaičiuojant 'total' nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos,
    kurių 'customerLevel' sutampa su krepšelio kliento leveliu.
    Pvz.: (6 * 25,90) *  (100 - (15 + 2)) / 100
printSummary() - turi isspausdinti krepselio santrauka
Kaip turėtų būti kviečiamas kodas:
$customer = new Customer('John', 'Smith', 'A');
$cart = new Cart($customer);
$iphone = new CartItem('Iphone 13', 1300, 1);
$airpods = new CartItem('Airpods Pro', 200, 2);
$cart->addItem($iphone);
$cart->addItem($airpods);
$cartDiscount1 = new CartDiscount(15, 'A');
$cart->addDiscount($cartDiscount1);
$cartDiscount2 = new CartDiscount(2, 'A');
$cart->addDiscount($cartDiscount2);
$cartDiscount3 = new CartDiscount(20, 'B');
$cart->addDiscount($cartDiscount2);
$total = $cart->getTotal();
var_dump($total); // 1249.5
$cart->printSummary();
Customer: John Smith
Customer level: A
Items:
* Iphone 13 - 1300 x 2 = 2600 eur
* Airpods Pro - 200 x 1 = 200 eur
Discount: 17% - 476 eur
Total: 2324 eur
1 dalis:
Susikurkite CartItem, CartDiscount ir Customer klases
2 dalis:
Pasirašykite klasę Cart. Pridėkite jai metodus __construct, addItem ir addDiscount
3 dalis:
Įgyvendinkite logiką getTotal() metodui
4 dalis:
Įgyvendinkite logiką printSummary() metodui
*/

class Cart {
    public array $cartItems = [];
    public array $discounts = [];

    public function __construct(public Customer $customer){}

    public function addItem(CartItem $cartItem): self {
        $this->cartItems[] = $cartItem;
        return $this;
    }
    // addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve.
    
    public function addDiscount(CartDiscount $cartDiscount): self {
        $this->discounts[] = $cartDiscount;
        return $this;
    }
    // addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus

    public function getTotal(): int|float {
        $subTotal = array_reduce($this->cartItems, function($acc, $cartItem) {
            return $acc += $cartItem->getPrice() * $cartItem->getQuantity();
        }, 0);
        $discount = array_reduce($this->discounts, function ($acc, $discount) {
            return $discount->getCustomerLevel() === $this->customer->getLevel() ? $acc += $discount->getDiscountPercent() : $acc;
        }, 0);
        return $subTotal * ((100 - $discount) / 100);
    }
    // getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis.
    //     Suapvalinkite iki 2 skaičių po kablelio
    //     Skaičiuojant 'total' nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos,
    //     kurių 'customerLevel' sutampa su krepšelio kliento leveliu.
    //     Pvz.: (6 * 25,90) *  (100 - (15 + 2)) / 100

    public function printSummary(): void {
        $subTotal = array_reduce($this->cartItems, function($acc, $cartItem) {
            return $acc += $cartItem->getPrice() * $cartItem->getQuantity();
        }, 0);
        $discount = array_reduce($this->discounts, function ($acc, $discount) {
            return $discount->getCustomerLevel() === $this->customer->getLevel() ? $acc += $discount->getDiscountPercent() : $acc;
        }, 0);
        $total = $subTotal * ((100 - $discount) / 100);

        echo "Customer: {$this->customer->getFullName()}\n";
        echo "Customer level: {$this->customer->getLevel()}\n";
        echo "Items:\n";
        foreach($this->cartItems as $cartItem) {
            echo "* {$cartItem->getName()} >>> {$cartItem->getPrice()} x {$cartItem->getQuantity()} = " . $cartItem->getPrice() * $cartItem->getQuantity() . "\n";
        }
        echo "Discount: {$discount}% >>> " . $subTotal - $total . " eur\n";
        echo "Total: {$total} eur\n";
    }
    // printSummary() - turi isspausdinti krepselio santrauka
    // Customer: John Smith
    // Customer level: A
    // Items:
    // * Iphone 13 - 1300 x 2 = 2600 eur
    // * Airpods Pro - 200 x 1 = 200 eur
    // Discount: 17% - 476 eur
    // Total: 2324 eur

}

class Customer{
    public function __construct(public string $name, public string $surname, public string $level){}

    public function getFullName(): string {
        return $this->name . " " . $this->surname;
    }

    public function getLevel(): string {
        return $this->level;
    }
}
class CartItem{
    public function __construct(public string $name, public int $price, public int $quantity){}

    public function getName(): string {
        return $this->name;
    }
    
    public function getPrice(): int|float {
        return $this->price;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }
}

class CartDiscount{
    public function __construct(public int $percent, public string $customerLevel){}

    public function getDiscountPercent(): int|float {
        return $this->percent;
    }

    public function getCustomerLevel(): string {
        return $this->customerLevel;
    }
}

$customer = new Customer('John', 'Smith', 'A');
$cart = new Cart($customer);

$iphone = new CartItem('Iphone 13', 1300, 1);
$airpods = new CartItem('Airpods Pro', 200, 2);

$cart->addItem($iphone)->addItem($airpods);

$cartDiscount1 = new CartDiscount(15, 'A');
$cart->addDiscount($cartDiscount1);

$cartDiscount2 = new CartDiscount(2, 'A');
$cart->addDiscount($cartDiscount2);

$cartDiscount3 = new CartDiscount(20, 'B');
$cart->addDiscount($cartDiscount3);

$total = $cart->getTotal();
var_dump($total); // 1249.5
$cart->printSummary();
// Customer: John Smith
// Customer level: A
// Items:
// * Iphone 13 - 1300 x 2 = 2600 eur
// * Airpods Pro - 200 x 1 = 200 eur
// Discount: 17% - 476 eur
// Total: 2324 eur

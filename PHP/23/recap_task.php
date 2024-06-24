<?php
/*1. Deklarauoti klasę Product.
2. Product klasė turi 3 savybės - name - string, price - float, type - string.
3. Product klasės turi konstruktorių, kuris užpildo savybes. Padaryti pavyzdžius 2 būdais - įprastu ir Property Promotion.
4. Product klasė turi 3 metodus getName, getPrice, getType.
5. Visi metodai grąžina atitinkamas savybes.
6. Inicializuokite Product klasę 3 kartus ir sukurkite 3 objektus, perduokite reikiamas reikšmes.*/

// class Product {
//     public string $name = "";
//     public float $price = 0.0;
//     public string $type = "";
    
//     public function __construct(string $name = "", float $price = 0.0, string $type = "") {
//         $this->name = $name;
//         $this->price = $price;
//         $this->type = $type;
//     }
// }

class Product {
    public function __construct(private string $name = "", private float $price = 0.0, private string $type = "") {}

    public function getName(): string {
        return $this->name;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getType(): string {
        return $this->type;
    }
}

$milk = new Product("milk", 1.79, "groceries");
$bread = new Product("bread", 2.59, "groceries");
$paper = new Product("paper", 5.89, "groceries");

/*
7. Sukurti klasę Order
8. Order klasė turi savybes products - array, total - float
9. Order klasė turi metoda addProduct, kuris priima Product klasės egzempliorių - konkretų objektą.
10.addProduct() metodas įdeda produkto objektą į Order klasės savybę - Products masyvą.
11.addProduct() kviečiamas 3 kartus, kas kart perduodant skirtingą objektąir Order klasės savybė Products kaupia Produktų objektus.
12.Order klasė turi metodą total(), kuris suskaičiuoja ir grąžiną visų priduktų kainų sumą
13.Inicializuokite Order klasę.
14.Pridėkite 3 produktus.
15 Išveskite total vertę.*/

class Order {
    public function __construct(public array $products = [], public float $total = 0.0){}

    public function addProduct(Product $product): self {
        $this->products[] = $product;
        return $this;
    }

    public function total(): float {
        $this->total = array_reduce($this->products, fn($carry, $product) => $carry += $product->getPrice());
        return $this->total;
    }
}

// $order = new Order();
// $order->addProduct($milk)->addProduct($bread)->addProduct($paper);
$order = new Order([$milk, $bread]);
$order->addProduct($paper);

echo $order->total();

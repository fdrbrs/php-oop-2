<!-- 
Descrizione:
--Inventate due classi a piacere una che estende l'altra.
--Ciascuna classe avrá un constuctor e un paio di metodi a piacere.
--Create un paio di traits da usare nella classe figlia.
--in una funzione gestite eventuali errori usando un exception
--create una struttura dati (array di oggetti) e usate un ciclo foreach per mostrare i dati a schermo (con html, non var_dump)
invocate il metodo nel quale avete usato l'exception passado al metodo dei valori sbagliati
usate il try/catch per gestire il la richiesta e mostrare all'utente un messaggio di errore.
try {to have fun} catch (panic $p) { $p->getMessage() }
 -->

<?php

trait Position {
    public $isle;
    public $compartment;

    function setPositionIsle($int) {
        if (!is_int($int)) {
            throw new Exception('Position for Isle must be a number');
        }
        $this->isle = $int;
    }

    /* try {
        echo setPositionIsle('ciao');
    } catch (Exception $e) {
        echo 'Caught exception: ' .  $e->getMessage();
    } */

    function setPositionCompartment($string) {
        if (!is_string($string)) {
            throw new Exception('Position for Compartment must be a string');
        }
        $this->compartment = $string;
    }

    /* try {
        echo setPositionCompartment(88);
    } catch (Exception $e) {
        echo 'Caught exception: ' .  $e->getMessage();
    } */

    function getPosition() {
        return 'Position: ' . 'Isle Number: ' . $this->isle . ' Compartment: ' . $this->compartment;
    }
}

trait Packaging {
    public $material;
    public $weight;
}

class Vegetable {
    public $name;
    public $price;
    public $date;
    public $origin;
    public $weight;

    public function __construct($name, $price, $date, $origin, $weight){
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
        $this->origin = $origin;
        $this->weight = $weight;
    }

    public function setDiscount($discount){
        $this->price = $this->price - $discount;
    }

    public function getPrice(){
        return $this->price;
    }
}

class Fruit extends Vegetable {

    use Position, Packaging;

    public $color;
    public $variety;
    public $isFresh = true;

    public function __construct($name, $price, $date, $origin, $weight, $color, $variety){
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
        $this->origin = $origin;
        $this->weight = $weight;
        $this->color = $color;
        $this->variety = $variety;
    }

    public function setImportTax($origin){
        if ($origin !== 'Italy'){
            $this->price = $this->price + 0.25;
        }
    }

    public function noMoreFresh(){
        $this->isFresh = false;
    }

    public function freshCheck(){
        if ($this->isFresh === true) {
            return 'Yes';
        } else {
            return 'No';
        }
    }
} 

/* $ordine001 = new Vegetable('salad', 0.79, '13-06-2021', 'Spain', 32);
#var_dump($ordine001);

$ordine002 = new Fruit('apple', 2.03, '15-06-2021', 'Italy', 50, 'red', 'fuji');
#var_dump($ordine002);

$ordine003 = new Fruit('banana', 10, '14-06-2021', 'Ecuador', 4, 'yellow', 'cavendish');

$ordine003->setDiscount(3);
echo 'prezzo scontato Banane: ' . $ordine003->getPrice() . ' €';
$ordine002->setImportTax('russia');
echo $ordine002->getPrice();

$ordine003->noMoreFresh();
echo ' is it fresh? answer: ' . $ordine003->freshCheck(); 

$ordine002->setPositionIsle(2);
$ordine002->setPositionCompartment('fruit');
echo $ordine002->getPosition(); */

$fruitStock = [
    new Fruit ('apple', 2.03, '15-06-2021', 'Italy', 50, 'red', 'fuji'),
    new Fruit ('banana', 3.53, '16-06-2021', 'Ecuador', 30, 'yellow', 'cavendish'),
    new Fruit ('avocado', 6.10, '18-06-2021', 'Ecuador', 10, 'green', 'haas'),
    new Fruit ('pear', 1.88, '15-06-2021', 'Spain', 28, 'green', 'williams'),
    new Fruit ('coconut', 8.16, '12-06-2021', 'Brasil', 8, 'brown', 'standard'),
    new Fruit ('pineapple', 10.82, '10-06-2021', 'Cuba', 5, 'brown', 'parguazensis'),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo 'Fruits Stock' ?></h1>

    <ul>
    <?php foreach ($fruitStock as $fruit) : ?>
        <li>
            <?= 'fruit: ' . '<strong>' . $fruit->name . '</strong>' . ' | ' ?>
            <?= 'variety: ' . '<strong>' . $fruit->variety . '</strong>' . ' | ' ?> 
            <?= 'color: ' . '<strong>' . $fruit->color . '</strong>' . ' | ' ?>
            <?= 'origin: ' . '<strong>' . $fruit->origin . '</strong>' . ' | ' ?> 
            <?= 'price: ' . '<strong>' . $fruit->price . ' €' . '</strong>'  . ' | '?> 
            <?= 'date of arrival: ' . '<strong>' . $fruit->date . '</strong>'  . ' | '?> 
            <?= 'stock weight: ' . '<strong>' . $fruit->weight . ' Kg' . '</strong>' ?> 
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
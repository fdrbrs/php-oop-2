<!-- 
Descrizione:
--Inventate due classi a piacere una che estende l'altra.
--Ciascuna classe avrá un constuctor e un paio di metodi a piacere.
--Create un paio di traits da usare nella classe figlia.
in una funzione gestite eventuali errori usando un exception
create una struttura dati (array di oggetti) e usate un ciclo foreach per mostrare i dati a schermo (con html, non var_dump)
invocate il metodo nel quale avete usato l'exception passado al metodo dei valori sbagliati
usate il try/catch per gestire il la richiesta e mostrare all'utente un messaggio di errore.
try {to have fun} catch (panic $p) { $p->getMessage() }
 -->

<?php

trait Position {
    public $isle;
    public $compartment;

    function setPositionIsle($int) {
        if (condition) {
            # code...
        }
        $this->isle = $int
    }

    function getPosition() {
        return 'Position: ' . 'Isle ' . $this->isle . ' Compartment: ' . $compartment;
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

$ordine001 = new Vegetable('salad', 0.79, '13-06-2021', 'Spain', 32);
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
    <h1><?php echo 'ALLORA' ?></h1>
</body>
</html>
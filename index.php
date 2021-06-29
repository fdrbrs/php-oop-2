<!-- 
    Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online; ad esempio, ci saranno sicuramente dei prodotti da acquistare e degli utenti che fanno shopping.
Strutturare le classi gestendo l'ereditarietà dove necessario; ad esempio ci potrebbero essere degli utenti premium che hanno diritto a degli sconti esclusivi, oppure diverse tipologie di prodotti.
Provate a far interagire tra di loro gli oggetti: ad esempio, l'utente dello shop inserisce una carta di credito...
$c = new CreditCard(..); 
$user->insertCreditCard($c);
 -->

 <?php

class User{
    public $username;
    public $email;
    public $age;
    public $address;

}

class PaymentMethod {
    protected $name;
    protected $lastname;
    protected $billAddress;

}

class CrediCard extends PaymentMethod {
    protected $cardNumber;
}

class PayPal extends PaymentMethod {
    protected $paypalMail;
}



class Product{
    public $name;
    public $desc;
    public $price;
    public $discount;
    public $manufacturer;
}

class Book extends Product{
    public $author;
}

class Tshirt extends Product{
    public $size;
    public $color;
    
}





 
 ?>
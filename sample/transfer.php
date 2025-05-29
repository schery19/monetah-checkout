<?php

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET, false);

//Effectuer un transfert
$amount = 10; //Le montant du transfert
$currency = "htg"; //Devise à transferer
$receiver = "schneiderchery42@gmail.com"; //email du destinataire

$transfert = $monetah->transfert($amount, $currency, $receiver);

var_dump($transfert);

?>
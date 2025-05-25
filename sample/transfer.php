<?php

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET);

//Effectuer un transfert
$amount = 120; //Le montant du transfert
$currency = "htg"; //Devise à transferer

$transfert = $monetah->transfert($amount, $currency);

var_dump($transfert);

?>
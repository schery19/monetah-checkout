<?php

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET);

//Effectuer un transfert
$amount = 280; //Le montant du transfert
$currency = "usd"; //Devise à transferer
$receiver = "RECEIVER_EMAIL"; //email du destinataire

$transfert = $monetah->transfert($amount, $currency, $receiver);

var_dump($transfert);

?>
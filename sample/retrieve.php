<?php
session_start();

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET, false);

$payment = $monetah->retrieveOrder($_SESSION['order_id']);

var_dump($payment);

//Effectuer un transfert
$amount = ($payment->amount) - ($payment->amount * 0.02); //Le montant du transfert
$currency = "htg"; //Devise à transferer
$receiver = "EMAIL_DESTINATAIRE"; //email du destinataire

$transfert = $monetah->transfert($amount, $currency, $receiver);

?>

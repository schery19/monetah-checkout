<?php
session_start();

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET, false);

//Effectuer un paiement


$amount = 20; //Le montant du paiement
$currency = "htg"; //Devise à facturer

$payToken = $monetah->checkout($amount, $currency, null, true);

$_SESSION['order_id'] = $payToken->reference;

var_dump($payToken);

?>

<p>
	<a href='<?= $payToken->payment_url; ?>'>
		<img src='https://monetah.com/resources/assets/images/logo.png' width="120px" height="50px">
	</a>
</p>
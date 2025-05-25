<?php
session_start();

require 'vendor/autoload.php';
require 'credentials.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET);

//Effectuer un paiement


$amount = 120; //Le montant du paiement
$currency = "htg"; //Devise à facturer

$payToken = $monetah->checkout($amount, $currency);

$_SESSION['order_id'] = $payToken->reference;

?>

<p>
	<a href='<?= $payToken->payment_url; ?>'>
		<img src='https://monetah.com/resources/assets/images/logo.png' width="120px" height="50px">
	</a>
</p>
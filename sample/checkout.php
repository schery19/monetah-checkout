<?php
session_start();

require 'vendor/autoload.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah("de311cdea1c744410d0ec2568c0c07g5", "cb24ecbdc404614821ee931eb382900e6f288292cf3a68642b8c7211ba35e222");

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
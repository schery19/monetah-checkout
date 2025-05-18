<?php
session_start();

require 'vendor/autoload.php';


use Monetah\checkout\Monetah;

$monetah = new Monetah("de311cdea1c744410d0ec2568c0c07g5", "cb24ecbdc404614821ee931eb382900e6f288292cf3a68642b8c7211ba35e222");

$payment = $monetah->retrieveOrder($_SESSION['order_id']);

var_dump($payment);

?>

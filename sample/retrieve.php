<?php
session_start();

require '../init.php';
require 'credentials.php';

use Monetah\checkout\Monetah;

$monetah = new Monetah(CLIENT_ID, CLIENT_SECRET);

$payment = $monetah->retrieveOrder($_SESSION['order_id']);

var_dump($payment);

?>

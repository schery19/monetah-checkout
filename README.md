<center><img src='https://monetah.com/resources/assets/images/logo.png' width="150px" height="150px"></center>

# Monetah-Checkout
Une librairie PHP permettant d'utiliser les services Monetah dans un projet


Installation
-----

## Via Composer

Utilisez [composer](https://getcomposer.org/download/) pour installer Monetah et ses dépendances, après avoir modifié son chemin [global](https://askcodez.com/modifier-le-chemin-global-du-composeur-windows.html), exécutez la commande suivante sur votre terminal en vous positionnant dans le dossier de votre projet :

```bash
composer require monetah/monetah-checkout
```

Ensuite dans votre code, utilisez l'[autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading) de Composer : 

```php
require_once 'vendor/autoload.php';
```


## Installation manuelle

Si vous ne souhaitez pas utiliser Composer, vous pouvez télécharger la [dernière version](https://github.com/schery19/monetah-checkout/releases), et ensuite incluez le fichier `init.php` dans votre code :

```php
require_once '/path/to/monetah-checkout/init.php';
```



Prérequis
-----

Pour utiliser Monetah il faut d'abord avoir un compte business sur le site de [Monetah](https://monetaht.online), ce compte vous servira pour tester votre intégration.

Après avoir entré les informations nécessaires, vous obtiendrez votre Client id et Client secret qui seront très utiles pour l'utilisation de monetah-checkout.


Utilisations
-----

Dans un fichier dans le repertoire source (src/) de votre projet :
Instantiez l'objet Monetah avec comme arguments : `$clientId` et `$clientSecret` qui sont à récupérer sur le site [Monetah](https://monetaht.online) après avoir créé votre compte business, un troisième argument `$debug` spécifie l'environnement, par défaut il est à `true`, passez le à `false` en mode production.

```php

use Monetah\checkout\Monetah;

$clientId = "<votre client id>";
$clientSecret = "<votre client secret>";

$monetah = new Monetah($clientId, $clientSecret);

```

Pour effectuer un paiement vous utilisez l'objet PaymentToken, qui vous donnera par la suite un moyen d'obtenir le lien qui dirigera l'utilisateur sur le middleware de paiement Monetah pour finaliser le processus :

```php
<?php
//Effectuer un paiement

$orderId = 93; //Une identification unique pour le paiement
$amount = 120; //Le montant du paiement
$currency = "usd" //Devise à facturer

$payToken = $monetah->checkout($amount, $currency, $orderId);

?>

<p>
	<a href='<?= $payToken->payment_url; ?>'>
		<img src='https://monetaht.online/resources/assets/images/monetah_pay.png' width="120px" height="50px">
	</a>
</p>

```

Après finalisation du processus de paiement, vous pouvez récupérer les informations à partir de l'objet PaymentDetails

```php
$monetah = new Monetah($id, $secret);

$payDetails = $monetah->retrievePayment(466987);

var_dump($payDetails);

```


<strong>Notes :</strong>
Vous pouvez aussi récupérer les détails du paiement avec la méthode `retrieveTransaction($transaction_id)` sur l'objet Monetah en utilisant le paramètre <b>transactionId</b> dans l'url de retour fournit par l'api monetah


Extras
-----

Pour toutes suggestions ou problèmes rencontrés, contacter au contact@monetaht.online / monetaht@gmail.com

<b>Attention :</b> A utiliser avec parcimonie

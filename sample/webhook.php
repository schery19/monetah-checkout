<?php

session_start();

require 'vendor/autoload.php';
require 'credentials.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $payload = file_get_contents('php://input');

    
    $signatureHeader = getallheaders()['X-Monetah-Webhook'] ?? '';
    $secret = CLIENT_SECRET; // Assurez-vous que CLIENT_SECRET est défini dans credentials.php

    $expectedSignature = base64_decode($signatureHeader);

    if (hash_equals($expectedSignature, $signatureHeader)) {
        // Authentique, écrire le payload dans un fichier
        http_response_code(200);
        file_put_contents('webhook_payload.json', $payload);
    } else {
        http_response_code(401);
    }
} else {
    http_response_code(405);
}



?>
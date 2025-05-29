<?php

use Monetah\checkout\Constants;


class Configuration {


    public static function getProductionConfig() {
        return [
            'mode'=>Constants::LIVE,
            'BASE_URL'=>Constants::BASE_URL,
            'ENDPOINT'=>Constants::BASE_URL.Constants::API_ENDPOINT,
            'OAUTH_TOKEN'=>Constants::BASE_URL.Constants::OAUTH_TOKEN_URI,
            'REDIRECT'=>Constants::REDIRECT_URL,
            'GATEWAY_PAYMENT'=>Constants::GATEWAY_PAYMENT_URI
        ];
    }


    public static function getSandboxConfig() {

        $BASE_SANDBOX = 'https://sandbox.monetah.com';
        
        return [
            'mode'=>Constants::SANDBOX,
            'BASE_URL'=>$BASE_SANDBOX,
            'ENDPOINT'=>$BASE_SANDBOX.Constants::API_ENDPOINT,
            'OAUTH_TOKEN'=>$BASE_SANDBOX.Constants::OAUTH_TOKEN_URI,
            'REDIRECT'=>Constants::SANDBOX_REDIRECT_URL,
            'GATEWAY_PAYMENT'=>Constants::SANDBOX_GATEWAY_PAYMENT_URI
            
        ];
    }
}


?>
<?php

namespace Monetah\checkout;


class PaymentToken {

    private Credentials $credentials;

    public $payment_id;
    public $expires_at;
    public $token;

    public $payment_url;



    public function __construct(Credentials $credentials, array $data) {
        $this->credentials = $credentials;

        $this->payment_id = $data['payment_id'];
        $this->expires_at = $data['expires_at'];
        $this->token = $data['token'];


        $this->payment_url = Constants::GATEWAY_PAYMENT_URI.'/'.$this->token;

    }


}

?>
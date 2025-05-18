<?php

namespace Monetah\checkout;


class PaymentToken {

    private Credentials $credentials;

    public $error;
    public $path;
    public $status;
    public $mode;
    public $timestamp;
    public $message;


    public $payment_id;
    public $expires_at;
    public $token;
    public $qr_mode;

    public $payment_url;



    public function __construct(Credentials $credentials, array $data) {
        $this->credentials = $credentials;

        $this->error = $data['error'];
        $this->path = $data['path'];
        $this->status = $data['status'];
        $this->mode = $data['mode'];
        $this->timestamp = $data['timestamp'];
        $this->message = $data['message'];

        if(isset($data['data'])) {
            $data = $data['data']['payment_token'];
            
            $this->payment_id = $data['payment_id'];
            $this->expires_at = $data['expires_at'];
            $this->token = $data['token'];
            $this->qr_mode = $data['qr_mode'];
        }


        $this->payment_url = Constants::GATEWAY_PAYMENT_URI.'/'.$this->token.'?qr='.$this->qr_mode;

    }


}

?>
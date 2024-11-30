<?php

namespace Monetah\checkout;


class PaymentDetails {

    private Credentials $credentials;

    public $error;
    public $path;
    public $status;
    public $mode;
    public $timestamp;
    public $message;


    public $reference;
    public $transaction_id;
    public $payment_id;
    public $amount;
    public $currency;
    public $payer;
    public $description;



    public function __construct(Credentials $credentials, array $data) {
        $this->credentials = $credentials;

        $this->error = $data['error'];
        $this->path = $data['path'];
        $this->status = $data['status'];
        $this->mode = $data['mode'];
        $this->timestamp = $data['timestamp'];
        $this->message = $data['message'];

        if(isset($data['data'])) {
            $data = $data['data']['transaction'];
            
            $this->reference = $data['reference'];
            $this->transaction_id = $data['transaction_id'];
            $this->payment_id = $data['id'];
            $this->amount = $data['amount'];
            $this->currency = $data['currency'];
            $this->payer = $data['payer'];
            $this->description = $data['description'];
        }


    }


}

?>
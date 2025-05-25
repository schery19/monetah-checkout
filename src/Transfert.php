<?php

namespace Monetah\checkout;


class Transfert {

    private Credentials $credentials;

    public $error;
    public $path;
    public $status;
    public $mode;
    public $timestamp;
    public $message;


    public $reference;
    public $sender;
    public $receiver;
    public $amount;
    public $currency;
    public $description;
    public $transfert_status;
    public $created_at;



    public function __construct(Credentials $credentials, array $data) {
        $this->credentials = $credentials;

        $this->error = $data['error'];
        $this->path = $data['path'];
        $this->status = $data['status'];
        $this->mode = $data['mode'];
        $this->timestamp = $data['timestamp'];
        $this->message = $data['message'];

        if(isset($data['data'])) {
            $data = $data['data']['transfert'];
            
            $this->reference = $data['id'];
            $this->sender = $data['sender'];
            $this->receiver = $data['receiver'];
            $this->amount = $data['amount'];
            $this->currency = $data['currency'];
            $this->transfert_status = $data['status'];
            $this->description = $data['description'];
            $this->created_at = $data['created_at'];
        }


    }


}

?>
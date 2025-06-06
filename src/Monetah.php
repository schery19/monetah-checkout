<?php

namespace Monetah\checkout;

use Configuration;
use Monetah\checkout\Constants;


class Monetah {

    private $credentials;

    private $access_token;


    public function __construct($client_id, $client_secret, $debug = true) {

		$configs = $debug ? Configuration::getSandboxConfig() : Configuration::getProductionConfig();

        $this->credentials = new Credentials($client_id, $client_secret, $configs);

        try {
			$this->access_token = $this->getAuthInfos()['access_token'];
		}catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}

    }


    private function getAuthInfos() {

        $url = $this->credentials->getConfigs()['OAUTH_TOKEN']; 

        try {

            $authHeader = base64_encode($this->credentials->getClient_id().':'.$this->credentials->getClient_secret());

			$headers = array('auth' => 'Basic '.$authHeader);

			$data = array('scope'=>"read,write", 'grant_type'=>"client_credentials");
			

			$res = RequestHandler::execute($url, 'POST', $headers, $data);



			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);
			

	 		return json_decode($res['response'], true);


	 	} catch(\Exception $e) {
	 		throw new \Exception($e->getMessage());
	 	}
    }



	public function checkout(float $amount, $currency, $ref = null, $qr_mode = false) {

		$url = $this->credentials->getConfigs()['ENDPOINT'].Constants::PAYMENT_MAKER;

		try {

			$headers = [
				'auth' => "Bearer ".$this->access_token
			];

			$data = [
				'reference' => $ref??uniqid(),
				'amount' => $amount,
				'currency' => $currency,
				'qr_mode' => $qr_mode
			];

			$res = RequestHandler::execute($url, 'POST', $headers, $data);


			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);


			return new PaymentToken($this->credentials, json_decode($res['response'], true));

		} catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}

	}


	public function transfert(float $amount, string $currency, string $receiver, string $description = null) {

		$url = $this->credentials->getConfigs()['ENDPOINT'].Constants::TRANSFERT_MAKER;

		try {

			$headers = [
				'auth' => "Bearer ".$this->access_token
			];

			$data = [
				'amount' => $amount,
				'currency' => $currency,
				'receiver_email' => $receiver,
				'description' => $description
			];

			$res = RequestHandler::execute($url, 'POST', $headers, $data);
			

			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);


			return new Transfert($this->credentials, json_decode($res['response'], true));

		} catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}

	}



	public function retrievePayment($paymentId) {

		$url = $this->credentials->getConfigs()['ENDPOINT'].Constants::RETRIEVE_PAYMENT."/{$paymentId}";

		try {

			$headers = [
				'auth' => "Bearer ".$this->access_token
			];

			$res = RequestHandler::execute($url, 'GET', $headers);

			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);


			return new PaymentDetails($this->credentials, json_decode($res['response'], true));

		} catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}



	public function retrieveTransaction($transactionId) {

		$url = $this->credentials->getConfigs()['ENDPOINT'].Constants::RETRIEVE_TRANSACTION."/{$transactionId}";

		try {

			$headers = [
				'auth' => "Bearer ".$this->access_token
			];

			$res = RequestHandler::execute($url, 'GET', $headers);

			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);
			

			return new PaymentDetails($this->credentials, json_decode($res['response'], true));

		} catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}



	public function retrieveOrder($orderId) {

		$url = $this->credentials->getConfigs()['ENDPOINT'].Constants::RETRIEVE_ORDER."/{$orderId}";

		try {

			$headers = [
				'auth' => "Bearer ".$this->access_token
			];

			$res = RequestHandler::execute($url, 'GET', $headers);

			if($res['code'] >= 400) 
				throw new \Exception(json_decode($res['response'], true)['issues']);
			

			return new PaymentDetails($this->credentials, json_decode($res['response'], true));

		} catch(\Exception $e) {
			throw new \Exception($e->getMessage());
		}
	}



    public function __toString() {
		return "Monetah object: Client_id (".$this->credentials->getClient_id().")";
	}

}


?>
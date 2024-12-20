<?php

namespace Monetah\checkout;

class RequestHandler {

    /**
	 * Exécute une requête
	 * 
	 * @param string $url L'url du serveur qui exécutera la requête
	 * @param string $method Le verbe http utilisé, par défaut : GET 
	 * @param array $headers Les en-têtes de la requête
     * @param array $data Les données à passer dans le corps de la requête
     * @param boolean $debug Définir l'environnement d'exécution, par défaut : true, passez le à false en mode production
     * @param array $options Des paramètres optionnels
     * 
     * @return array
	 * 
	 * @throws \Exception
	 */
    public static function execute(string $url, string $method = 'GET', array $headers = [], array $data = [], $debug = true, array $options = []) {

        $curl = curl_init($url);

        curl_setopt_array($curl, $options);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $options['RETURN_TRANSFER']??true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if($debug) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        if(!empty($data)) {
            $contentType = $headers['Content-Type']??null;

            if(!is_null($contentType)) {

                if($contentType == 'application/json') {
                    $data = json_encode($data);
                } else {
                    $data = http_build_query($data);
                }
            } else {
                $data = http_build_query($data);
            }

            
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        $newHeaders = [];

        foreach($headers as $key=>$value) {
            $newHeaders[] = "$key: $value";
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $newHeaders);

        
        $response = curl_exec($curl);

        if(curl_errno($curl))
            throw new \Exception("Erreur cURL : ".curl_error($curl));
    

	    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $response =  [
            'code'=>$statusCode,
            'response'=>$response
        ];

        
        curl_close($curl);

        return $response;
        
    }


}

?>

<?php
    function getAccessTokenFromWikimedia() {
        $client_id = '7a4afe4f4f6cbd7636d90428521c0b81'; 
        $client_secret = 'b967685a09e139425650a74c24ac6d9c19e72838'; 
        $url = 'https://meta.wikimedia.org/w/rest.php/oauth2/access_token';

        $data = array( // Dati che passerò alla fetch
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
        );

        $curl = curl_init(); // Inizializzo la curl
        curl_setopt($curl, CURLOPT_URL, $url); // Imposto l'URL della curl
        curl_setopt($curl, CURLOPT_POST, 1);   // Imposto la curl a POST
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Imposto i campi della curl con $data
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // Stampa come stringa il risultato della curl

        $response = curl_exec($curl); // Esegui la curl e conserva il risultato in $response
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // dà informazioni sulla curl e conserva in httpCode lo status code
        curl_close($curl); // Chiude la curl

        if ($httpCode === 200) { // Se va bene
            $jsonData = json_decode($response, true); // Trasforma $response (oggetto json) in un array // json_decode($response, true);
            // Handle the JSON response as needed, e.g., return $jsonData['access_token']
            return $jsonData["access_token"]; // json_encode($jsonData['access_token']);
        } else {
            echo "api0 wikipedia fallita: errore ".$httpCode;
            // Handle error cases, e.g., return an error message or false
            return false;
        }
    }
?>
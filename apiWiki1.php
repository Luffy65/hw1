<?php
    include "apiWiki0.php"; // Importo questo file per usare una funzione al suo interno (getAccessTokenFromWikimedia())

    function getFeaturedContentFromWikipedia($accessToken) {
        $today = date('Y/m/d');  // Get today's date in the correct format
        $language = 'en';
        $url = "https://api.wikimedia.org/feed/v1/wikipedia/{$language}/featured/{$today}";
        $header = array(
            "Authorization: Bearer $accessToken"
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // Imposta l'url della curl
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); // Imposta l'header http
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Stampa come stringa il risultato della curl

        $response = curl_exec($ch); // Esegue la curl
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            // echo "apiwiki1 funziona. <br>";
            return $response;
        } else {
            echo "mission failed";
            return false; // Or return an error message/code
        }
    }

    $access_token = getAccessTokenFromWikimedia(); // $access_token è una stringa contenente l'access token
    $risultatoApi1 = getFeaturedContentFromWikipedia($access_token);
    echo $risultatoApi1;
?>
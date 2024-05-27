<?php
    include "configuration.php";

    // La seguente cURL è "Get a player's total champion mastery score, which is the sum of individual champion mastery levels"
    function getInt($puuid)
    {
        $url = "https://euw1.api.riotgames.com/lol/champion-mastery/v4/scores/by-puuid/$puuid?api_key=" . API_KEY;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Stampa come stringa il risultato della cURL
        $result = curl_exec($curl);

        if ($result === false) {
            $error = curl_error($curl);
            curl_close($curl);
            die("maestria api3 cURL Error: $error");
        }

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode === 200) {
            $data = json_decode($result, true); // Decode JSON string into PHP array
            if (is_int($data)) { // Check if the decoded data is an integer
                return $data; // If it is, return the integer value directly (assuming the API returns only the number)
            } else {
                die("API Error: Invalid JSON response.");
            }
        }

        if ($httpCode !== 200) {
            die("API Error: HTTP Code $httpCode");
        }
        
        return $result;
    }

    // Controlla se il puuid esiste prima di fare la cURL
    if (isset($_POST['puuid'])) { // Ottengo il puuid tramite post. In particolare, il messaggio POST viene mandato da javascript.
        $json = getInt($_POST['puuid']);
        echo $json;
    } else {
        echo "Missing puuid parameter"; 
    }
?>
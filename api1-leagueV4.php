<?php
    function getJson($summonerID)
    {
        include "configuration.php"; // Per includere la costante API_KEY
        
        // Per adesso includo il mio summoner ID come costante
        // $summonerID = "5T2ZUo8NOy6NdC8XZO67GqF5k9td-GONY5zM2g9HLXkbnkY";
        $url = "https://euw1.api.riotgames.com/lol/league/v4/entries/by-summoner/$summonerID?api_key=" . API_KEY;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url); // Imposto l'URL della cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // Stampa come stringa il risultato della cURL
        $result = curl_exec($curl);
        
        curl_close($curl);
        return $result;
    }
    
    // Controlla se il summonerID esiste prima di fare la cURL
    if (isset($_POST['summonerID'])) { // Ottengo il puuid tramite post. In particolare, il messaggio POST viene mandato da javascript.
        $json = getJson($_POST['summonerID']);
        echo $json;
    } else {
        echo "Missing summonerID parameter"; 
    }
?>
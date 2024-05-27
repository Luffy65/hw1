<?php
    function getJson()
    {
        include "configuration.php";
        
        $nomeGiocatore = $_POST['nomeGiocatore'];
        $tag = $_POST['tag'];

        $url = "https://europe.api.riotgames.com/riot/account/v1/accounts/by-riot-id/" . $nomeGiocatore . "/" . $tag . "?api_key=" . API_KEY;
        $curl0 = curl_init();
        curl_setopt($curl0, CURLOPT_URL, $url);
        curl_setopt($curl0, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl0);
        curl_close($curl0);
        return $result;
    }
    
    $json = getJson();
    if ($json) {
        echo $json;
    } else {
        echo "Errore accountV1";
    }
?>
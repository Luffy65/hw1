<?php
    include "dbconfig.php";

    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }

    $summonerName = $_POST['favorite'];

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    $query = "SELECT * FROM favorites WHERE username = '".$_SESSION['username']."' AND summonerName = '". mysqli_real_escape_string($conn, $summonerName) ."'";
    $res = mysqli_query($conn, $query);

    if (mysqli_num_rows($res) > 0) {
        echo 'true';
    } else {
        echo 'false';
    }

    mysqli_close($conn);
?>

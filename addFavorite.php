<?php
    include "dbconfig.php";

    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }
    
    // mi connetto al db
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
    if(isset($_POST["favorite"])){

        $favorite = mysqli_real_escape_string($conn, $_POST["favorite"]); // Questo è il nome del giocatore da salvare
        $username = mysqli_real_escape_string($conn, $_SESSION["username"]); // Salvo l'username dell'utente in corso

        // Preparo la query
        $query = "insert into favorites values ('".$username."','".$favorite."')";
        // Effettuo la query
        $res = mysqli_query($conn, $query);
        if($res) echo "0"; // Se va bene
        else echo "-1"; // Se va male
    }
    mysqli_close($conn);
?>
<?php
    include "dbconfig.php";

    session_start();
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
        exit;
    }

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

    if(isset($_POST["favorite"])){
        $favorite = $_POST["favorite"];
        $username = $_SESSION["username"];

        // Prepare the query
        $stmt = $conn->prepare("DELETE FROM favorites WHERE username = ? AND summonerName = ?");
        $stmt->bind_param("ss", $username, $favorite);

        // Execute the query
        if($stmt->execute()) {
            echo "0"; // Success
        } else {
            echo "-1"; // Failure
        }
        $stmt->close();
    }
    mysqli_close($conn);
?>

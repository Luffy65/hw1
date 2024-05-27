<?php
    require_once "dbconfig.php";

    session_start();

    if(isset($_SESSION["username"])) {
        header("Location: index.php");
        exit;
    }

    $error = "";

    // Appena arrivano i dati da una post
    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Creo una connessione col database
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        // conservo come variabile l'username inserito nel login
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        // Preparo la query col solo username
        $query = "SELECT * FROM users WHERE username = '".$username."'"; // o WHERE username = '$username'";

        // Effetto la query e conservo il risultato
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        // Guardo il risultato della query
        if (mysqli_num_rows($res) > 0) {
            $entry = mysqli_fetch_assoc($res); // Ottiene la prossima row del risultato e la converte in un array associativo
            if (password_verify($_POST['password'], $entry['password'])) { // Se la password inserita dall'utente al login non coincide con quella nel database, allora niente. Se coincidono, lo faccio connettere.
                // Imposto i dati della sessione dell'utente
                $_SESSION["username"] = $entry['username'];
                header("Location: index.php");
                mysqli_free_result($res); // The mysqli_free_result() function frees the memory associated with the result.
                mysqli_close($conn); // Chiudo la connessione col database
                exit;
            }
        } else {
            $error = "Username e/o password errati.";
        }
        mysqli_free_result($res);
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="hw1.css"/>
    <script src="hw1.js" defer></script>
    <link rel="icon" href="https://s-lol-web.op.gg/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="login-signup-div">
        <!-- Header -->
        <div class="login-signup-div1">
            <div>
                <a href="https://member.op.gg/" class="flex-none flex items-center">
                    <img src="Immagini/opgg-member.png" alt="opgg-member" class="img-142x20">
                </a>
            </div>    
        </div>

        <!-- Body -->
        <div class="accounts-body-container">
            <div>
                <div class="h2-reg text-center">Log in</div>
                <div class="p3-reg break-keep text-center">Welcome to OP.GG Members’ community — where every game is a Good Game.</div>
                <div class="flex items-center flex-col">
                    <form method="post">
                        <div class="divformlogin">
                            <input placeholder="Username" class="p2-reg w-full px-4 py-3 rounded-md border" type="text"     name="username" required>
                            <input placeholder="Password" class="p2-reg w-full px-4 py-3 rounded-md border" type="password" name="password" required>
                            
                            <?php
                                if($error) {
                                    echo "<span>";
                                    echo $error;
                                    echo "</span>";
                                }
                            ?>
                            
                            <input placeholder="Log in"   class="padx18px pady14px rounded-md" id="submitLogin" type="submit">
                        </div>
                    </form>
                    <div><h4>Non hai un account?</h4></div>
                    <div><a href="signup.php">CREALO SUBITO!!</a></div>
                </div>
            </div>
        </div>
        
        <div id="footer" class="footerlogin">
            <div class="condizioniUso">
                <a class="elem-piccolo inline-block"           href="https://policy.op.gg/last/TERMS_OF_USE?locale=it">Condizioni d'uso</a>
                <a class="elem-piccolo inline-block font-bold" href="https://policy.op.gg/last/PRIVACY_POLICY?locale=it">Informativa sulla privacy</a>
            </div>
        </div>
    </div>
</body>
</html>
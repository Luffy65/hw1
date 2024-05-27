<?php
    require_once 'dbconfig.php';

    function hasCarattereSpeciale($stringa) {
        $caratteriSpeciali = "!£/=?!@#$%^&*()-+'^\|.;,:_°[]<>";
        for ($i = 0; $i < strlen($stringa); $i++) {
            if (strpos($caratteriSpeciali, $stringa[$i]) !== false) {
                return true;
            }
        }
        return false;
    }
    
    function hasNumero($stringa) {
        $caratteriNumerici = "0123456789";
        for ($i = 0; $i < strlen($stringa); $i++) {
            if (strpos($caratteriNumerici, $stringa[$i]) !== false) {
                return true;
            }
        }
        return false;
    }

    $error = array();

    if (!empty($_POST["email"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
    {
        // Mi connetto al database
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        // L'username deve contenere solo caratteri alfanumerici e lunghezza tra 1 e 15 caratteri
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']); // Riceve in ingresso una stringa ed effettua l’escape dei caratteri, evita SQL injection.
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti: ne servono almeno 8";
        }

        if(!hasNumero($_POST["password"]) or !hasCarattereSpeciale($_POST["password"])) {
            $error[] = "La password deve contenere almeno un numero e un carattere speciale: !£/=?!@#$%^&*()-+'^\|.;,:_°[]<>";
        }

        // $error == 0 -> nessun errore
        if (count($error) === 0) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT); // La converto in hash

            // Preparo la query
            $query = "INSERT INTO users VALUES('$email', '$username', '$password')";            
            // Eseguo la query
            if (mysqli_query($conn, $query)) {
                mysqli_close($conn);
                header("Location: login.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) { // Se l'utente ha inserito l'username ma non tutti gli altri campi.
        $error = array("Riempi tutti i campi");
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel='stylesheet' href='hw1.css'>
        <script src='hw1.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://s-lol-web.op.gg/favicon.ico" type="image/x-icon">
        <title>Join opgg!</title>
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
                    <div class="h2-reg text-center">Registrazione</div>
                    <div class="p3-reg break-keep text-center welcome">Welcome to OP.GG Members’ community — where every game is a Good Game.</div>
                    <div class="flex items-center flex-col">
                        <form method="post">
                            <div class="divformlogin">
                                <input placeholder="Email"    class="p2-reg w-full px-4 py-3 rounded-md border" type="email" name="email" required >
                                <input placeholder="Username" class="p2-reg w-full px-4 py-3 rounded-md border pr-16" type="text" name="username" required>
                                <input placeholder="Password" class="p2-reg w-full px-4 py-3 rounded-md border pr-16" type="password" name="password" required>
                                
                                <?php
                                    if(count($error) !== 0) {
                                        echo "<span>";
                                        echo $error[0];
                                        echo "</span>";
                                    }
                                ?>
                                
                                <input placeholder="Log in"   class="padx18px pady14px rounded-md" id="submitLogin" type="submit">
                            </div>
                        </form>
                        <div class="pady14px"><h4>Hai già un account?</h4></div>
                        <div><a href="login.php">Accedi subito!!</a></div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div id="footer" class="footerlogin">
                <div class="condizioniUso">
                    <a class="elem-piccolo inline-block" target="_blank" href="https://policy.op.gg/last/TERMS_OF_USE?locale=it">Condizioni d'uso</a>
                    <a class="elem-piccolo font-bold inline-block" target="_blank" href="https://policy.op.gg/last/PRIVACY_POLICY?locale=it">Informativa sulla privacy</a>
                </div>
            </div>
        </div>
    </body>
</html>
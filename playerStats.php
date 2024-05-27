<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Summoner Stats - League of Legends</title>
    <link rel="stylesheet" href="hw1.css" />
    <script src="hw1.js" defer></script>
    <link rel="icon" href="https://s-lol-web.op.gg/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <article id="intero-sito" class="dark-mode" data-nHomework="1">
        <!-- L'header è un rettangolo pari alla parte azzurra in alto (quindi include anche la striscia blu scuro) -->
        <header class="desktop-header">
            <!-- Primo div figlio diretto dell'header. Contiene un primo menu' di navigazione -->
            <div class="flexbox0">
                <a class="logo" href="https://www.op.gg/">
                    <img src="https://s-lol-web.op.gg/images/icon/opgglogo.svg?v=1708681571653" class="img-65x16" alt="OP.GG">
                </a>
                <nav>
                    <ul>
                        <li>
                            <span>
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/lol.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="League of Legends">
                                <span>League of Legends</span>
                            </span>
                        </li>
                        <li>
                            <a href="https://pal.op.gg/en">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/pal.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="Palworld">
                                <span class="palworld-b">B</span>
                                <span>Palworld</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://op.gg/desktop/">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/dskapp.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="Desktop">
                                <span>Desktop</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://tft.op.gg/">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/tft.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="Teamfight Tactics">
                                <span>Teamfight Tactics</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://valorant.op.gg/">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/val.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="Valorant">
                                <span>Valorant</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://pubg.op.gg/">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/pubg.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="PUBG">
                                <span>PUBG</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://overwatch.op.gg/">
                                <img src="https://opgg-gnb.akamaized.net/static/images/icons/overwatch.svg?image=q_auto,f_webp,w_48,h_48&amp;v=1708681571653" class="img-24x24" alt="OVERWATCH">
                                <span>OVERWATCH</span>
                            </a>
                        </li>                       
                    </ul>
                </nav>
                
                <!-- FAQ -->
                <div class="FAQ">
                    <div>
                        <button type="button" class="button-non-cliccato menu-faq">
                            <span>Contact Us</span>
                        </button>
                        <!-- In questa riga dovrebbe comparire il div menu FAQ quando si preme il pulsante -->
                    </div>
                </div>

                <!-- Dark / Light mode -->
                <div id="divDarkMode">
                    <button class="dark data-mode='light'"></button>
                </div>

                <!-- Lingue -->
                <div class="lingue">
                    <!-- Icona mondo -->
                    <img src="https://s-lol-web.op.gg/images/icon/icon-world-light-blue.svg?v=1710914129937" class="img-24x24" alt="">
                    <!-- Div che contiene il select. Questo div NON cambia quando compare il menù a tendina -->
                    <div class="SelectContainer mondo">
                        <select id="it_IT">
                            <option value="en_US">English</option>
                            <option value="ko_KR">한국어</option>
                            <option value="ja_JP">日本語</option>
                            <option value="pl_PL">język polski</option>
                            <option value="fr_FR">français</option>
                            <option value="de_DE">Deutsch</option>
                            <option value="es_ES">español</option>
                            <option value="nl_NL">Nederlands</option>
                            <option value="da_DK">dansk</option>
                            <option value="sv_SE">Svenska</option>
                            <option value="no_NO">Norsk</option>
                            <option value="ru_RU">русский язык</option>
                            <option value="hu_HU">magyar</option>
                            <option value="it_IT" selected="">Italiano</option>
                        </select>
                    </div>
                    <!-- Dentro questo div succdono cose quando compare il menù a tendina -->
                    <div class="lingua">
                        <div>
                            <button type="button" class="button-non-cliccato">
                                <span>Italiano</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="login <?php if(isset($_SESSION["username"])) {echo 'hidden';} ?>">
                    <a href="http://localhost/hw1/login.php" class="dentro-login">
                        Log In
                    </a>
                </div>
            </div>

            <!-- Secondo div figlio diretto dell'header. -->
            <div class="div-header2">
                <div class="sotto-div-header2">
                    <a href="https://www.op.gg/">
                        <div class="ss-div-header2">
                            <div class="sss-div-header2">
                                <img src="https://meta-static.op.gg/logo/image/0a5e3a2ff1d51e04c3e61f4346cb3518.png?image=q_auto,f_webp,w_580&amp;v=1708681571653" class="img-290xh" alt="OP.GG logo (Blitzcrank, Rocket Grab)">
                            </div>
                        </div>
                    </a>

                    <div class="div-barra">
                        <div>
                            <!-- Questo form serve principalmente per la barra di ricerca giocatore (posta in alto). L'input inserito viene mandato a javascript, dove viene elaborato e poi mandato a un file php dove avviene la cURL account-v1 -->
                            <form class="form-barra">
                                <div>
                                    <div class="serverVisibile"> <!-- Il div che effettivamente contiene il contenuto visibile -->
                                        <div>
                                            <button type="button"><span>EUW</span></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <input name="search" type="text" id="input-player"> <!-- Barra di ricerca -->
                                    <label for="search" class="custom-placeholder">
                                        <span>Game Name +</span>
                                        <span class="custom-placeholder__tagline">#EUW</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Terzo e ultimo div figlio diretto dell'header. Contiene un altro menu' di navigazione. -->
            <div class="flexbox3">
                <nav class="route-nav">
                    <ul class="route-list">
                        <li class="route-item"><a href="https://www.op.gg/"><div class="nav-item oggetto-lista-blu">Home</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/champions"><div class="nav-item oggetto-lista-blu">Champions</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/modes/aram"><div class="nav-item oggetto-lista-gamemode">Game Mode</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/modes/arena"><div class="nav-item oggetto-lista-blu">Arena</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/statistics/champions"><div class="nav-item oggetto-lista-blu">Statistiche</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/leaderboards/tier"><div class="nav-item oggetto-lista-blu">Classifiche</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/spectate/live/pro-gamer"><div class="nav-item oggetto-lista-blu">Pro Matches</div></a></li>
                        <li class="route-item"><a href="https://www.op.gg/multisearch"><div class="nav-item oggetto-lista-blu">Multi-Search</div></a></li>
                    </ul>

                    <div class="flexbox2">
                        <a href="https://op.gg/mypage/dashboard">
                            <div>
                                <img src="Immagini/user-icon.jpg" class="user-icon-jpg">
                                <span>My Page</span>
                            </div>
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <div id="evocatore" class="evocatore-class1 evocatore-class2">
            <div class="sopra-evocatore1 sopra-evocatore2">
                <div class="wrapper">
                    <div class="header-profile-info">
                        <div class="profile-icon">
                            <img src="" alt="profile image" class="profile-icon">
                            <div class="level">
                                <span class="level"></span>
                            </div>
                        </div>

                        <div class="info">
                            <div class="tier-and-cover-img">
                                <div class="prev-tier">
                                    <ul class="tier-list">
                                        <li>
                                            <div class="elo">
                                                <b>S2023 S2</b>Diamond 4
                                            </div>
                                        </li>
                                        <li>
                                            <div class="elo">
                                                <b>S2023 S1</b>Gold 2
                                            </div>
                                        </li>
                                        <li>
                                            <div class="elo">
                                                <b>S2022</b>Platinum 4
                                            </div>
                                        </li>
                                    </ul>
                                    <button class="more-tier">
                                        More Season Tier
                                    </button>
                                    <!--questa ul diventa visibile solo dopo che si clicca sul button "More Season Tier" -->
                                    <ul class="more-tier-list">
                                        <li>
                                            <div>
                                                <b>S2021</b>Platinum 3
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S2020</b>Diamond 4
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S9</b>Platinum 3
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S8</b>Platinum 3
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S7</b>Platinum 3
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S6</b>Platinum 3
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <b>S5</b>Challenger
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="name-container">
                                <div class="name">
                                    <h1>Luffy0022#EUW</h1>
                                </div>

                                <form id="favoritesForm" method="post">
                                    <button class="favorite">
                                        <img id="favoriteImage" src="https://s-lol-web.op.gg/images/icon/icon-bookmark.svg?v=1710914129937">
                                    </button>
                                    <input type="hidden" value="" name="prefDaAggiungere">
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Div vuoto per fare spazio-->
                    <div class="spazio"></div> 
                </div>    
            </div>

            <div class="sotto-evocatore">
                <ul>
                    <li><a href="https://www.op.gg/summoners/euw/Luffy0022-EUW"><div class="lista-uno">Riepilogo</div></a></li>
                    <li><a href="https://www.op.gg/summoners/euw/Luffy0022-EUW/champions"><div class="lista-altri">Campioni</div></a></li>
                    <li><a href="http://localhost/hw1/playerMastery.php"><div class="lista-altri">Maestria<strong class="new">N</strong></div></a></li>
                    <li><div class="relative"><a href="https://www.op.gg/summoners/euw/Luffy0022-EUW/ingame"><div class="ListaLiveGame"><span>Live Game</span></div></a></div></li>
                    <li><a href="https://tft.op.gg/summoners/euw/Luffy0022-EUW?utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_summoner_tft"><div class="lista-tft"><img src="https://s-lol-web.op.gg/images/icon/icon-tft.svg?image=q_auto:good,f_webp,w_32,h_32&amp;v=1714652059153" class="img-16x16" alt="Teamfight Tactics">Teamfight Tactics</div></a></li>
                    <div class="use-op-score">
                        <div class="header">
                            <div class="header-info">
                                Use OP Score to get a more accurate breakdown of your skill level.
                            </div>
                            <button><img src="https://s-lol-web.op.gg/images/icon/icon-arrow-down.svg?v=1714652059153" alt="toggle"></button>
                        </div>
                    </div>
                </ul>
            </div>
        </div>

        <div class="flexcenter">
            <!-- zona ads 1 -->
            <section class="sezione"></section>
        </div>

        <div id="content-container">
            <!-- Div che sta a sinistra -->
            <div id="content-container-first">
                <div class="ranked-solo">
                    <div class="header">Ranked Solo</div>
                    <div class="content">
                        <div class="relative">
                            <img src="" class="img-72xh">
                        </div>
                        <div class="info">
                            <div class="tier"></div>
                            <div class="lp"></div>
                        </div>
                        <div class="win-lose-container">
                            <div class="win-lose"></div>
                            <div class="ratio"></div>
                        </div>
                    </div>
                </div>

                <div class="ranked-flex">
                    <div class="header">Ranked Flex</div>
                    <div class="content">
                        <!-- Immagine -->
                        <div class="relative">
                            <img src="" class="img-40xh">
                        </div>
                        <!-- Tier e lp -->
                        <div class="info">
                            <div class="tier"></div>
                            <div class="lp"></div>
                        </div>
                        <!-- vittorie, sconfitte e winrate -->
                        <div class="win-lose-container">
                            <div class="win-lose"></div>
                            <div class="ratio"></div>
                        </div>
                    </div>
                </div>

                <a href="https://duo.op.gg/lol">
                    <div class="duo">
                        <div class="logo-duo">
                            <img src="https://s-lol-web.op.gg/static/images/icon/logo/logo-duo-dark.svg?v=1710914129937" class="img-24x24" alt="duo.op.gg">
                            DUO
                        </div>
                        <span>Find a Teammate</span>
                        <span class="arrow"></span>
                    </div>
                </a>

                <div class="used-champs">
                    <button>S2024 S1</button>
                    <button>Ranked Solo</button>
                    <button>Ranked Flex</button>
                    <ul>
                        <li>
                            Annie CS 183.5 (6.4) 2.58:1 KDA
                            5.3 / 5.5 / 9.0
                            57%
                            30 Giocate
                        </li>
                        <li>
                            Karma CS 183.5 (6.4) 3.48:1 KDA
                            4.5 / 4.9 / 12.6
                            82%
                            11 Giocate
                        </li>
                        <li>
                            Garen CS 181.5 (6.7)
                            2.16:1 KDA
                            6.2 / 5.2 / 5.0
                            50%
                            6 Giocate
                        </li>
                        <li>
                            Kassadin CS 164.4 (6.5)
                            2.21:1 KDA
                            6.6 / 6.6 / 8.0
                            80%
                            5 Giocate
                        </li>
                        <li>
                            Smolder CS 272.2 (8.1)
                            2.28:1 KDA
                            8.0 / 6.4 / 6.6
                            80%
                            5 Giocate
                        </li>
                        <li>
                            Fiora CS 197 (6.8)
                            0.59:1 KDA
                            1.8 / 8.5 / 3.3
                            50%
                            4 Giocate
                        </li>
                        <li>
                            Kayle CS 223.3 (7.6)
                            1.46:1 KDA
                            4.0 / 6.0 / 4.8
                            50%
                            4 Giocate
                        </li>
                    </ul>
                    <button>Show More+Past Seasons</button>
                </div>
                <div class="champs-winrate">
                    Percentuale di vincita in ranked in 7 giorni <br>
                    Campioni | Rapporto Vittoria
                    <ul>
                        <li>
                            Annie
                            3V11L	21%
                        </li>	
                        <li>
                            Karma
                            5V1L	83%
                        </li>
                        <li>
                            Kassadin
                            1V1L	50%
                        </li>	
                        <li>
                            Amumu
                            2L	0%
                        </li>
                        <li>
                            Qiyana
                            1V	100%
                        </li>
                        <li>
                            Veigar
                            1L	0%
                        </li>
                        <li>
                            Fizz
                            1L	0%
                        </li>
                    </ul>
                </div>
                <!-- Zona ads 2 -->
                <div class="pubblicita"></div>
                <div class="evocatori-giocato-recente">
                    Evocatori con cui ha giocato di recente (ultime 20 partite)<br>
                    Summoner | Giocate | Win - Lose | Rapporto Vittoria<br>
                    Ròmics 2016 #deh 7	4 - 3	57%
                </div>
            </div>

            <div class="contenuto-destra">
                <div class="tipologia">
                    <ul>
                        <li class="primo-lista">
                            <button value="TOTAL">Tutti</button>
                        </li>
                        <li class="altri-lista">
                            <button value="SOLORANKED">Classificate Solo/Duo</button>
                        </li>
                        <li class="altri-lista">
                            <button value="FLEXRANKED">Classificate Flex</button>
                        </li>
                        <li class="altri-lista">
                            <span>
                                <label class="hidden" for="queueType">Tipo di coda</label>
                                <select id="queueType">
                                    <option value="TOTAL" selected="">Tipo di coda</option>
                                    <option value="NORMAL">Normale</option>
                                    <option value="ARAM">ARAM</option>
                                    <option value="BOT">Co-op vs. IA</option>
                                    <option value="URF">AR Fuoco ultra rapido</option>
                                    <option value="CLASH">Clash</option>
                                    <option value="ARENA">Arena</option>
                                    <option value="NEXUS_BLITZ">Blitz al nexus</option>
                                    <option value="EVENT">In evidenza</option>
                                </select>
                            </span>
                        </li>
                    </ul>
                    <div class="cerca-champ-nelle-partite">
                        <div class="search">
                            <label class="hidden">Search a Champion</label>
                            <input id="championInput" type="text" placeholder="Search a Champion" value="">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-search.svg?v=1714556953195" alt="search">
                        </div>
                    </div>
                </div>

                <div class="stats-box">
                    <div class="stats">
                        <div class="win-lose">20G 7V 13L</div>
                        <div class="kda">
                            <div class="chart">
                                <div class="recharts-wrapper">
                                    <img src="Immagini/winrate-chart.png" alt="winrate-chart">
                                </div>
                            </div>
                            <div class="info">
                                <div class="k-d-a"><span>8.0</span> / <span class="death">7.4</span> / <span>5.0</span></div>
                                <div class="ratio">1.76:1</div>
                                <div class="kill-participantion">P/Kill 46%</div>
                            </div>
                        </div>
                    </div>

                    <div class="champions">
                        <div class="title">Recent 20 Games Played Champions</div>
                        <ul class="">
                            <li>
                                <img src="https://opgg-static.akamaized.net/meta/images/lol/14.9.1/champion/Sejuani.png?image=c_crop,h_103,w_103,x_9,y_9/q_auto:good,f_webp,w_160,h_160&amp;v=1714556953195" class="img-24xh">
                                <div class="win-lose">
                                    <div class="relativo-in-linea">
                                        <span class="altro-wr">33%</span>
                                    </div> (2V 4L)
                                </div>
                                <div class="altro-kda">1.84 KDA</div>
                            </li>
                            <li>
                                <img src="https://opgg-static.akamaized.net/meta/images/lol/14.9.1/champion/Kayle.png?image=c_crop,h_103,w_103,x_9,y_9/q_auto:good,f_webp,w_160,h_160&amp;v=1714556953195" class="img-24xh">
                                <div class="win-lose">
                                    <div class="relativo-in-linea">
                                        <span class="altro-wr">33%</span>
                                    </div> (2V 4L)
                                </div>
                                <div class="altro-kda">1.84 KDA</div>
                            </li>
                            <li>
                                <img src="https://opgg-static.akamaized.net/meta/images/lol/14.9.1/champion/Annie.png?image=c_crop,h_103,w_103,x_9,y_9/q_auto:good,f_webp,w_160,h_160&amp;v=1714556953195" class="img-24xh">
                                <div class="win-lose">
                                    <div class="relativo-in-linea">
                                        <span class="altro-wr">33%</span>
                                    </div> (2V 4L)
                                </div>
                                <div class="altro-kda">1.84 KDA</div>
                            </li>
                        </ul>
                    </div>

                    <div class="positions">
                        <div class="title">Preferred Position (Rank)</div>
                        <ul>
                            <li>
                                <div class="bar">
                                    <div class="gauge"></div>
                                </div>
                                <div class="position">
                                    <img src="https://s-lol-web.op.gg/images/icon/icon-position-top.svg?v=1714556953195" class="img-16xh" alt="TOP">
                                </div>
                            </li>

                            <li>
                                <div class="bar">
                                    <div class="gauge"></div>
                                </div>
                                <div class="position">
                                    <img src="https://s-lol-web.op.gg/images/icon/icon-position-jungle.svg?v=1714556953195" class="img-16xh" alt="JUNGLE">
                                </div>
                            </li>

                            <li>
                                <div class="bar">
                                    <div class="gauge"></div>
                                </div>
                                <div class="position">
                                    <img src="https://s-lol-web.op.gg/images/icon/icon-position-mid.svg?v=1714556953195" class="img-16xh" alt="MID">
                                </div>
                            </li>

                            <li>
                                <div class="bar">
                                    <div class="gauge"></div>
                                </div>
                                <div class="position">
                                    <img src="https://s-lol-web.op.gg/images/icon/icon-position-adc.svg?v=1714556953195" class="img-16xh" alt="ADC">
                                </div>
                            </li>

                            <li>
                                <div class="bar">
                                    <div class="gauge"></div>
                                </div>
                                <div class="position">
                                    <img src="https://s-lol-web.op.gg/images/icon/icon-position-support.svg?v=1714556953195" class="img-16xh" alt="SUPPORT">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="partite">
                    partite
                    <div class="partita">
                        <div class="contenuto-partita">
                            <div class="deco"></div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

        <footer id="footer" class="footer-class1 footer-class2">
            <div>
                <section>
                    <strong class="title">
                        <a href="https://www.op.gg/">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-opgglogo-gray.svg?v=1710914129937" class="img-99x24" alt="OP.GG">
                        </a>
                    </strong>
                    <div>
                        <strong class="title">OP.GG</strong>
                        <nav>
                            <a href="/about">About OP.GG</a>
                            <a href="https://log.op.gg/company_en">Company</a>
                            <a href="https://log.op.gg/">Blog</a>
                            <a href="https://www.op.gg/logos">Logo History</a>
                        </nav>
                    </div>
                    <div>
                        <strong class="title">Products</strong>
                        <nav>
                            <a href="https://op.gg">League of Legends<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="League of Legends" class="img-16x16"></a>
                            <a href="https://tft.op.gg">Teamfight Tactics<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937"alt="Teamfight Tactics" class="img-16x16"></a>
                            <a href="https://valorant.op.gg">Valorant<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="Valorant" class="img-16x16"></a>
                            <a href="https://pubg.op.gg">PUBG<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="PUBG" class="img-16x16"></a>
                            <a href="https://overwatch.op.gg">OVERWATCH2<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="OVERWATCH2" class="img-16x16"></a>
                            <a href="https://esports.op.gg">Esports<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="Esports" class="img-16x16"></a>
                            <a href="https://talk.op.gg">TALK<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="TALK" class="img-16x16"></a>
                            <a href="https://gigs.op.gg">Gigs<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="Gigs" class="img-16x16"></a>
                            <a href="https://duo.op.gg">Duo<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="Duo" class="img-16x16"></a>
                        </nav>     
                    </div>
                    <div>
                        <strong class="title">Apps</strong>
                        <nav>
                            <a href="https://op.gg/desktop">OP.GG for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                            <a href="https://pal.op.gg/">OP.GG Palworld for Desktop<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                            <a href="https://play.google.com/store/apps/details?id=gg.op.lol.android&amp;referrer=utm_source%3Dadblock%26utm_medium%3Dbanner">OP.GG Stats for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                            <a href="https://itunes.apple.com/kr/app/op-gg-%EC%98%A4%ED%94%BC%EC%A7%80%EC%A7%80/id605722237?mt=8">OP.GG Stats for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                            <a href="https://play.google.com/store/apps/details?id=gg.op.tft">OP.GG TFT for Android<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                            <a href="https://apps.apple.com/kr/app/allt/id6448737621">OP.GG TFT for iOS<img src="https://s-lol-web.op.gg/images/icon/icon-game.svg?v=1710914129937" alt="game" class="img-16x16"></a>
                        </nav>
                    </div>
                    <div>
                        <strong class="title">Resources</strong>
                        <nav>
                            <a href="https://www.op.gg/policies/privacy">
                                <strong>Privacy Policy</strong>
                            </a>
                            <a href="https://www.op.gg/policies/agreement">Terms of Use</a>
                            <a href="https://opgg.helpscoutdocs.com/collection/1-opgg" class="en_US">Help</a>
                            <a href="mailto:service@op.gg">Email Inquiry</a>
                            <button type="button">Contact Us</button>
                        </nav>
                    </div>
                    <div>
                        <strong class="title">More</strong>
                        <nav>
                            <a href="mailto:contact@op.gg">Business</a>
                            <a href="https://opgg.notion.site/Advertising-on-OP-GG-47e02da6b7eb438288730c92c14ef8f0" target="_blank" rel="noopener noreferrer">Advertise</a>
                        </nav>
                    </div>
                </section>
                <section class="footer--bottom">
                    <div class="wrapper">
                        <p class="copyright">
                            © 2012-2024 OP.GG. OP.GG is not endorsed by Riot Games and does not reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.
                        </p>
                    </div>
                    <nav class="sns">
                        <a href="https://www.instagram.com/opgg_official">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-logo-instagram.svg?v=1710914129937" class="img-24x24" alt="instagram account">
                        </a>
                        <a href="https://www.youtube.com/@opgg_official">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-logo-youtube.svg?v=1710914129937" class="img-24x24" alt="youtube account">
                        </a>
                        <a href="https://www.twitter.com/opgg_official">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-logo-x.svg?v=1710914129937" class="img-24x24" alt="twitter account">
                        </a>
                        <a href="https://www.facebook.com/opgg_official">
                            <img src="https://s-lol-web.op.gg/images/icon/icon-logo-facebook.svg?v=1710914129937" class="img-24x24" alt="facebook account">
                        </a>
                        <a href="https://www.overwolf.com/opgg_official">
                            <img src="https://s-lol-web.op.gg/static/images/icon/logo/icon-logo-overwolf.svg?v=1710914129937" alt="overwolf account">
                        </a>
                    </nav>
                </section>
            </div>
        </footer>
    </article>
</body>
</html>
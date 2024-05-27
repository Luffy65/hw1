<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OP.GG - The Best LoL Builds and Tier List. Search Riot ID and Tagline for Stats</title>
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
                        <img src="https://s-lol-web.op.gg/images/icon/icon-world-light-blue.svg?v=1710914129937" class="img-24x24">
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
                        <a href="http://localhost/hw1/login.php" class="dentro-login">Log In</a>
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
                                <a id="cerca-statistiche" href="playerStats.php">Cerca statistiche su giocatori!</a>
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
                                <div class="separate">
                                    <div>
                                        <img src="Immagini/user-icon.jpg" class="user-icon-jpg">
                                        <span>My Page</span>
                                    </div>
                                    <a href="logout.php" class="logout"><span>Logout</span></a>
                                </div>
                            </a>
                        </div>
                    </nav>
                </div>
            </header>

            <div id="home-content">
                <div class="home-logo-container">
                    <img src="https://meta-static.op.gg/logo/image/b2a35f5aefdeb9e7ddbb5b0a9bb8ff7d.png?image=q_auto:good,f_webp,h_448&amp;v=1715147216574" alt="OP.GG logo (Skills)">
                </div>

                <div class="desktop-players">
                    <section class="opgg-desktop">
                        <h2>
                            <strong>Experience the fast speed of OP.GG for Desktop!</strong>
                        </h2>
                        
                        <ul>
                            <li>
                                <h3>Real-time Auto Rune Setting</h3>
                                <a href="https://bit.ly/2SnNShe"><img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_01_en@2x.png?v=1715147216574" class="img-200x124" alt="Rune Setting"></a>
                            </li>
                            
                            <li>
                                <h3>OP Champions, Team Comps, and More</h3>
                                <a href="https://bit.ly/2SnNShe"><img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_02_en@2x.png?v=1715147216574" class="img-200x124" alt="OP Champions"></a>
                            </li>
                            
                            <li>
                                <h3>Latest Meta and OP.GG Recommendations</h3>
                                <a href="https://bit.ly/2SnNShe"><img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_03_en@2x.png?v=1715147216574" class="img-200x124" alt="TFT Meta"></a>
                            </li>
                            
                            <li>
                                <h3>Enhanced Overlay Features for Better Convenience</h3>
                                <a href="https://bit.ly/2SnNShe"><img src="https://s-lol-web.op.gg/static/images/site/home/2023img_index_04_en@2x.png?v=1715147216574" class="img-200x124" alt="Overlay"></a>
                            </li>
                        </ul>
                    </section>
                    
                    <section class="player-of-week">
                        <a class="esports-header" href="https://esports.op.gg/players/1921/Viper?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_playeroftheweek_epsports">
                            <div class="esports-titles-pow">
                                <h2>
                                    <img src="https://s-lol-web.op.gg/static/images/esports/logo-pow-white.svg?v=1715147216574" class="img-278x22 esports-logo-img" alt="esports.op.gg">
                                </h2>
                                
                                <h3>
                                    <div>
                                        <img src="https://s-qwer.op.gg/images/teams/white/LCK/HLE.png?image=q_auto:good,f_webp,w_48,h_48&amp;v=1715147216574" class="img-24x24" alt="HLE">
                                    </div>
                                    
                                    <div>
                                        <img src="https://s-lol-web.op.gg/assets/images/positions/01-icon-01-lol-icon-position-bot-bu.svg?v=1715147216574" class="img-24x240x20" alt="adc">
                                    </div>
                                    
                                    <div>Viper</div>
                                </h3>
                            </div>
                            
                            <div class="esports-logo-pow">
                                <div class="esports-logo-container">
                                    <img src="https://s-qwer.op.gg/images/teams/white/LCK/HLE.png?image=q_auto:good,f_webp,w_auto&amp;v=1715147216574" alt="Viper" class="esports-logo-img esports-logo-league">
                                    <img src="https://s-qwer.op.gg/images/lol/players/LCK_2024/2024_spring_Viper.png?image=q_auto:good,f_webp,w_auto&amp;v=1715147216574" alt="Viper" class="esports-logo-img esports-logo-player">
                                </div>
                            </div>
                        </a>
                        
                        <div class="esports-main">
                            <div class="teams">
                                <div class="esports-menu-container">
                                    <h4>Standing</h4>
                                    <nav>
                                        <button type="button" class="active">Team</button>
                                    </nav>
                                </div>
                                
                                <ul>
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/1421/TH?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/TH.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="Team Heretics">
                                            </div>
                                            <div class="esports-name">TH</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div class="esports-team-point">0</div>
                                        </a>
                                    </li>
                                    
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/1750/GX?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/GX.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="GIANTX">
                                            </div>
                                            <div class="esports-name">GX</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div class="esports-team-point">0</div>
                                        </a>
                                    </li>
                                    
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/450/SK?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/SK.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="SK Gaming">
                                            </div>
                                            <div class="esports-name">SK</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div class="esports-team-point">0</div>
                                        </a>
                                    </li>
                                    
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/392/RGE?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/RGE.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="Rogue">
                                            </div>
                                            <div class="esports-name">RGE</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div class="esports-team-point">0</div>
                                        </a>
                                    </li>
                                    
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/451/VIT?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/VIT.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="Team Vitality">
                                            </div>
                                            <div class="esports-name">VIT</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div class="esports-team-point">0</div>
                                        </a>
                                    </li>
                                    
                                    <li class="team">
                                        <a href="https://esports.op.gg/teams/701/BDS?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_teams_epsports">
                                            <div class="esports-rank">1</div>
                                            <div class="esports-team-logo">
                                                <img src="https://s-qwer.op.gg/images/teams/white/LEC/BDS.png?image=q_auto:good,f_webp,w_40,h_40&amp;v=1715147216574" class="img-20x20" alt="BDS">
                                            </div>
                                            <div class="esports-name">BDS</div>
                                            <div class="esports-win-lose">0W 0L</div>
                                            <div>0</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="schedule">
                                <div class="esports-menu-container">
                                    <h4>Schedule</h4>
                                    <span>2024. 5. 26 SUN</span>
                                </div>
                                
                                <ul>
                                    <li class="esports-match">
                                        <a href="https://esports.op.gg/matches/23312?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_matches_epsports">
                                            <div>
                                                <div class="esports-team-container">
                                                    <img src="https://s-qwer.op.gg/images/teams/white/LEC/TH.png?image=q_auto:good,f_webp,w_104,h_104&amp;v=1715147216574" class="img-52x52" alt="Team Heretics">
                                                </div>

                                                <div class="esports-score-container">Preview</div>

                                                <div class="esports-team-container">
                                                    <img src="https://s-qwer.op.gg/images/teams/white/LEC/GX.png?image=q_auto:good,f_webp,w_104,h_104&amp;v=1715147216574" class="img-52x52" alt="GIANTX">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="esports-team-container">
                                                    <strong>TH</strong>
                                                </div>

                                                <div class="esports-score-container">
                                                    <span class="esports-match">6.8 Sat</span>
                                                    <span class="esports-match-time">17:00</span>
                                                </div>

                                                <div class="esports-team-container">
                                                    <strong>GX</strong>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li class="border-gray esports-match">
                                        <a href="https://esports.op.gg/matches/23313?hl=en_US&amp;utm_source=opgg&amp;utm_medium=button&amp;utm_campaign=click_matches_epsports">
                                            <div>
                                                <div class="esports-team-container">
                                                    <img src="https://s-qwer.op.gg/images/teams/white/LEC/SK.png?image=q_auto:good,f_webp,w_104,h_104&amp;v=1715147216574" class="img-52x52" alt="SK Gaming">
                                                </div>
                                                <div class="esports-score-container">
                                                    <div>Preview</div>
                                                </div>
                                                <div class="esports-team-container">
                                                    <img src="https://s-qwer.op.gg/images/teams/white/LEC/RGE.png?image=q_auto:good,f_webp,w_104,h_104&amp;v=1715147216574" class="img-52x52" alt="Rogue">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="esports-team-container">
                                                    <strong>SK</strong>
                                                </div>
                                                <div class="esports-score-container">
                                                    <span class="esports-match">6.8 Sat</span>
                                                    <span class="">17:45</span>
                                                </div>
                                                <div class="esports-team-container">
                                                    <strong>RGE</strong>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <div id="wikipediaAPI" class="hidden"></div>
            <button id="wikipediaToggle">Mostra l'articolo del giorno!</button>

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
                            <p class="copyright">© 2012-2024 OP.GG. OP.GG is not endorsed by Riot Games and does not reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.</p>
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
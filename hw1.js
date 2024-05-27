// ************ PULSANTE DEI PREFERITI ************************************
function favoriteOrNot(isFavorite) {
    console.log("isfavorite:", isFavorite);

    const form = document.querySelector('#favoritesForm');
    const formInput = document.querySelector("#favoritesForm input");

    const favoriteImage = document.querySelector('#favoriteImage');

    if (isFavorite === 'true') {
        // If already a favorite, set the form action to remove
        console.log("GIà PREFERITO! LO RIMUOVO!");
        form.action = 'removeFavorite.php';
        favoriteImage.classList.add("pref-nongiallo");
        favoriteImage.classList.remove("pref-giallo");
    } else {
        // If not a favorite, set the form action to add
        console.log("NON ANCORA PREFERITO! LO AGGIUNGO!");
        form.action = 'addFavorite.php';
        favoriteImage.classList.remove("pref-nongiallo");
        favoriteImage.classList.add("pref-giallo");
        favoriteImage.src="https://s-lol-web.op.gg/images/icon/icon-bookmark-on-w.svg?v=1715147216574";
    }
    
    // Manda i dati del form all'action specificata.
    fetch(form.action, {
        method: 'POST',
        body: new URLSearchParams({
            favorite: formInput.value
        })
    }).then(onResponseTXT).catch(onError);
}



function associaNomeEvocatore(event) {
    // impedisco submit
    event.preventDefault();

    // Salvo come variabile il nome giocatore da salvare
    const summonerName = document.querySelector('.name h1').textContent;

    // Inserisco tale variabile nell'input type hidden del form dei preferiti
    const hiddenInput = document.querySelector('#favoritesForm input[name="prefDaAggiungere"]');     // Trovo l'input nascosto nel form
    hiddenInput.value = summonerName;

    // controllo se l'evocatore è già favorite, e passo il risultato a favoriteOrNot()
    // faccio ajax fetch a checkfavorite.php
    fetch('http://localhost/hw1/checkFavorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            favorite: summonerName
        })
    }).then(onResponseTXT, onError).then(favoriteOrNot);
}

if(document.querySelector("#favoritesForm")) {
    document.querySelector('#favoritesForm').addEventListener('submit', associaNomeEvocatore);
}







function impostaImmaginePref2(pref) {
    console.log("preferito", pref);

    const favoriteImage = document.querySelector('#favoriteImage');
    if (!favoriteImage) {
        console.log("nn c'è favorite image")
    } else {
        if(pref === true) {
            favoriteImage.classList.remove("pref-nongiallo");
            favoriteImage.classList.add("pref-giallo");
        } else {
            favoriteImage.classList.add("pref-nongiallo");
            favoriteImage.classList.remove("pref-giallo");
        }
    }    
}

// imposto l'immagine del pulsante dei preferiti correttamente
function impostaImmaginePreferito() {
    // Salvo come variabile il nome giocatore da salvare
    const summonerName = document.querySelector('.name h1').textContent;

    // controllo se il giocatore è già favorite, e passo il risultato a impostaImmaginePref2()
    // faccio ajax fetch a checkfavorite.php
    fetch('http://localhost/hw1/checkFavorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            favorite: summonerName
        })
    }).then(onResponseTXT, onError).then(impostaImmaginePref2);
}

impostaImmaginePreferito();









// ************ LIGHT / DARK MODE ************************************
function darkLightFunction() {
    const interosito = document.querySelector("#intero-sito");
    const foot = document.querySelector("#footer");
    const DarkLightButton = document.querySelector(".dark"); // il pulsante dark/light mode

    // Recupera il valore corrente dell'attributo 'data-mode'
    const currentMode = DarkLightButton.dataset.mode;

    // Inverti il ​​valore
    const newMode = currentMode === 'light' ? 'dark' : 'light';

    // Aggiorna attributo 'data-mode'
    DarkLightButton.dataset.mode = newMode; 

    // Aggiorna le classi in base al nuovo stato
    if(newMode === 'light') { // Light mode
        interosito.classList.add("light-mode");
        interosito.classList.remove("dark-mode");
        foot.classList.add("light-mode");
        foot.classList.remove("dark-mode");
        DarkLightButton.classList.add("light");
    }
    else { // Dark mode
        interosito.classList.remove("light-mode");
        interosito.classList.add("dark-mode");
        foot.classList.remove("light-mode");
        foot.classList.add("dark-mode");
        DarkLightButton.classList.remove("light");
    }
    console.log("Sito impostato in " + newMode + " mode"); 
}

// Seleziona il pulsante della dark/light mode
if(document.querySelector(".dark")) {
    const DarkLightButton = document.querySelector(".dark"); 
    DarkLightButton.addEventListener("click", darkLightFunction);
}

// ************ FAQ ************************************
// Quando si clicca sul pulsante FAQ compare un piccolo menù a tendina con 2 opzioni: "Contact us" e "Help center".
const divSottoFaq = document.querySelector(".FAQ div");
const faqButton = document.querySelector('.button-non-cliccato.menu-faq');  // Riferimento al pulsante FAQ
const articleref = document.querySelector("#intero-sito") // Riferimento all'intero sito.

function closeFAQMenu(event) {
    const menuButton = event.currentTarget; // Il pulsante FAQ
    menuButton.removeEventListener('click', closeFAQMenu);
    menuButton.addEventListener('click', appareFAQ);

    const faqMenu = document.querySelector('.FAQ div div'); // Seleziona il menu
    if (faqMenu) {
        faqMenu.remove(); // Rimuove il menu a tendina
        console.log('faq rimosso');
    }
}

function appareFAQ(event) {
    const menuButton = event.currentTarget; // Il pulsante FAQ
    menuButton.removeEventListener('click', appareFAQ);
    menuButton.addEventListener('click', closeFAQMenu);

    /* Creo il FAQ menu */
    const newDiv = document.createElement("div");
    const newButton1 = document.createElement("button");
    const newButton2 = document.createElement("button");
    const newSpan1 = document.createElement("span");
    const newSpan2 = document.createElement("span");
    const newContent1 = document.createTextNode("Contact Us");
    const newContent2 = document.createTextNode("Help Center");

    newButton1.classList.add("pulsanti-faq");
    newButton2.classList.add("pulsanti-faq");

    newSpan1.appendChild(newContent1);
    newSpan2.appendChild(newContent2);
    newButton1.appendChild(newSpan1);
    newButton2.appendChild(newSpan2);
    newDiv.appendChild(newButton1);
    newDiv.appendChild(newButton2);

    // Aggiungo l'elemento appena creato e il suo contenuto nel DOM
    divSottoFaq.appendChild(newDiv);
}

// Aggiungo l'EventListener
if(document.querySelector(".FAQ div div")) {
    var faqVariable = document.querySelector('.FAQ div div');
    faqButton.addEventListener('click', appareFAQ);
}

// ************ MORE SEASON TIER ************************************
// Cliccando su "more season tier", appare una lista dei rank del giocatore nelle stagioni precedenti.
if(document.querySelector(".more-tier-list"))
{
    let isRankHidden = true;
    const listaRank = document.querySelector(".more-tier-list"); // Riferimento alla lista da far comparire / nascondere
    const pulsanteRank = document.querySelector(".more-tier"); // Riferimento al pulsante da cliccar eper far comparire / nascondere la lista.

    function toggleRank() {
        isRankHidden = !isRankHidden;

        if(isRankHidden) {
            listaRank.classList.add("NASCOSTO");
            console.log("Nascosti i rank precedenti");
        }
        else {
            listaRank.classList.remove("NASCOSTO");
            console.log("visibili i rank precedenti");
        }
    }

    listaRank.classList.add("NASCOSTO"); // In questo modo, al primo caricamento della pagina avremo il menu nascosto.
    pulsanteRank.addEventListener('click', toggleRank);
}


// ************ WELCOME ****************************
// Fa stampare alla console un messaggio in base a un elemento "data-*" contenuto nell'article.
if (document.querySelector("#intero-sito"))
{
    const articolo = document.querySelector("#intero-sito");
    const numHomework = articolo.dataset.nhomework;
    console.log("Benvenuto nell'homework " + numHomework + "!");
}


// ************ ROMAN TO ARABIC MAP ************************
// Serve a converite un numero romano in arabico, mi serve per il dato "tier" che una fetch restituisce.
const romanToArabic = new Map([
    ["I", 1],
    ["II", 2],
    ["III", 3],
    ["IV", 4],
    ["V", 5],
]);


// ************ BARRA DI RICERCA GIOCATORI ************************
if(document.querySelector("#input-player"))
{
    const label = document.querySelector("label[for='search']"); // Get the label
    const input = document.getElementById("input-player");       // Get the input

    // Il seguente event Listener aggiunge una funzione alla barra di ricerca: se contiene lettere, i label scompaiono.
    input.addEventListener("input", () => {
    if (input.value.length > 0) {
        label.classList.add("NASCOSTO");
    } else {
        label.classList.remove("NASCOSTO");
    }
    });
}


// ******************* RIMANEGGIAMENTI DEI DATI della ricerca player
// in index.php, quando viene cercato un player, i dati finiscono prima di tutto qua.










// *********************** API ******************************

// ** FUNZIONI GENERICHE API
function onResponse(response) {
    if(response.ok === false){ 
      console.log(response.status);
      console.log("Error: " + response.statusText);
      return null;
    }
    return response.json(); // Grazie a questa riga, onResponse() restituisce una promise, che andrà letta con un .then()
}

function onResponseTXT(response) {
    return response.text();
}

function onError(error) {
    console.log("Error: " + error);
}






// ** ACCOUNT-V1 - getAccountByRiotID

// Da togliere
let puuid = "B0LHOkyJt-0RGFGWqZTR_qrZhb8cvS_3t93O9r_9tNv7bSAR9XtJbCQCjjyXZ5_Y5B0g4czoVCoEmQ";
let summonerID = "5T2ZUo8NOy6NdC8XZO67GqF5k9td-GONY5zM2g9HLXkbnkY";

function onJsonSearch(json) {
    if(!json) {
        console.log("onJsonSearch: nessun json");
        return;
    }
    console.log("Player ricercato:", json);

    // Aggiorno il valore di puuid
    puuid = json.puuid;

    // Aggiorno SUMMONER-V4
    fetch('http://localhost/hw1/api2-summonerV4.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            puuid: puuid
        })
    }).then(onResponse, onError).then(onJsonGetSummoner);

    // Aggiorno LEAGUE-V4 (va mandato il summoner ID con una post)
    if(document.querySelector(".ranked-solo")) {
        // Effettuo la AJAX fetch     
        fetch("http://localhost/hw1/api2-leagueV4.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                summonerID: summonerID
            })
        }).then(onResponse, onError).then(onJsonGetEntries);
    
    }
     else {
         console.log("Non sei nella pagina giusta: niente statistiche sulle ranked del giocatore")
     }

    // Aggiorno il livello maestria totale (nella pagina maestrie)
    if(document.querySelector("#punt-maestr-tot")) {
        fetch("http://localhost/hw1/api3-champ-mastery-V4.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                puuid: puuid
            })
        }).then(onResponse, onError).then(onIntMastery);
    }
    else {
        console.log("Non sei nella pagina giusta: niente maestria totale.");
    }

    // Aggiorno le maestrie effettive!
    // AJAX FETCH
    if(document.querySelector("#punt-maestr-tot")) {
        fetch("http://localhost/hw1/api4-champ-mastery-V4.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // indica allo script PHP il formato in cui sono codificati i dati che sto inviando nel corpo della richiesta POST. Il formato "appplication/x-www-form-urlencoded" è il formato standard, utilizzato per inviare dati di moduli HTML. In esso, i dati vengono organizzati come coppie chiave-valore, separate da &, e con la chiave e il valore separati da =.
            },
            body: new URLSearchParams({
                puuid: puuid
            })
        }).then(onResponse, onError).then(onJsonMastery);
    }
    else {
        console.log("Non sei nella pagina giusta: niente maestrie campioni!");
    }
}





function search(event) {
    // Impedisci il submit del form
    event.preventDefault();
    // Leggi valore del campo di testo. In questo form il valore è una stringa NomeGiocatore#tag, ovvero
    // I due valori sono separati dal carattere '#'
    const ricercaInput = document.querySelector("#input-player");
    const ricercaValue = ricercaInput.value; // Stringa che l'utente scrive
    const splitString = ricercaValue.split("#"); // Splitta la stringa in un array appena incontra il carattere "#"
    const nomeGiocatore = splitString[0];
    const tag = splitString[1];
    console.log(nomeGiocatore + " #" + tag);
    
    // Esegui AJAX fetch
    fetch('http://localhost/hw1/api0-accountV1.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            nomeGiocatore: nomeGiocatore,
            tag: tag
        })
    }).then(onResponse).then(onJsonSearch);

    // Aggiorno il nome giocatore e il tag
    const divNome = document.querySelector(".name h1");
    divNome.textContent = nomeGiocatore+"#"+tag;
}

// Applico l'event Listener al form
if(document.querySelector(".form-barra #input-player")) {
    const form = document.querySelector('.form-barra');
    form.addEventListener('submit', search);
}











// ** LEAGUE-V4 - Get league entries (rank, wr, wins, losses) in all queues (solo, flex) for a given summoner ID (NON account ID)
// summoner id: 5T2ZUo8NOy6NdC8XZO67GqF5k9td-GONY5zM2g9HLXkbnkY
function onJsonGetEntries(json)
{
    if(json === null)    {
        console.log("onJsonGetEntries: nessun json");
        return;
    }

    console.log("OnJsonGetEntries:", json);
    // Creo gli indici per distinguere tra soloQ e Flex
    let soloqIndex;
    let flexIndex;
    if(json[0].queueType === "RANKED_SOLO_5x5" && json[1].queueType === "RANKED_FLEX_5x5") {
        soloqIndex = 0;
        flexIndex = 1;
    }
    else if (json[0].queueType === "RANKED_FLEX_5X5" && json[1].queueType === "RANKED_SOLO_5x5") {
        soloqIndex = 1;
        flexIndex = 0;
    }

    if(json[0].queueType === null) {
        // L'utente non ha giocato ranked
        return;
    }

    if(json[0].queueType === "RANKED_SOLO_5x5") {
        soloqIndex = 0;
    }

    // Soloq
    const tier = json[soloqIndex].tier;
    const rank = json[soloqIndex].rank;
    const lp = json[soloqIndex].leaguePoints;
    const wins = json[soloqIndex].wins;
    const losses = json[soloqIndex].losses;

    // Flex
    if (flexIndex !== null) {
        const tierF = json[flexIndex].tier;
        const rankF = json[flexIndex].rank;
        const lpF = json[flexIndex].leaguePoints;
        const winsF = json[flexIndex].wins;
        const lossesF = json[flexIndex].losses;
    }
    

    // Creo dei TextNode per tier e rank 

    // Soloq
    // Tier (es: DIAMOND)
    strTier = document.createTextNode(tier[0] + tier.slice(1).toLowerCase() + " "); // Per scrivere la parola con la prima lettera maiuscola e le altre minuscole
    // Rank (es: II)
    strRank = document.createTextNode(romanToArabic.get(rank)); // "rank" è un numero romano, lo converto in arabico
    // URL parziale delle immagini del tier
    soloq_img_url_p = tierF.toLowerCase() +'.png';

    // Flex
    if (flexIndex !== null) {
        // Tier
        strTierF = document.createTextNode(tierF[0] + tierF.slice(1).toLowerCase() + " "); // Per scrivere la parola con la prima lettera maiuscola e le altre minuscole
        // Rank
        strRankF = document.createTextNode(romanToArabic.get(rankF));
        // URL parziale delle immagini del tier
        flex_img_url_p = tier.toLowerCase() +'.png';
    }

    // Metto i TextNode appena creati nell'HTML, e aggiungo altri dati (immagini degli emblemi, lp, wins, losses, win rate)

    // SOLOQ
    // Tier e Rank
    const HTier = document.querySelector('.ranked-solo .tier');
    HTier.appendChild(strTier);
    HTier.appendChild(strRank);
    // Immagine emblema
    const HImmagine = document.querySelector('.ranked-solo .img-72xh')
    HImmagine.src="Ranked_Emblems_Latest/Rank=" + soloq_img_url_p;
    // LP
    const Hlp = document.querySelector('.ranked-solo .lp');
    Hlp.textContent = lp + " LP"; // Senza text node
    // Wins e losses
    const HWinsLosses = document.querySelector('.ranked-solo .win-lose');
    HWinsLosses.textContent = wins + "V " + losses + "L"
    // Win ratio
    const HWinRatio = document.querySelector('.ranked-solo .ratio');
    const winRatio = Math.round(100 * wins / (wins + losses));
    HWinRatio.textContent = "Win Rate " + winRatio + "%"

    // FLEX
    // Tier e Rank
    if(flexIndex !== null){
        const HTierF = document.querySelector('.ranked-flex .tier');
        HTierF.appendChild(strTierF);
        HTierF.appendChild(strRankF);
        // Immagine emblema
        const HImmagineF = document.querySelector('.ranked-flex .img-40xh')
        HImmagineF.src="Ranked_Emblems_Latest/Rank=" + flex_img_url_p;
        // LP
        const HlpF = document.querySelector('.ranked-flex .lp');
        HlpF.textContent = lpF + " LP"; // Senza text node
        // Wins e losses
        const HWinsLossesF = document.querySelector('.ranked-flex .win-lose');
        HWinsLossesF.textContent = winsF + "V " + lossesF + "L"
        // Win ratio
        const HWinRatioF = document.querySelector('.ranked-flex .ratio');
        const winRatioF = Math.round(100 * winsF / (winsF + lossesF));
        HWinRatioF.textContent = "Win Rate " + winRatioF + "%"
    }
}

if(document.querySelector(".ranked-solo")) {
    fetch("http://localhost/hw1/api2-leagueV4.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded' // indica allo script PHP il formato in cui sono codificati i dati che sto inviando nel corpo della richiesta POST. Il formato "appplication/x-www-form-urlencoded" è il formato standard, utilizzato per inviare dati di moduli HTML. In esso, i dati vengono organizzati come coppie chiave-valore, separate da &, e con la chiave e il valore separati da =.
        },
        body: new URLSearchParams({
            summonerID: summonerID
        })
    }).then(onResponse, onError).then(onJsonGetEntries);
}
else {
    console.log("Non sei nella pagina giusta: niente statistiche sulle ranked del giocatore")
}










/* // Da fixare e spostare in php
// ** MATCH-V5 - Get a list of match IDs by PUUID. ESEMPI DI MATCH ID: "EUW1_6901880192", "EUW1_6890332368"
// Salvo i match id restituiti dalla fetch nel seguente vettore:
let MatchIDS = [];

function onJsonGetMatches(json)
{
    if(!json)
    {
        console.log("onJsonGetMatches: nessun json");
        return;
    }

    for (match in json)
    {
        MatchIDS[match] = json[match]; // Popolo il vettore dei match id
    }
    console.log("Match IDs ottenuti:", MatchIDS);
}

// Effettuo la fetch
const url2 = "https://europe.api.riotgames.com/lol/match/v5/matches/by-puuid/" + puuid + "/ids?start=0&count=20&api_key=" + apiKey;
fetch(url2).then(onResponse, onError).then(onJsonGetMatches);
*/


/*
// ** MATCH-V5 - Get a match by match id
// La seguente funzione viene chiamata su ogni partita.
function onJsonGetPartita(json)
{
    if(!json)
    {
        console.log("onJsonGetPartita: nessun json");
        return;
    }

    ...

}

// Effettuo le fetch (una per ogni partita. Suppongo di voler caricare 20 partite inizialmente, quindi farò 20 fetch)
// Creo un vettore degli url per fare le relative fetch
let url_partite = [];

// NON FUNZIONA, FORSE PERCHE' DEVE ATTENDERE PRIMA CHE MATCHIDS SI POPOLI
for (let i = 0; i<20; i++)
{
    url_partite[i] = "https://europe.api.riotgames.com/lol/match/v5/matches/" + MatchIDS[i] + "?api_key=" + apiKey;
    fetch(url_partite[i]).then(onResponse, onError).then(onJsonGetPartita);
}
*/










// ** SUMMONER-V4 - Get a summoner by PUUID. La uso per ottenere livello, icona e summoner ID del giocatore principale. Esempio di summoner ID: 5T2ZUo8NOy6NdC8XZO67GqF5k9td-GONY5zM2g9HLXkbnkY
// Dato l'oggetto json, inserisce nella pagina playerStats il livello e l'icona del giocatore
function onJsonGetSummoner(json)
{
    if(!json) {
        console.log("onJsonGetSummoner: nessun json");
        return;
    }

    console.log("summoner:", json);
    summonerID = json.id;

    const levelContainer = document.querySelector("#evocatore .level .level");
    levelContainer.textContent = json.summonerLevel;

    const iconaEvocatore = document.querySelector("#evocatore .profile-icon .profile-icon");
    iconaEvocatore.src = "https://ddragon.leagueoflegends.com/cdn/" + game_version + "/img/profileicon/" + json.profileIconId + ".png";
}

// Ajax fetch con metodo POST per passare al file api2-summonerV4 il puuid.
if(document.querySelector("#evocatore"))
{
    fetch('http://localhost/hw1/api2-summonerV4.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            puuid: puuid
        })
    }).then(onResponse, onError).then(onJsonGetSummoner);
}






let game_version;

async function getGameVersion(){
  const game_version_response = await fetch("https://ddragon.leagueoflegends.com/api/versions.json");
  game_version_json = await game_version_response.json();
  game_version = game_version_json[0];
}

getGameVersion();







// ** CHAMPION-MASTERY-V4: Get a player's total champion mastery score, which is the sum of individual champion mastery levels

function onIntMastery(livello) {
    if(!livello) {
        return;
    }
    console.log("Livello maestria totale: " + livello + "!");

    const level_holder = document.querySelector("#punt-maestr-tot");
    level_holder.textContent = livello;
}

if(document.querySelector("#punt-maestr-tot")) {
    fetch("http://localhost/hw1/api3-champ-mastery-V4.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            puuid: puuid
        })
    }).then(onResponse, onError).then(onIntMastery);
}
else {
    console.log("Non sei nella pagina giusta: niente maestria totale.");
}






function formatNumberWithPoints(number) {
    const numberString = number.toString();
    const groups = [];
  
    for (let i = numberString.length; i > 0; i -= 3) {
      groups.unshift(numberString.slice(Math.max(0, i - 3), i)); // Extract groups of 3 from right to left
    }
  
    return groups.join('.'); // Join with points
}





// ** CHAMPION-MASTERY-V4: Get all champion mastery entries sorted by number of champion points descending.
function onJsonMastery(json)
{
    let punti_campione_tot = 0;
    let champ_count = 0;
    const container = document.querySelector(".contenuto2-box");

    // Se container contiene già cose, lo svuoto.
    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }

    for (maestria of json)
    {
        // Incremento la variabile punti campione totali
        punti_campione_tot = punti_campione_tot + maestria.championPoints;
        champ_count = champ_count + 1;

        // Creo un div contenente le informazioni che mi interessanop
        const divPadre = document.createElement("div"); // Creo il div
        const divIconaChamp = document.createElement("div"); // Creo il div
        const divChampLvl = document.createElement("div");
        const divMaestria = document.createElement("div"); // Creo il div

        // Riempio il div icona campione
        const icona = document.createElement("img");
        icona.src = "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/default/v1/champion-icons/" + maestria.championId + ".png";
        icona.classList.add("img-60x60");
        divIconaChamp.appendChild(icona);

        // Riempio il div champ level
        divChampLvl.classList.add("champion-level");
        spanChampLvl = document.createElement("span");
        spanChampLvl.textContent = maestria.championLevel;
        divChampLvl.appendChild(spanChampLvl);

        // Riempio il div maestria
        divMaestria.textContent = maestria.championPoints;
        divMaestria.classList.add("maestriaAPI");

        // Unisco tutti i div e li appendo al container
        divPadre.appendChild(divIconaChamp);
        divPadre.appendChild(divChampLvl);
        divPadre.appendChild(divMaestria);
        container.appendChild(divPadre);
    }

    // Inserisco i punti campione totali
    totPunti = document.querySelector("#tot-punti-chmp");
    totPunti.textContent = formatNumberWithPoints(punti_campione_tot);

    // Inserisco il conteggio dei campioni
    conteggio = document.querySelector(".champion-count strong");
    conteggio.textContent = champ_count;

}

// AJAX FETCH
if(document.querySelector("#punt-maestr-tot")) {
    fetch("http://localhost/hw1/api4-champ-mastery-V4.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            puuid: puuid
        })
    }).then(onResponse, onError).then(onJsonMastery);
}
else {
    console.log("Non sei nella pagina giusta: niente maestrie campioni!");
}














// WIKIPEDIA 2: Dato l'articolo del giorno (json), crea una piccola schermata che lo contiene
function onJsonWikipedia2(json) {
    if(!json) {
        console.log("onJsonWikipedia2: nessun json");
        return;
    }

    console.log("Contenuto json wikipedia:", json);

    if(json === null){
        console.log("Articolo del giorno non trovato:", error);
        return;
    }

    let titolo = json.tfa.title;
    let linkArticolo = json.tfa.content_urls.desktop.page;
    let descrizione = json.tfa.extract;
    let thumbnail_url;

    if(json.tfa.thumbnail !== undefined)
        thumbnail_url = json.tfa.thumbnail.source;
    else 
        thumbnail_url = null;

    const article = document.createElement("article");
    
    const articleTitle = document.createElement("span");
    articleTitle.textContent = titolo;
    articleTitle.classList.add("articleTitle");

    const articleURL = document.createElement("a");
    articleURL.href = linkArticolo;
    articleURL.textContent = "Link all'articolo completo"
    articleURL.classList.add("url");

    const articleDescription = document.createElement("div"); 
    articleDescription.textContent = descrizione;
    articleDescription.classList.add("description");

    const articleThumbnail = document.createElement("img");
    if(thumbnail_url!== null){
        articleThumbnail.src = thumbnail_url;
    }
    articleThumbnail.classList.add("thumbnail");
    
    const wikiDiv = document.querySelector("#wikipediaAPI");
    wikiDiv.appendChild(article);
    article.appendChild(articleTitle);
    article.appendChild(articleThumbnail);
    article.appendChild(articleDescription);
    article.appendChild(articleURL);
}




function toggleWikipedia(){
    const HAPI = document.querySelector("#wikipediaAPI");
    const toggle = document.querySelector("#wikipediaToggle")

    if(HAPI.classList.contains("hidden")) {
        HAPI.classList.remove("hidden");
        toggle.textContent="Nascondi l'articolo del giorno!";
    }
    else {
        HAPI.classList.add("hidden");
        toggle.textContent="Mostra l'articolo del giorno!";
    }
}






if(document.querySelector("#wikipediaAPI")) {
    const HwikipediaToggle = document.querySelector("#wikipediaToggle");
    HwikipediaToggle.addEventListener("click", toggleWikipedia);

    fetch("http://localhost/hw1/apiWiki1.php").then(onResponse).then(onJsonWikipedia2);
}
else {
    console.log("Non sei nella pagina giusta: niente wikipedia")
}





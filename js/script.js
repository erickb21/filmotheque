
var ajaxrequest = new XMLHttpRequest();
var data;
var traitement = "";
addListeFilms();


function requestajax(dataToSend, route) {
    //submitMethod = "POST";
    submitMethod = "GET";
    //alert(window.location.href);
    var pageUrl = window.location.href + "index.php?query=autocomplete" + "&" + dataToSend;
    //var pageUrl = "initsearch.php";
    syncMethod = false; // Méthode asynchrone
    syncMethod = true; // Méthode Syncrone
    //user = "" //nom d'utilisateur as string si "pageUrl" est sécurisée
    //password = "" // mot de passe as string si "pageUrl" est sécurisée

    ajaxrequest.open(submitMethod, pageUrl, true);
    if (submitMethod == "POST") {
        ajaxrequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        //ajaxrequest.setRequestHeader("Content-Type", "text/plain");
}
    //alert(dataToSend);
    ajaxrequest.send("autocompletion");
 


}

//******************
ajaxrequest.onreadystatechange = function () {
    switch (ajaxrequest.readyState) {
        case 0: stateUninitialized(); break; // 0 (uninitialized)	Objet non initialisé
        case 1: stateLoading(); break; // 1 (loading)	Début du transfert des données
        case 2: stateLoaded(); break; // 2 (loaded)	Données transférées
        case 3: stateInteractive(); break; // 3 (interactive)	Données reçues sont accessibles en partie
        case 4: stateComplete(); break; // 4 (complete)	Données sont complètement accessibles
    }
}



function stateComplete() {
    var tmp = ajaxrequest.responseText; //.split(":");
    //if (typeof (tmp[1]) != "undefined") {
    //    f.elements["string1_r"].value = tmp[1];
    //    f.elements["string2_r"].value = tmp[2];
    //}
    //for (var i = 0; i < tmp.length; i++) {
    //alert("stateComplete :" + tmp);


    listeNm(tmp); // retourne la liste des noms

    //alert(traitement);
    //switch (traitement) {
    //    case "getSaisie": listeNm(tmp); break;
    //    case "getInfos": writeInfos(tmp); break;
    //}

    traitement = "";

}

    function listeNm(tmp) {
        var lstnm = tmp.split(";");
        document.getElementById("listfilms").innerHTML = "";
        //alert(lstnm);
        for (var i = 0; i < lstnm.length; i++) {
            var infosFilm = lstnm[i].split(":");
            var listeDeFilms = document.createElement("OPTION");
            listeDeFilms.setAttribute("value", infosFilm[1]);
            listeDeFilms.setAttribute("data-idfilm", infosFilm[0]);
            //listeDeFilms.setAttribute("onclick", "alert('text=' + this.id);");
            document.getElementById("listfilms").appendChild(listeDeFilms);
            //alert(infosFilm[0]);
        }
        //*******************
        //var monbouton = document.getElementById("SearchButton");
        
        //alert("nbelem = " + document.getElementById("listfilms").options.length);
        
        if (document.getElementById("listfilms").options.length <= 2) { window.focus(); }


    }

    function writeInfos(tmp) {
        //alert(tmp);
        document.getElementById("infos").innerHTML = tmp;
        
}
function stateInteractive() {
    var tmp = ajaxrequest.responseText;//.split(":");
    //if (typeof (tmp[1]) != "undefined") {
    //    f.elements["string1_r"].value = tmp[1];
    //    f.elements["string2_r"].value = tmp[2];
    //}
    for (var i = 0; i < tmp.length; i++) {
        //alert("stateInteractive" + tmp[i]);
    }
}

function stateLoaded() {
    var tmp = ajaxrequest.responseText; //.split(":");
    //if (typeof (tmp[1]) != "undefined") {
    //    f.elements["string1_r"].value = tmp[1];
    //    f.elements["string2_r"].value = tmp[2];
    //}
    for (var i = 0; i < tmp.length; i++) {
        //alert("stateLoaded" + tmp[i]);
    }
}

function stateLoading() {
    var tmp = ajaxrequest.responseText; //.split(":");
    //if (typeof (tmp[1]) != "undefined") {
    //    f.elements["string1_r"].value = tmp[1];
    //    f.elements["string2_r"].value = tmp[2];
    //}
    for (var i = 0; i < tmp.length; i++) {
        //alert("stateLoading" + tmp[i]);
    }
}

function stateUninitialized() {
    var tmp = ajaxrequest.responseText;//.split(":");
    //if (typeof (tmp[1]) != "undefined") {
    //    f.elements["string1_r"].value = tmp[1];
    //    f.elements["string2_r"].value = tmp[2];
    //}
    for (var i = 0; i < tmp.length; i++) {
        //alert("stateUninitialized" + tmp[i]);
    }
}

// **************************

//création de la zone de recherche
function addListeFilms() {
    //alert("addliste");
    //var divSearchFilm = document.createElement("DIV");
    //divSearchFilm.setAttribute("id", "searchzone");
    //divSearchFilm.setAttribute("class", "searchzone");
    //document.getElementById("formFilmSearch").appendChild(divSearchFilm);
    var rechercheFilm = document.createElement("INPUT");
    rechercheFilm.setAttribute("id", "search");
    rechercheFilm.setAttribute("type", "search");
    rechercheFilm.setAttribute("required","");
    rechercheFilm.setAttribute("list", "listfilms");
    rechercheFilm.setAttribute("autocomplete", "off");
    rechercheFilm.setAttribute("placeholder", "rechercher un film");
    rechercheFilm.setAttribute("onkeyup", "autocompletion(this.value);");
    //rechercheFilm.setAttribute("onchange", "onclick="this.href =\'film/\' + document.getElementById(\'listfilms\').options[0].dataset.idfilm;");



    document.getElementById("searchzone").appendChild(rechercheFilm);
    var inhtm = document.getElementById("searchzone").innerHTML;
    //document.getElementById("searchzone").innerHTML = inhtm + '<label class="label-icon" for="search"><i id="SearchButton";" class="material-icons">search</i></label><i class="material-icons" onclick="clearSearh();" >close</i>';
    document.getElementById("searchzone").innerHTML = inhtm + '<label class="label-icon" for="search"><a id="lookForFilm" href="" onmouseover="chercheInfos(this);" onclick="linksearch(this);"><i id="SearchButton" class="material-icons">search</i></a></label><i class="material-icons" onclick="clearSearh();" >close</i>';
 
    var dataListeFilms = document.createElement("DATALIST");
    dataListeFilms.setAttribute("id", "listfilms");
    //dataListeFilms.setAttribute("onclick", "alert(document.getElementById('search').value);");
    document.getElementById("searchzone").appendChild(dataListeFilms);


    var listeDeFilms = document.createElement("OPTION");
    listeDeFilms.setAttribute("value", "");
    listeDeFilms.setAttribute("data-idfilm", "");
    document.getElementById("listfilms").appendChild(listeDeFilms);
}

function clearSearh() {
    document.getElementById("search").value = "";
    document.getElementById("listfilms").innerHTML = "";
}


function autocompletion(textesaisi) {
    //alert("text = " + textesaisi);

    if (textesaisi == "") { clearSearh(); return; }

    data = "saisie=" + textesaisi + "%";
  
    //traitement = "getSaisie";
    requestajax(data);
    return true;
}

function chercheInfos(element) {
    var input = document.getElementById("search");
    autocompletion(input.value);
    //input.value = input.value;
   






   //*********************************
   // var selectionFilm = document.getElementById("listfilms");//document.getElementById("search").value;

   // alert("id du film sélectionné " + selectionFilm.options[0].dataset.idfilm);
   // var filmId = "film/" + selectionFilm.options[0].dataset.idfilm;
   // //alert(filmId);
   //// alert("chemin : " + filmId);
   //alert("origin : " + window.location.origin);
   //alert("href : " + window.location.href);
   // alert("path :" + document.location.pathname);   
   // window.location =  filmId;
   // //alert(window.location);
   // //return;
   // //data = "infos=" + selectionFilm.options[0].id;//+ "%";
   // //traitement = "getInfos";
   // //requestajax(data);
   // ******************************************
    
    //return true;
}

function linksearch(element) {
    var liste = document.getElementById("listfilms");
    if (liste.options[0].dataset.idfilm == "") {
        element.href = "";
    } else {
    element.href = "film/" + liste.options[0].dataset.idfilm;}
}

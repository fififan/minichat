<?php

session_start();

require("models/modelMinichat.php");



// inscription
if (isset($_POST["email"])) {
    insertUser($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["mdp"]);
}

// insertion d'un message
if (isset($_POST["message"])) {
   insertMsg($_POST["message"]);
}

$reponse = getMessage();

if(isset($_POST['emailconnect'])) {
    $reponse = getUser($_POST['emailconnect']);
    $dataUser = $reponse->fetch();
    if ($dataUser['motdepasse'] ==  $_POST['mdpconnect']) {
        $_SESSION['userid'] = $dataUser['id'];
        $_SESSION["prenom"] = $dataUser['prenom'];
    } else {

    }
}

require('views/viewMiniChat.php');  
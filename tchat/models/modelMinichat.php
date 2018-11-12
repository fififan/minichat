<?php

function getMessage() {
	$bdd = co();
	$reponse = $bdd->prepare('
		SELECT * 
        FROM minitchat 
        LEFT JOIN utilisateur 
          ON minitchat.utilisateurId = utilisateur.id
    ');
    $reponse->execute();
    return $reponse;
}    

function insertMsg($msg) {
	$bdd = co();
	$req = $bdd->prepare('
		INSERT INTO minitchat (message, utilisateurId) 
		VALUES (:message, :userId)
	');
	$req->bindParam(':message', $msg);
	$req->bindParam(':userId', $_SESSION['userid']);
	$req->execute();
}

function insertUser($nom, $prenom, $email, $mdp) {
	$bdd = co();
	$reponse = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, motdepasse) VALUES (:nom, :prenom, :email, :motdepasse)');
    $reponse->bindParam(':nom', $nom);
    $reponse->bindParam(':prenom', $prenom);
    $reponse->bindParam(':email', $email);
    $reponse->bindParam(':motdepasse', $mdp);
    $reponse->execute();
}

function co() {
	try{
		$bdd = new PDO('mysql: host=localhost; dbname=test; charset=utf8', 'root', '');
		return $bdd;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}
function getUser($email){
	$bdd = co();
	$reponse = $bdd->prepare('
		SELECT * 
        FROM utilisateur
        WHERE email = :email 
    ');
    $reponse->bindParam(':email', $email);
    $reponse->execute();
    return $reponse;
}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
        <script type="text/javascript" src="lib/js/jquery.js"></script>
        <script type="text/javascript" src="lib/js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>

        <form action="index.php" method="post">
            <p>
                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
                <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

                <input type="submit" value="Envoyer" />
	       </p>
        </form>

<?php
// Connexion à la base de données


try{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
    catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}




    $reponse = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, motdepasse) vALueS (:nom, :prenom, :email, :motdepasse)');
    $reponse->bindParam(':nom', $_POST["nom"]);
    $reponse->bindParam(':prenom', $_POST["prenom"]);
    $reponse->bindParam(':email', $_POST["email"]);
    $reponse->bindParam(':motdepasse', $_POST["motdepasse"]);
    $reponse->execute();

    if (isset($_POST["message"])) {
   $req = $bdd->prepare('INSERT INTO minichat (message, utilisateurId) VALUES (:message, :userId)');
   $req->bindParam(':message', $_POST["message"]);
   $req->bindParam(':userId', $_SESSION['userid']);
   $req->execute();
}

    // Récupération des 10 derniers messages
    $reponse = $bdd->prepare('SELECT * 
                              FROM minitchat 
                              LEFT JOIN utilisateur 
                                ON minitchat.utilisateurId = utilisateur.id;
    ');
    $reponse->execute();

    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

    while ($donnees = $reponse->fetch()){
        echo $donnees['nom'] . " a dit : " . $donnees['message'] . "<br />";
	
    }

    $reponse->closeCursor();

    if(isset($_SESSION['userid'])) {

}

if(isset($_POST['logout'])) {

}
?>
    </body>
</html>
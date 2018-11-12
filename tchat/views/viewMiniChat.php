<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mini-chat</title>
    <script type="text/javascript" src="lib/js/jquery.js"></script>
   <script type="text/javascript" src="lib/js/bootstrap.js"></script> 
    <link rel="stylesheet" href="lib/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
    <style>
    {
        text-align:center;
    }
    </style>
</head>
<body>
    <h1 class="nuit">Mon Minichat</h1><br/><br/>
    
    <?php 
        if(isset($_SESSION['prenom'])) {
            echo $_SESSION['prenom'];
        }
    ?>
    
    <div align="center">
        <h2 class="titreCo">Connexion</h2><br />
        <form method="POST" action="index.php">
            <input type="email" name="emailconnect" placeholder="Votre email"><br />
            <input type="password" name="mdpconnect" placeholder="Votre Mot de passe"><br /><br/>
            <button type="submit" class="btn btn-primary" value="Se connecter">connection</button>
        </form>
    </div><br/>

    <form action="index.php" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <img class="paysage" src="src/img/paysage.jpg"/>
                    <div class="form-group">
                        <label for="validationDefault01">Prénom</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Votre Prénom" />
                    </div>
                    <div class="form-group">
                        <label for="validationDefault02">Nom </label>
                        <input type="text" name="nom" class="form-control" placeholder="Votre Nom " />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Votre email" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de Passe</label>
                        <input type="password" class="form-control" name="mdp" id="exampleInputPassword1" placeholder="Votre Mot de Passe" />
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="bg-dark text-light">
                    <div style="overflow: auto;width: 200px;
    height: 50px;">
                    
                    <?php
                    while ($donnees = $reponse->fetch()){
                    echo $donnees['nom'] . " a dit : " . $donnees['message'] . "<br />";
                }
                ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        </form>

         <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="bg-dark text-light">
                
                <?php
                while ($donnees = $reponse->fetch()){
                    echo $donnees['nom'] . " a dit : " . $donnees['message'] . "<br />";
                }
                ?>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <form action="index.php" method="post">
        <p>
            <label for="message">Message</label> : <input type="text" name="message" id="message" /><br />

            <button type="submit" class="btn btn-success">Envoyer</button>
       </p>
    </form>
</body>
</html>
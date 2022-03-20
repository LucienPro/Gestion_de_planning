<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("connexion_BDD.php");
$pdo=connexion_BDD();

if($_POST) {
$mail = htmlentities(strtolower(trim($_POST['mail'])));
$mdp = trim($_POST['mdp']);
};

if (!empty($_POST)){
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE mail = '$mail' AND mdp = '$mdp'");
    $stmt->execute();
    $row = $stmt ->fetch();
        if ($row) {
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['mail'] = $row['mail'];
                    header('Location:  index.php');        
        };
}   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;900&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/99ba6b2d47.js"
      crossorigin="anonymous"
    ></script>
        <title>Connexion</title>
    </head>
    <body>
        <section>
        <!-- <img
        class="img-asso"
        src="images/logo_M2L.png"
        alt="logo de l'association"
      /> -->
      <div class="container">
      <h3>CONNEXION</h3>
        <form action="login.php" method="post" class="form-inscription">
            <div>
                <label class="centerlabel" for="mail">Mail</label><br>
                <input type="text" placeholder="" name="mail">
            </div>
            <div>
                <label class="centerlabel" for="mdp">Mot de passe</label><br>
                <input type="password" placeholder="" name="mdp">
            </div>
            <div>
                <button class="btn-hover bn22" type="submit"><span>Se connecter</span></button>
                
            </div>
        </form>
        <a class="txt-back-connect" href="index.php">Retour</a>
      </div>
    </section>
    </body>
</html>
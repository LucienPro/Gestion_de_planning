<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("connexion_BDD.php");
$pdo=connexion_BDD();

$nomError = $prenomError = $mailError = $mdpError = $nom = $prenom = $mail = $mdp= "";

if (!empty($_POST)) {

    $nom = checkInput($_POST['nom']);
    $prenom = checkInput($_POST['prenom']);
    $mail = checkInput($_POST['mail']);
    $mdp = checkInput($_POST['mdp']);


    if (empty($nom)) {
        $nomError = 'Ce champ ne peut pas être vide';
    }

    if (empty($prenom)) {
        $prenomError = 'Ce champ ne peut pas être vide';
    }

    if (empty($mail)) {
        $mailError = 'Ce champ ne peut pas être vide';
    }

    if (empty($mdp)) {
        $mdpError = 'Ce champ ne peut pas être vide';
    }



    $pdo=connexion_bdd();
    // Execution de la requete
    $stmt = $pdo->prepare("INSERT INTO utilisateur(nom, prenom, mail, mdp) VALUES (?,?,?,?)");
    $stmt->execute(array($nom, $prenom, $mail, $mdp));
    header('Location: index.php');
}

//Gestion des erreurs

function checkInput($data)
{
    $data = trim($data); //Suppression des espaces (ou d'autres caractères) en début et fin de chaîne
    $data = stripslashes($data); //Suppresion des antislashs d'une chaîne
    $data = htmlspecialchars($data); //Convertit les caractères spéciaux en entités HTML
    return $data;
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
    <title>Inscription</title>
</head>
<body>
    <section>

        <div class="container-inscription">
        <h3>FORMULAIRE D'INSCRIPTION</h3>
            <form action="insert.php" role ="form" method="post" enctype="multipart/form-data" >
                <div>
                    <label for="nom">Nom*</label><br>
                    <input type="text" placeholder="" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                    <span><?php echo $nomError ?></span>
                </div>
                <div>
                    <label for="prenom">Prénom*</label><br>
                    <input type="text" placeholder="" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                    <span><?php echo $prenomError ?></span>
                </div>
                <div>
                    <label for="mail">Mail*</label><br>
                    <input type="email" placeholder="" id="mail" name="mail" value="<?php echo $mail; ?>" required>
                    <span><?php echo $mailError ?></span>
                </div>
                <div>
                    <label for="mdp">Mot de passe*</label><br>
                    <input type="password" placeholder="" id="mdp" name="mdp" value="<?php echo $mdp; ?>" required>
                    <span><?php echo $mdpError ?></span>
                </div>
                <div class="button-inscription">
                    <button class="btn-hover-small bn22" type="submit">Valider <i class="fas fa-check-circle"></i></button>
                </div> 
            </form>
            <div>
                <a class="txt-back" href="index.php">Retour</a>
            </div>
        </div>
    </section>
</body>
</html>
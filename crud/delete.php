<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("../connexion_BDD.php");
$pdo=connexion_BDD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Gestion du planning</title>
</head>
<body>

<form name="form1" method="post" action="delete.php">

    <!-- DEBUT // Selection de la salle -->

    <h3><label for="listsalle">Selectionner une salle</label></h3>
        <select name="listsalle">
            <?php
            $reponse = $pdo->prepare("SELECT * FROM salle");
            $reponse->execute();
            while ($donnees = $reponse->fetch()) {

            echo "<option value=".$donnees['id_salle'].">".$donnees['libelle_salle']."</option>";

            }
            ?>     
            <?php
            if (isset($_POST['listsalle'])){
                echo $_POST['listsalle'];
            }
            
        ?> 
         <br>   
        </select>

        <!-- FIN // Selection de la salle -->

        <!-- DEBUT // Selection Date -->

        <h3><label for="listdate">Selectionner une date</label></h3>
        <input type="date" name="dateres">

        <!-- FIN // Selection Date -->

    <p><input type="submit" value="OK"></p>

</form>

<button><a href="../index.php">Retour</a></button>
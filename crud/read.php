<!-- Connexion à la BDD // Gestion des erreurs -->

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

<!-- DEBUT // Selection de la salle -->

    <form name="form1" method="post" action="read.php">
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
                if (isset($_POST['listsalle'])) {
                    echo $_POST['listsalle'];
                }
                ?> 
            <br>   
            </select>
        <p><input type="submit" value="OK"></p>
    </form>
    <button><a href="../index.php">Retour</a></button>

<!-- FIN // Selection de la salle -->

    
<?php

if (isset($_POST['listsalle'])){
    $idsalle = $_POST['listsalle'];
    $stmt = $pdo->prepare("SELECT id_reservation, DateReservation, libelle_heure, libelle_salle, mail 
    FROM reservation 
    INNER JOIN heure ON heure.id_Heure = reservation.id_heure 
    INNER JOIN salle ON salle.id_Salle = reservation.id_salle 
    INNER JOIN utilisateur ON reservation.id_User = utilisateur.id_user
    WHERE reservation.id_Salle = '$idsalle'");

    $stmt->execute();
            while ($row = $stmt ->fetch()) {
                echo "<tr>";
                echo "<td><p>Réservation : ".$row['id_reservation']."</p></td>";
                echo "<td><p>Salle : ".$row['libelle_salle']."</p></td>";
                echo "<td><p>Heure : ".$row['libelle_heure']."</p></td>";
                echo "<td><p>Date : ".$row['DateReservation']."</p></td>";
                echo "<td><p>Adresse mail de réservation : ".$row['mail']."</p></td>";
                echo "</br>";
                echo "</tr>";
                }
            }
        
?>
</body>
</html>


       
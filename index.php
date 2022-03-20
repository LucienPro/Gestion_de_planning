<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Accueil</title>
  </head>
  <body>
        <?php 
          if (!isset($_SESSION['id_user'])) {
        ?>
        <button><a href="insert.php">Inscription</a></button>
        <button><a href="login.php">Connexion</a></button>
        <?php
          } else {
        ?>
        <button><a href="crud/read.php">Voir le planning</a></button>
        <?php echo "<button><a href=\"crud/add.php?id=$_SESSION[id_user]\">Réserver un créneau</a></button>"; ?>
        <?php echo "<button><a href=\"crud/update.php?id=$_SESSION[id_user]\">Modifier un créneau</a></button>";?>
        <?php echo "<button><a href=\"crud/delete.php?id=$_SESSION[id_user]\">Supprimer un créneau</a></button>";?>
        
        <button><a href="disconnect.php">Déconnexion</a></button>
        <?php
          }
        ?>

        
  </div>
  </section>
  </body>
</html>
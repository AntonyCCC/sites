<html> <head> <title>Mes Contacts</title> </head>
<body>
  <h2>Mes contacts</h2>
  <?php
    //Inclusion du fichier de connexion
    include ('connexionBase.php');
    //Connexion au serveur 
    $idconnexion = BDD_Connect();
    //Si la connexion est ok
    if ($idconnexion) {
      //ACTION
      if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
          case 'ajout' :
               $requete = "insert into contact (nom, prenom, email, commentaires) values ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['commentaires']."')";
               $resultat = $idconnexion->query($requete);
               break;

          case 'suppression' :
               $requete = "delete from contact where numero = '".$_REQUEST['num']."'";
               $resultat = $idconnexion->query($requete);
               break;

        }
      }

      //AFFICHAGE CATEGORIE
      $requete = "select * from contact";
      //Récupération du résultat de la requête dans jeuResultat
      $jeuResultat = $idconnexion->query($requete);
      //Pour chaque ligne de jeuResultat (pris comme un tableau)
      echo "<table width='75%' border='1'>";
      while ($ligne = mysqli_fetch_array ($jeuResultat)) {
	      //Construction de la page HTML
  	      echo "<tr>";
      	  echo "<td>".$ligne[0]."</td>";
      	  echo "<td>".$ligne[1]."</td>";
      	  echo "<td>".$ligne[2]."</td>";
      	  echo "<td>".$ligne[3]."</td>";
      	  echo "<td>".$ligne[4]."</td>";
      	  echo "<td align='center'><a href='04-AjoutSuppressionContact.php?action=suppression&num=".$ligne[0]."'> X </a></td>";
      	  echo "</tr>";
      }
      echo "</table>";
    }
?>
  <hr>
  <form name="formSaisieContacts" action="02-AffichageAjoutSuppressionContact.php?action=ajout" method="POST">
    <input type="text" name="nom" value="Votre nom"><br />
    <input type="text" name="prenom" value="Votre prenom"><br />
    <input type="text" name="email" value="Votre email"><br />
    <textarea name="commentaires" rows="5" cols="20">Saisissez votre commentaire</textarea><br />
    <input type="submit" name="submit" value="Envoyer">
    <input type="reset" value="annuler">
  </form>
<?
    //Fermeture des objets pour libération mémoire
    mysqli_close ($idconnexion);
  ?>
</body> </html>
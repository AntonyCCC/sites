<?php
  //Connexion à la BDD
   $connect = mysqli_connect('172.31.29.27', 'utilmysql', 'Password2021!', 'contacts') or die("Impossible de se connecter : ");

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Reception des variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $commentaires = $_POST['commentaires'];
    //Insertion du contact
    $connect->query("insert into contact (nom, prenom, email, commentaires) values ('$nom','$prenom','$email','$commentaires')");
    header("location: ".$_SERVER['PHP_SELF']);
    exit;
  }
?>
<html>
  <head><title>Les contacts</title></head>
<body>
  <h1>Les contacts</h1>
  <div id="contact">
    <?php
      $req = $connect->query("SELECT * FROM contact");
    ?>
  <h3>Mes contacts : </h3>
  <?php
  //Affichage des contacts
    while ($contact = mysqli_fetch_array($req)) {?>
      <p><?php echo $contact['numero'] ?> - <?php echo $contact['prenom'] ?> <?php echo $contact['nom'] ?></p>
    <?php } ?>
  <?php //Formulaire de saisie d'un nouveau contact ?>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="ajoutcontact">
    <input type="text" name="nom" value="Votre nom"><br />
    <input type="text" name="prenom" value="Votre prenom"><br />
    <input type="text" name="email" value="Votre email"><br />
    <textarea name="commentaires" rows="5" cols="20">Saisissez votre commentaire</textarea><br />
    <input type="submit" name="submit" value="Envoyer">
  </form>
  </div>
</body>
</html>

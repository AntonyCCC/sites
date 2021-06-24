<!doctype html>
<html>
<head>
	<title> CCC's Contacts</title>
	<meta http-equiv="content-type" content="texthtml; charset=utf-8">
</head>
<body>
  <table>
	<tr><td><H1> Liste des contacts </H1></td></tr>
	<?php
	    //Informations de connexion
    	$dsn = "mysql:host=172.31.29.27;port=3306;dbname=contacts";
    	$user='utilmysql';
    	$password='Password2021!';
    	try{
    	    //Connexion
    		$dbh=new PDO($dsn, $user, $password);
    		//Récupération des données
    		$resultat=$dbh->query("select * from contact");
    		//Parcours et affichage
    		foreach($resultat->fetchAll(PDO::FETCH_OBJ) as $ligne){
    			echo '<tr><td>id: '.$ligne->id.'</td><td> nom: '.$ligne->prenom.' '.$ligne->nom.'</td></tr>';
    		}
    		$resultat->closeCursor();
    	}catch(PDOException $e){
    		echo 'Erreur : '.$e->getMessage();
    	}
	?>
  </table>
</body>
</html>

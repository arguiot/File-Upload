<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Connexion</title>
		<!-- Google web police -->
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
		<!-- Google icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- fichier CSS -->
		<link type="text/css" href="assets/css/style.css" rel="stylesheet" />
		<style type="text/css">
		.miniature {
    width: 300px;
    height: 300px;
    background-size: auto 300px;
    background-position: center top;
}</style>
	</head>
	
	<body id="upload" >
		<center><h3><strong>Connexion</strong></h3></center>
		<center>
		<h4>
		<div id="gallery">
		<?php
		switch ($_GET['error']) {
			case '1':
				echo "<font color=\"red\" >Mauvais identifiant ou mot de passe!</font>";
				break;
			
			case '2':
				echo "<font color=\"red\" >Oups! Il y a un probleme!</font>";
				break;
			case '3':
				echo "<font color=\"red\" >Oups! Il y a un probleme!</font>";
				break;
			case '4':
				echo "<font color=\"red\" >Veuillez vous connecter!</font>";
				break;
			default:

				break;
		}
		?>
		<form method="post" action="check.php">
			<label>Pseudo:<input type="text" name="pseudo"></label><br/>
			<label>Mot de passe:<input type="password" name="pass"></label>
			<button type="submit">Envoyer</button>
		</form>
		<button><a href="/inscription.php">Créer un compte</a></button>
	</body>
</html>
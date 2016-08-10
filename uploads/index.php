<?php
include("setting.php");
if (empty($_COOKIE['pseudo']) OR empty($_COOKIE['pass'])) 
{
	header('Location : ../index.php?error=4');
}
                        $pass_hache = $_COOKIE['pass'];
                        $pseudo = $_COOKIE['pseudo'];
                            $sql = "SELECT * FROM membres WHERE pseudo = :pseudo AND pass = :pass";
                        
                            $req = $bdd->prepare($sql);
                            $req->execute(array(
                            'pseudo' => $pseudo,
                            'pass' => $pass_hache));
                            $donnees = $req->fetch();
                                                       
                            if (!$donnees)
                            {
                            
                                header('Location: ../index.php?error=1');
                            }
                            elseif ($donnees['status'] == "2") 
                            {
                                header('Location: ../index.php?error=2');
                            }
                            elseif ($donnees['status'] == "3") 
                            {
                                header('Location: ../index.php?error=3');
                            }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=utf-8 />
		<title>Liste des fichiers du dossier UPLOADS</title>
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
    border-radius: 10px;
}</style>
	</head>
	
	<body id="upload" >
		<center><h3><strong>Liste des fichiers/pages du dossier UPLOADS</strong></h3></center>
		<center>
		<h4>
		<div id="gallery">
    
    
			<?php
			if($dossier = opendir("./" . $_COOKIE['pseudo'] . "/uploads/"))
			{
			?><?php
			while(false !== ($fichier = readdir($dossier)))
			{
				$info = new SplFileInfo($fichier);
				$extension = $info->getExtension();
				$ext = $extension;
				

			if (preg_match("/jpg$/", $ext) OR preg_match("/png$/", $ext) OR preg_match("/jpeg$/", $ext) OR preg_match("/JPG$/", $ext)) 
			{
				$img = '<a href="' . $_COOKIE['pseudo'] . "/uploads/" . $fichier . '"><div class="miniature" style="background-image: url(' . $_COOKIE['pseudo'] . "/uploads/" . preg_replace("/\s/", "%20", $fichier) . ')"></div></a>';
			}
			else
			{
				$img = '<a href="' . $_COOKIE['pseudo'] . "/uploads/" . $fichier . '"><img src="//ssl.gstatic.com/docs/doclist/images/mediatype/icon_2_generic_x128.png" alt=""></a>';
			}

			if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'delete.php' && $fichier != 'assets' && $fichier != 'miniature')
			{
			
			$nb_fichier++; // On incrémente le compteur de 1
			echo $img . '<br/>' . $fichier . '<a href="delete.php?file=' . $_COOKIE['pseudo'] . "/uploads/" . $fichier . '"><i class="material-icons">delete</i></a><br/>';
			} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
			 
			} // On termine la boucle
			
			echo '</h4></center><br />';
			echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

			 
			closedir($dossier);
			 
			}
			 
			else
			     echo 'Le dossier n\' a pas pu être ouvert';
			?>
			<center><a class="btn" href="../logged.php"><strong>Retour</strong></a></center>

		
	</body>
</html>
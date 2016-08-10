<?php
include("setting.php");
if (empty($_COOKIE['pseudo']) OR empty($_COOKIE['pass'])) 
{
	header('Location : /index.php?error=4');
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
                            
                                header('Location: /index.php?error=1');
                            }
                            elseif ($donnees['status'] == "2") 
                            {
                                header('Location: /index.php?error=2');
                            }
                            elseif ($donnees['status'] == "3") 
                            {
                                header('Location: /index.php?error=3');
                            }
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Upload</title>

		<!-- Google web police -->
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

		<!-- fichier CSS -->
		<link href="assets/css/style.css" rel="stylesheet" />
	</head>

	<body>

		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Upload

				<a>Ouvrir</a><br/>
				<input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- Les fichiers uploadés seront ici -->
			</ul>
			<br/>
			<br/>
			<center><a class="btn" href="/uploads/"><strong>Fichiers upload</strong></a></center>
		</form>

        
		<!-- JavaScript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Fichier JS principal -->
		<script src="assets/js/script.js"></script>


	</body>
</html>
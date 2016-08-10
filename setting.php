<?php
//Google Recaptcha
$siteKey = ''; // votre clé publique
$secret = ''; // votre clé privée
//votre URL
$url = '';
//Base de données
try
    {
      $bdd = new PDO('mysql:host=;dbname=;pass=;charset=utf8', '', '');
    }
   catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
?>
<?php
include("setting.php");
    session_start();

    
                            
                        $pass_hache = sha1($_POST['pass']);
                        $pseudo = $_POST['pseudo'];
                            $sql = "SELECT * FROM membres WHERE pseudo = :pseudo AND pass = :pass";
                        
                            $req = $bdd->prepare($sql);
                            $req->execute(array(
                            'pseudo' => $pseudo,
                            'pass' => $pass_hache));
                            $donnees = $req->fetch();
                                                       
                            if (!$donnees)
                            {
                            
                                header('Location: index.php?error=1');
                            }
                            elseif ($donnees['status'] == "2") 
                            {
                                header('Location: index.php?error=2');
                            }
                            elseif ($donnees['status'] == "3") 
                            {
                                header('Location: index.php?error=3');
                            }
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            setcookie("pseudo", $_SESSION['pseudo'], time()+(3600*3));
                            setcookie("pass", $pass_hache, time()+(3600*3));
?>
<p>Chargement...</p>
<script type="text/javascript">window.setTimeout("location=('/logged.php');",1000);</script>
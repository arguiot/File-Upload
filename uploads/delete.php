<?php
if (!empty($_GET['file'])) 
{

		unlink($_GET['file']);
		header('Location: index.php');


}
else
{
	header('Location: index.php?error=1');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<html lang="fr">
	<title>chargement</title>
</head>
<body>
	<p style="font-family: arial;">chargement...</p>
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{	
        	die('Erreur : ' . $e->getMessage());
		}

		isset($_POST["pseudo"]);
		$pseudo = htmlspecialchars($_POST['pseudo']);

		isset($_POST["message"]);
		$message = htmlspecialchars($_POST['message']);

		$req = $bdd -> prepare('INSERT INTO chat (pseudo, message) VALUES(:pseudo, :message)');

		$req -> execute(array(
			'pseudo' => $pseudo,
			'message' => $message
		));

		echo "message posté";
		header('Location: minichat.php');
	?>
</body>
</html>
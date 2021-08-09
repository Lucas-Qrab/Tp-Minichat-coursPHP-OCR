<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<html lang="fr">
	<title>chat</title>
</head>
<body>
	<h1 style="font-size: 50px; font-family: Arial; color: #ec10ab; text-align: center;">The monstruosity</h1>
	<p style="font-family: Arial; font-size: 25px; text-align: center;">Bienvenue sur le forum</p>
	<br><br><br><br>
	<form id="new" style="text-align: center; font-family: Arial;" method="post" action="minichat_post.php">
		<label for="new" style="font-size: 20px;">Quelque chose a nous dire ?</label>
		<br><br>
		<label for="pseudo">Ton pseudo : </label>
		<br>
		<input type="text" id="pseudo" name="pseudo" maxlength="25" placeholder="XxKevinxX" required>
		<br><br>
		<label for="message">Ton message : </label>
		<br>
		<textarea id="message" name="message" placeholder="ta story" required></textarea>
		<br><br>
		<input type="submit" name="valider" value="valider">
	</form>
	<br><br><br><br>
	<h2 style="font-family: Arial; font-size: 25px; ">Derniers messages postés : </h2>
	<br>
	<?php 
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{	
        	die('Erreur : ' . $e->getMessage());
		}

		$req = $bdd -> query('SELECT pseudo, message, id FROM chat ORDER BY id DESC LIMIT 0,10' );
		while ($donnees = $req->fetch())
		{
			echo '<strong>' . $donnees['pseudo'] . '</strong>' . ' '. 'a dit : ' . $donnees['message'] . '<br />';
		}
		$req->closeCursor(); // Termine le traitement de la requête

	?>
</body>
</html>
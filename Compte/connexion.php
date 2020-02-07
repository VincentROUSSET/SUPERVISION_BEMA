<?php
	include('../BDD.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1 align="center">Connexion</h1>
	<form method="POST" action="">

					<label class="label_id" for="pseudo">Entrez votre identifiant</label>

					<input type="text" placeholder="" id="identifiant" name="identifiant">

					<label class="label_mdp" for="mdp">Entrez votre mot de passe</label>

					<input type="password" placeholder="" id="mdp" name="mdp">

					<input type="submit" name="" value="Se connecter">

					<a href="../index.php" id="retour">Retour</a>

	</form>
	</div>
</body>
</html>

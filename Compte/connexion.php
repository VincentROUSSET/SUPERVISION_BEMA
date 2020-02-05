<?php

	include('BDD.php');

	

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
</head>
<body>
	<form method="POST" action="">
		<table align="center">
			<tr>
				<td align="right">
					<label class="label_id" for="pseudo">Entrez votre identifiant</label>
				</td>
				<td>
					<input type="text" placeholder="Votre Pseudo" id="ident" name="pseudo">
				</td>
			</tr>
			<tr>
				<td align="right">
					<label class="label_mdp" for="mdp">Entrez votre mot de passe</label>
				</td>
				<td>
					<input type="password" placeholder="Votre mot de passe" id="mdp" name="mail">
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="" value="Se connecter">
				</td>
			</tr>
		</table>
	</form>
	
</body>
</html>

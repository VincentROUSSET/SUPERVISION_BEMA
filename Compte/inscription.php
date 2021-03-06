<?php
	include('../BDD.php');

	$reqDroitAcces = $bdd->query("SELECT * FROM droits_acces");
	$reqGroupe = $bdd->query("SELECT * FROM groupe");
	$donneesDroitAcces = $reqDroitAcces->fetchAll();
	$donneesGroupe = $reqGroupe->fetchAll();
	var_dump($donneesDroitAcces);
	var_dump($donneesGroupe);
	
	if (isset($_POST['forminscription'])) 
{
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);
	$email2 = htmlspecialchars($_POST['email2']);
	$identifiant = htmlspecialchars($_POST['identifiant']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
	$id_droits_acces = htmlspecialchars($_POST['id_droits_acces']);
	$id_groupe = htmlspecialchars($_POST['id_groupe']);
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['id_droits_acces']) AND !empty($_POST['id_groupe']))
	{
		
		$nom_length = strlen($nom);
			if($email == $email2)
			{
					
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
					$reqmail->execute(array($email));
					$mailexist = $reqmail->rowCount();
					if($mailexist == 0)
					{
						if($mdp == $mdp2)
						{
							$insertuser = $bdd->prepare("INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `id_droits_acces`, `id_groupe`) VALUES (NULL, '?', '?', '?', '?', '?')");
							$insertuser->execute(array($nom, $prenom, $email, $id_droits_acces, $id_groupe));
							$insertaccount = $bdd->prepare("INSERT INTO `compte` (`id`, `identifiant`, `password`, `id_utilisateurs`) VALUES (NULL, 'test', 'test', '1') ");
							$insertuser->execute(array($identifiant, $mdp, $nom));
							$erreur = "Votre compte à bien été créer ! <a href=\"connexion.php\">Me connecter</a>";	
						}
						else
						{
						 	$erreur = "Vos mots de passes ne correspondent pas !";
						}
					}
					else
					{
						$erreur = "Adresse mail déjà utilisée !";
					}
				}
				else
				{
					$erreur = "Vos adresses mail ne correspondent pas !";
				}

			}
			else
			{
				$erreur = "Votre adresse mail n'est pas valide !";
			}
		}
	}
	else
	{
		$erreur = "Tous les champs ne sont pas complétés !";
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Créer un compte</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
</head>
<body>

	<div class="container">
			<h1 align="center">Inscription</h1>
			<br /> <br />
			<form method="POST" action="">

				<label for="nom">Nom : </label>

				<input type="text" placeholder="" id="nom" name="nom">

				<label for="prenom">Prénom : </label>

				<input type="text" placeholder="" id="prenom" name="prenom">

				<label for="Identifiant">Identifiant :</label>

				<input type="text" placeholder="" id="identifiant" name="identifiant">

				<label for="mdp">Mot de passe :</label>

				<input type="password" placeholder="" id="mdp" name="mdp">

				<label for="mdp2">Confirmation du mot de passe : </label>

				<input type="password" placeholder="" id="mdp2" name="mdp2">

				<label for="email">Adresse mail : </label>

				<input type="email" placeholder="" id="email" name="email">

				<label for="email2">Confirmez l'Adresse mail : </label>

				<input type="email" placeholder="" id="email2" name="email2">

				<label>Sélectionnez l'Habilitation : </label>
				        <select name="id_droits_acces">
				        	<?php
				        	
				        	  foreach($donneesDroitAcces as $valueDroitAcces){ ?>

				        
						        <option value="id_droits_acces"><?php echo $valueDroitAcces['type'] ?></option>";

						    <?php
				   			  } 
				   		    ?>
						   
				        </select>
				        

						<br />

				<label>Sélectionnez le groupe : </label>
				        <select name="id_groupe">
				        	<?php
				        	
				        	  foreach($donneesGroupe as $valueGroupe){ ?>

				        
						        <option value="id_groupe"><?php echo $valueGroupe['nom_groupe'] ?></option>";

						    <?php

				   			  }
				   			 
				   		    ?>
						      

						   
				        </select>
				        

						<br />

				<input type="submit" name="forminscription" value="Créer un nouvel utilisateur">
				<a href="../index.php">Retour</a>
			</form>
			<?php
			echo "$erreur";
			?>
	
</body>
</html>

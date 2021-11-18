<?php include 'config.php'; ?>
<?php require('recaptcha/autoload.php'); ?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>S'inscrire</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1><a href="register.php" class="titre"><i>S'inscrire</i></a></h1>
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li ><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="login.php">Se connecter</a></li>
									<li class="current"><a href="register.php">S'inscrire</a></li>
								</ul>
							</nav>

					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">

						<!-- Content -->

								<!-- Blog -->
<?php
if(isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

if(isset($_POST['valider'])){
	if(isset($_POST['pseudo'], $_POST['email'], $_POST['email2'], $_POST['mdp'], $_POST['mdp2']) && !empty($_POST['pseudo'])&& !empty($_POST['email']) && !empty($_POST['mdp'])&& !empty($_POST['mdp2'])){
		$pseudo = utf8_decode($_POST['pseudo']);
		$mdp = md5($_POST['mdp']);
		$mdp2 = md5($_POST['mdp2']);
		$mdpn = $_POST['mdp'];
		$email = utf8_decode($_POST['email']);
		$email2 = utf8_decode($_POST['email2']);

		$req2 = $db->query("SELECT pseudo FROM membre WHERE pseudo = '$pseudo'");
		$info_membre = $req2->fetch(PDO::FETCH_BOTH);

		$req3 = $db->query("SELECT email FROM membre WHERE email = '$email'");
		$info_membre2 = $req3->fetch(PDO::FETCH_BOTH);

		if(!isset($info_membre['pseudo'])){
		if(!isset($info_membre2['email'])){
		$longeur_pseudo = strlen($pseudo);
		if($longeur_pseudo <= 25){
		if($longeur_pseudo >= 5){
				$longeur_mdp = strlen($mdpn);
				if($longeur_mdp <= 25){
				if($longeur_mdp >= 5){
			if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)){
			if($mdp == $mdp2 && $email == $email2){

					$recaptcha = new \ReCaptcha\ReCaptcha('6Lc1axoUAAAAAKU6Mkrwqdqeddh1duAyIf2ypuur');
					$resp = $recaptcha->verify($_POST['g-recaptcha-response']);
					if ($resp->isSuccess()) {


				$db->query("INSERT INTO membre(id, admin, pseudo, email, motdepasse, points, ban) VALUES (NULL, '0', '$pseudo', '$email', '$mdp', '0', '0')");
				$success = header('Location: login.php');
				$erreur2 = 'Impossible de créer ce pseudo: (' .$db->errno. ')' .$db->error;
			}else{
				$erreur = 'Captcha non valide';
			}
			}else{
				$erreur = 'Les mots de passe ou email ne correspondent pas!';
			}
			}else{
			$erreur = 'L\'adresse email n\'est pas sous la forme: (email d\'exemple: azerty@uiop.fr)';
			}
			}else{
				$erreur = 'Le mot de passe est trop court! (min: 5)';	
			}
			}else{
				$erreur = 'Le mot de passe est trop long! (max: 25)';
			}
			}else{
			$erreur = 'Le pseudo est trop court! (min: 5)';
		}
		}else{
			$erreur = 'Le pseudo est trop long! (max: 25)';
		}
		}else{
			$erreur = 'Cet email existe déja!';
		}
	}else{
		$erreur = 'Ce pseudo existe déja!';
	}
	}else{
		$erreur = 'Vous devez remplire tout les champs!';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>S'inscrire</title>
</head>
<body>
<?php 
if(isset($erreur)){
	echo '<h3><center><a style="color:red">ERREUR: ' .$erreur. '</a></center></h3><hr>';
}
if(isset($erreur2)){
	echo '<h3><center><a style="color:red">ERREUR: ' .$erreur2. '</a></center></h3><hr>';
}
if(isset($success)){
	echo '<h3><center><a style="color:green">' .$success. '</a></center></h3><hr>';
}
?>
<form action="register.php" method="post">
	Votre pseudo:<input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"><br><br>
	Votre email:<input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"><br><br>
	Email de confirmation:<input type="text" name="email2"><br><br>
	Votre mot de passe:<input type="password" name="mdp" value="<?php if(isset($_POST['mdp'])){echo $_POST['mdp'];} ?>"><br><br>
	Mot de passe de confirmation:<input type="password" name="mdp2"><br><br>
	<div class="g-recaptcha" data-sitekey="6Lc1axoUAAAAAM8JfjD4wv8OY0_J9a1cNYXFU98H"></div><br>
	<input type="submit" name="valider" value="S'inscrire">
	
</form>
</body>
</html>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			<!-- Footer -->

				<?php include 'footer/footer.html' ?>
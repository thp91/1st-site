<?php include 'config.php'; ?>

<?php  

if(isset($_SESSION['pseudo'])){
	header('Location: email.php');
}

?>

<?php

if(isset($_POST['envoyer'])){
	if(!empty($_POST['email']) && !empty($_POST['contenu']) && !empty($_POST['nom'])){
	$email_destinataire = $_POST['email'];
	$contenu = $_POST['contenu'];

	$headers = 'FROM: "'.$_POST['nom'].'" <'.$email_destinataire.'>'."\n";
	$headers.= 'Reply-to: "'.$email_destinataire.'"'."\n";
	$headers.= 'Content-type: text/html; charset="iso-8859-1"'."\n";
	$headers.= 'Content-transfert-encoding: 8bit';

	mail('t.maz@orange.fr', 'RENSEIGNEMENT SITES', $contenu, $headers);

	$succes = '<span style="color:#3ADF00">Votre email a bien été envoyer!</span>';
}else{
	$erreur = '<span style="color:red">Veillez remplire tout les champs!</span>';
}
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1><a href="index.php" class="titre"><i>Accueil</i></a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li class="current"><a href="email.php">Me contacter</a></li>
									<li><a href="login.php">Se connecter</a></li>
									<li><a href="register.php">S'inscrire</a></li>
								</ul>
							</nav>
							</div>
							</div>

										<div id="main-wrapper">
					<div class="container">								
					<center><?php
							if(isset($erreur)){
								echo $erreur;
							}
							if(isset($succes)){
								echo $succes;
							}
								?></center>
	<form method="post">
		<input type="text" name="email" placeholder="Votre email:"><br>
		<input type="text" name="nom" placeholder="Votre nom et prénom:"><br>
		<textarea name="contenu" placeholder="Votre message:"></textarea><br>
		<input type="submit" name="envoyer" value="Envoyer">
	</form>

	</div>
				</div>

			<!-- Main -->



			<!-- Footer -->
				<?php include 'footer/footer.html' ?>
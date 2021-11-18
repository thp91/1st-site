<?php include 'config.php'; ?>

<?php

$pseudo = $_SESSION['pseudo'];

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

?>

<?php 

									$req1 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
									$info_membre = $req1->fetch(PDO::FETCH_BOTH);
									$id = $info_membre['id'];

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
	<body class="homepage">
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
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="logout.php">Se déconnecter (<?php echo $_SESSION['pseudo']; ?>)</a></li>
								</ul>
							</nav>
							<hr>

							<?php


							if(isset($_POST['valider'])){
								if (isset($_POST['newemail']) && !empty($_POST['newemail'])){
									$newemail = $_POST['newemail'];

									$req3 = $db->query("SELECT email FROM membre WHERE email = '$newemail'");
									$info_membre2 = $req3->fetch(PDO::FETCH_BOTH);
									$email2 = $info_membre2['email'];

									if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $newemail)){
										if(!isset($email2)){
									$update_pseudo = $db->prepare("UPDATE membre SET email = ? WHERE id = ?");
									$update_pseudo->execute(array($newemail, $id));
									session_destroy();
									header('Location: login.php');
									}else{
										echo 'Cet email existe déja!';
									}
								}else{
									echo 'L\'adresse email n\'est pas sous la forme: (email d\'exemple: azerty@uiop.fr)';
								}
								}else{

									echo 'Veillez remplire tout les champs!';

									}
								}
							?>


							<form action="newemail.php" method="post">
							Votre nouvel email:<input type="text" name="newemail" ?><br>
							<input type="submit" name="valider" value="valider">


							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
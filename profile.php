<?php include 'config.php'; ?>
<?php

if(!isset($_SESSION['pseudo'])){
	header('Location: index_visiteur.php');
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
									<li ><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li class="current"><a href="profile.php">Profile (<?php echo $_SESSION['pseudo']; ?>)</a></li>
									<li><a href="logout.php">Se déconnecter</a></li>
								</ul>
							</nav>

							<?php
							$pseudo = $_SESSION['pseudo'];
							$req1 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
							$info_membre = $req1->fetch(PDO::FETCH_BOTH);
							?>

							<hr>

							Numéro de compte: <?php echo "#" .$info_membre['id']; ?>
							<br>
							<a href="newmdp.php">Changer de mot de passe.</a>
							<br>
							Pseudo: <?php echo $_SESSION['pseudo']; ?> <a href="newpseudo.php">Changer de pseudo.</a>
							<br>
							Email: <?php echo $info_membre['email']; ?> <a href="newemail.php">Changer d'email.</a>
							<br>
							Rang: <?php if($info_membre['admin'] == 0){
								echo 'User.';
							}elseif($info_membre['admin'] == 1){
								echo 'Administrateur.';
							}elseif($info_membre['admin'] == 2){
								echo 'FONDATEUR.';
							}
							?>
							<br>
							Solde: <?php echo $info_membre['points'] ?>€.
							<br>
							<a onclick="if (confirm('Etes vous sur?')){ document.location.href='delete_final.php'; }else{}">Supprimer son compte définitivement!</a>
							<hr>

							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
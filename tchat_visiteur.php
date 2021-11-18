<?php include 'config.php'; ?>
<?php include 'online.php'; ?>

<?php if(isset($_SESSION['pseudo'])){header('Location: tchat.php');} ?>

<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Tchat</title>
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
							<h1><a href="tchat.php" class="titre"><i>Tchat</i></a></h1>
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li  class="current"><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="login.php">Se connecter</a></li>
									<li><a href="register.php">S'inscrire</a></li>
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

$nb = $db->query("SELECT COUNT(id) FROM tchat");
$nb_message = $nb->fetch(PDO::FETCH_BOTH);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Tchat</title>
</head>
<body>
<?php
$data1 = $db->query("SELECT * FROM tchat ORDER BY id LIMIT 0,10");
while($donnees = $data1->fetch(PDO::FETCH_BOTH)){
	if($data1){
	echo htmlentities($donnees['auteur']). ',<br>Le ' .$donnees['date']. ' à ' .$donnees['temps']. ':<br>';
	echo '<br>' .htmlentities($donnees['contenu']);
	}
}
?>
<?php
if(isset($_POST['valider'])){
	if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo']) && isset($_POST['contenu']) && !empty($_POST['contenu']) ){
		$auteurS = utf8_decode($_SESSION['pseudo']);
		$contenuS = utf8_decode($_POST['contenu']);

	$db->query("INSERT INTO tchat(id, auteur, contenu) VALUES (NULL, '".$auteurS."', '".$contenuS."')");
	header('Location: tchat.php');
	}else{
		echo 'Veuillez remplire tout les champs!';
	}
}

?>
<br>
<br>
<?php echo 'Nombre de message: ' .$nb_message[0]. '.<br>'; ?>
<?php echo 'Membres connectés: ' .$user_number. '.'; ?>
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
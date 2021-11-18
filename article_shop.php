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
									<li class="current"><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="profile.php">Profile (<?php echo $_SESSION['pseudo']; ?>)</a></li>
									<li><a href="logout.php">Se déconnecter</a></li>
								</ul>
							</nav>
							<hr>

							<div id="main-wrapper">
							<div class="container">

							<?php

							if(isset($_GET['id'])){
								$id = $_GET['id'];
								$req = $db->query("SELECT * FROM shop WHERE id = $id");
								$articles = $req->fetch();
							}
							?>

							ilailailailai

											</div>
											</div>
											</div>



							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
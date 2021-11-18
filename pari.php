<?php include 'config.php'; ?>

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


				<h2>Pariez ici!</h2><hr>

				<?php

					$req = $db->query("SELECT * FROM matches WHERE id = 1");
					$match = $req->fetch();

					?>


				<h2>Match:</h2>
				<center><h2><?php echo $match['equipe_1'] ?> contre <?php echo $match['equipe_2'] ?> (commence à <?php echo $match['heure'] ?>h) </h2></center><br>
				<center><a href="mise.php?id=<?php echo $match['id']?>">Pariez ici!</a></center><hr>


					</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
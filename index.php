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
		<link rel="stylesheet" href="assets/css/animate.css" />
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

						<!-- Banner -->
							<section id="banner">
								<header>
									<h2 class="animated rollIn"><?php echo 'Bienvenue ' .$_SESSION['pseudo']. '!' ?></h2>
									<p>Bienvenue sur le site www.willydounga.com!</p>
								</header>
							</section>

						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="4u 12u(mobile)">
										<section class="first">
											<i class="icon featured fa-cog"></i>
											<header>
												<h2>Blog</h2>
											</header>
											<p>Ici, venez faire parts de vos opinions, idées ou même de vos questions.</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="middle">
											<i class="icon featured alt fa-flash"></i>
											<header>
												<h2>Tchat</h2>
											</header>
											<p>Ici, venez poser ou résoudre des questions en direct avec des centaines de personnes!</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="last">
											<i class="icon featured alt2 fa-star"></i>
											<header>
												<h2>Pas encore inscrit?</h2>
											</header>
											<p>Pour faire un article, poser un commentaire ou accéder au tchat, connectez vous <a href="register.php">ici</a>!</p>
										</section>
									</div>
								</div>
								<footer>
									<ul class="actions">
										<li><a href="register.php" class="button big">Commençez ici!</a></li>
										<li><a href="blog.php" class="button alt big">En savoir plus.</a></li>
									</ul>
								</footer>
							</section>

					</div>
				</div>
				</div>

	</body>

			<!-- Main -->
<?php include 'footer/footer.html' ?>

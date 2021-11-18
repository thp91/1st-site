<?php include 'config.php'; ?> 




<!DOCTYPE HTML>

<html>
	<head>
		<title>Blog</title>
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
							<h1><a href="blog.php" class="titre"><i>Blog</i></a></h1>
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li class="current"><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
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
									$v1 = $db->query("SELECT id, titre FROM articles");
									while($info_art = $v1->fetch(PDO::FETCH_BOTH)){
									if($v1){
									?>

									<body>
									<div class='row'>
										<?php 
									$v1 = $db->query("SELECT * FROM articles ORDER BY id LIMIT 0,10");
									if($v1){
										while($info_article = $v1->fetch(PDO::FETCH_BOTH)){

											$cnt = nl2br(htmlspecialchars($info_article['contenu']));

									?>

											<div class="6u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
													<header>
														<h2><?php echo $info_article['titre']; ?></h2>
														<p>par <?php echo $info_article['auteur']. ' le ' .$info_article['date']. ':'; ?></p>
													</header>
													<?php echo substr($cnt, 0, 200). ' ...'; ?>
													<footer>
														<ul class="actions">
															<li><a class="button icon fa-file-text" href="post_visiteur.php?id=<?php echo $info_article['id'] ?>">Lire la suite</a></li>
															<li><a class="button alt icon fa-comment" href="login.php">Poster un article</a></li>
														</ul>
													</footer>
												</section>
											</div>

									<?php }}}} ?>


										<?php

										if(isset($_SESSION['pseudo'])){

										$req3 = $db->query("SELECT points FROM membre WHERE pseudo = '".$_SESSION['pseudo']."'");
										$nb_points = mysqli_fetch_array($req3, MYSQLI_BOTH);


										$v1 = $db->query("SELECT * FROM articles ORDER BY id LIMIT 0,10");
										if($v1){
											while($info_article = mysqli_fetch_array($v1)){

										?>

											<div class="6u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
													<header>
														<h2><?php echo $info_article['titre']; ?></h2>
														 <p>par <?php echo $info_article['auteur']. ':'; ?></p>
													</header>
													<?php echo substr($cnt, 0, 200). ' ...'; ?>
													<footer>
														<ul class="actions">
															<li><a class="button icon fa-file-text" href="post.php?id=<?php echo $info_article['id'] ?>">Lire la suite</a></li>
															<li><a class="button alt icon fa-comment" href="login.php">Poster un article</a></li>
														</ul>
													</footer>
												</section>
											</div>

										<?php }}}else{} ?>
										</div>
										<br><center><a href="register.php" class="button icon fa-file-text">Poster un article?</a></center>

										
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
			<!-- Footer -->
<?php include 'footer/footer.html' ?>

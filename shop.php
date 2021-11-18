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
							<div class='row'>
												<?php

												$req2 = $db->query("SELECT * FROM shop ORDER BY id LIMIT 0,4");
												if($req2){
												while($donnee_art = $req2->fetch()){

												?>
												<div class="6u 12u(mobile)">
												<section class="box">
													<a href="#" class="image featured"><img src="shop\<?php echo $donnee_art['image'] ?>.jpg" alt="" /></a><hr>
													<header>
														<?php echo "<h2>" .$donnee_art['nom']. "</h2>" ?>
														<?php echo "<p>Vendeur: <a href='dxracer.com'>" .$donnee_art['vendeur']. "</a></p>" ?>
													</header>
													<footer>
														<ul class="actions">

															<?php

															echo 'Prix : ' .$donnee_art['prix']. '€ <br>';
															echo 'Dimensions : ' .$donnee_art['dim_1']. 'x' .$donnee_art['dim_2']. 'cm<br>';
															echo 'Materiaux : ' .$donnee_art['materiaux']. '<br>';
															
															?>


															<br><br>
															<form method="post" action="add_panier.php?id=<?php echo $donnee_art['id']; ?>">
															<input type="submit" name="acheter" value="Acheter!">
															</form>
														</ul>
													</footer>

												</section>
											</div>
											<?php }} ?>
											</div>
											</div>
											</div>



							</div>
				</div>
				</div>
				</body>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
</html>
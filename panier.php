<?php include 'config.php'; ?>

<?php

if(!isset($_SESSION['pseudo'])){
	header("Location: login.php");
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

<h2>Votre panier:</h2><br>

							<?php
							$pseudo = $_SESSION['pseudo'];

							$req = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
							$info_membre = $req->fetch();

							$id_actuel = $info_membre['id'];

							$req2 = $db->query("SELECT * FROM panier WHERE id_membre = '$id_actuel'");
							$info_panier = $req2->fetch();

							$nbr_produit = $db->prepare("SELECT id FROM panier WHERE id_membre = ? id_produit = ?");
							$nbr_produit->execute(array($id_actuel, ));
							$nbr_produit = $nbr_produit->rowCount();


							if(isset($info_panier['nom'])){

							echo "<b><i>Nom:</i></b> " .$info_panier['nom']. " <b><i>Prix:</i></b> " .$info_panier['prix'] * $nbr_produit. " <b><i>Vendeur:</i></b> " .$info_panier['vendeur']. " Quantité: " .$nbr_produit. "<br>";

							}else{
								echo "Votre panier est vide :(";
							}

							?>

							 <br>


				</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
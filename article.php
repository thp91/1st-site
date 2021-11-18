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
									<li class="current"><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="profile.php">Profile (<?php echo $_SESSION['pseudo']; ?>)</a></li>
									<li><a href="logout.php">Se déconnecter</a></li>
								</ul>
							</nav>
							</div>
							</div>

										<div id="main-wrapper">
					<div class="container">


<?php
if(!isset($_SESSION['pseudo'])){
	header('Location: login.php');
}
?>

<?php

if(isset($_POST['retour'])){
	header('Location: blog.php');
}

if(isset($_POST['valider'])){
	if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu']) ){
		$auteurS = $_SESSION['pseudo'];
		$titreS = $_POST['titre'];
		$contenuS = $_POST['contenu'];

		$db->query("INSERT INTO articles(id, titre, auteur, contenu, date) VALUES (NULL, '".$titreS."', '".$auteurS."', '".$contenuS."', NOW())");

		header('Location: blog.php');
	}else{
		echo 'Veuillez remplire tout les champs!';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Poster un article</title>
</head>
<body>
<form action="" method="post">
	Titre: <input type="text" name="titre" value="<?php if(isset($_POST['titre'])) { echo $_POST['titre']; } ?>"><br><br>
	Contenu: <textarea name="contenu" ><?php if(isset($_POST['contenu'])) { echo $_POST['contenu']; } ?></textarea><br><br>
	<input type="submit" name="valider" value="Valider"> <input type="submit" name="retour" value="Retour">
</form>
</form>
</body>
</html>

	</div>
	</div>

<?php include 'footer/footer.html' ?>
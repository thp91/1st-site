<?php include 'config.php'; ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Se connecter</title>
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
							<h1><a href="login.php" class="titre"><i>Se connecter</i></a></h1>
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li class="current"><a href="login.php">Se connecter</a></li>
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
if(isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

if(isset($_POST['valider'])){
	if(isset($_POST['pseudo'], $_POST['mdp']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
		$pseudo = $_POST['pseudo'];
		$mdp = md5($_POST['mdp']);

		$req1 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
		$info_membre = $req1->fetch(PDO::FETCH_BOTH);

		if(isset($info_membre['pseudo'])){

		if($mdp == $info_membre['motdepasse']){
			$_SESSION['pseudo'] = $pseudo;
			$succes = header('Location: index.php');
			}else{
				$erreur = 'Mot de passe incorrect!';
			}
			}else{
				$erreur = 'Pseudo incorrect!';
			}
			}else{
				$erreur = 'Vous devez remplire tout les champs!';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Connexion</title>
</head>
<body>
<?php 
if(isset($erreur)){
	echo '<h3><center><a style="color:red">ERREUR: ' .$erreur. '</a></center></h3><hr>';
}
if(isset($succes)){
	echo '<h3><center><a style="color:green">' .$succes. '</a></center></h3><hr>';
}
?>
<form action="login.php" method="post">
	Votre pseudo:<input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])){echo $_POST['pseudo'];} ?>"><br>
	Votre mot de passe:<input type="password" name="mdp" value="<?php if(isset($_POST['mdp'])){echo $_POST['mdp'];} ?>"><br>
	<input type="submit" name="valider" value="Se connecter">
</form>
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
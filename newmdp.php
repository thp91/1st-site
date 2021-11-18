<?php include 'config.php'; ?>

<?php

$pseudo = $_SESSION['pseudo'];

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

?>

<?php 

									$req1 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
									$info_membre = $req1->fetch(PDO::FETCH_BOTH);
									$id = $info_membre['id'];

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
									<li><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="logout.php">Se déconnecter (<?php echo $_SESSION['pseudo']; ?>)</a></li>
								</ul>
							</nav>
							<hr>

							<?php

							if(isset($_POST['valider'])){
								if(isset($_POST['mdp'], $_POST['newmdp']) && !empty($_POST['mdp']) && !empty($_POST['newmdp'])){
									$mdp = md5($_POST['mdp']);
									if($mdp == $info_membre['motdepasse']){
									$newmdp = md5($_POST['newmdp']);
									$update_mdp = $db->prepare("UPDATE membre SET motdepasse = ? WHERE id = ?");
									$update_mdp->execute(array($newmdp, $id));
									session_destroy();
									header('Location: login.php');
										}else{
											echo 'Mot de passe actuel incorrect';
									}
								}else{
									echo 'Veillez remplire tout les champs';
								}
							}
							?>


							<form action="newmdp.php" method="post">
							Votre mot de passe actuel:<input type="text" name="mdp" ?><br>
							Votre nouveau mot de passe:<input type="text" name="newmdp" ?><br>
							<input type="submit" name="valider" value="valider">


							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
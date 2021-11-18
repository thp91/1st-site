<?php include 'config.php'; ?>

<?php

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

?>

<?php 

							$pseudo = $_SESSION['pseudo'];
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
								if (isset($_POST['newpseudo'])){
									if(!empty($_POST['newpseudo'])){
									$newpseudo = $_POST['newpseudo'];

									$req3 = $db->query("SELECT pseudo FROM membre WHERE pseudo = '$newpseudo'");
									$info_membre2 = $req3->fetch(PDO::FETCH_BOTH);
									$pseudo2 = $info_membre2['pseudo'];

									$longeur_pseudo = strlen($newpseudo);
									if($longeur_pseudo <= 25){
										if($longeur_pseudo >= 5){
											if(!isset($pseudo2)){
									$update_pseudo = $db->prepare("UPDATE membre SET pseudo = ? WHERE id = ?");
									$update_pseudo->execute(array($newpseudo, $id));
									session_destroy();
									header('Location: login.php');
												}else{
													echo 'Ce pseudo existe déja!';
												}
											}else{
												echo 'Le pseudo est trop court! (min: 5)';
											}
										}else{
											echo 'Le pseudo est trop long! (max: 25)';
										}
									}else{
										echo 'Veillez remplire tout les champs!';
									}
								}
							}
							?>

							<form action="newpseudo.php" method="post">
							Votre nouveau pseudo:<input type="text" name="newpseudo" ?><br>
							<input type="submit" name="valider" value="valider">


							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
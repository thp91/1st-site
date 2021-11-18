<?php include 'config.php'; ?>

<?php
							$pseudo = $_SESSION['pseudo'];
							$req1 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
							$info_membre = $req1->fetch(PDO::FETCH_BOTH);
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
									<li><a href="profile.php">Profile (<?php echo $_SESSION['pseudo']; ?>)</a></li>
									<li><a href="logout.php">Se déconnecter</a></li>
								</ul>
							</nav>
							<hr>

							<?php

							if($info_membre['admin'] == 0){
								header('Location: index.php');
							}
							?>

							<?php

							?>

							<?php

							$req1 = $db->query("SELECT * FROM membre");
							while($donnees = $req1->fetch(PDO::FETCH_BOTH)){
							if($req1){
								if($donnees['ban'] == 0 && $donnees['admin'] == 0){
							echo 'Bannir: <a href="ban.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Mettre admin: <a href="madmin.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Supprimer le compte: <a href="delcompte.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a><br>";

						}elseif($donnees['ban'] == 1 && $donnees['admin'] == 1){

							echo 'De bannir: <a href="unban.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'De op: <a href="unmadmin.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Supprimer le compte: <a href="delcompte.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a><br>";

						} elseif($donnees['ban'] == 0 && $donnees['admin'] == 1){

							echo 'Bannir: <a href="ban.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'De op: <a href="unmadmin.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Supprimer le compte: <a href="delcompte.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a><br>";

						} elseif($donnees['ban'] == 1 && $donnees['admin'] == 0){

							echo 'De bannir: <a href="unban.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Mettre admin: <a href="madmin.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a> / ";
							echo 'Supprimer le compte: <a href="delcompte.php?id='.$donnees["id"].'">' .$donnees['pseudo']. "</a><br>";

						}
						}
					}

					?>


							</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
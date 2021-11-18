<?php include 'config.php'; ?>

<?php

if(!isset($_GET['id'])){
	header('Location: index.php');
}

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
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
									<li><a href="index.php">Accueil</a></li>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="logout.php">Se déconnecter (<?php echo $_SESSION['pseudo']; ?>)</a></li>
								</ul>
							</nav>
							<hr>

					<?php

					$req = $db->query("SELECT * FROM matches ORDER BY id LIMIT 0,10");
					$match = $req->fetch();

					?>

					<?php
					if(isset($_POST['valider'])){
					if(isset($_POST['mise']) && !empty($_POST['mise'])){

						$id_match = $_GET['id'];

						$pseudo = $_SESSION['pseudo'];

						$req2 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
						$pseudo = $req2->fetch();



						$mise = $_POST['mise'];
						$pseudo_id = $pseudo['id'];
						$req_modif = $db->prepare("UPDATE matches SET mise = ?, id_membre = ? WHERE id = ?");
						$req_modif->execute(array($mise, $pseudo_id , $id_match));
						
						?>

						<script type="text/javascript">
							alert('Vous avez pariez <?php echo $mise ;?>€');
						</script>

						<?php
						
					}else{
						?>

						<script type="text/javascript">
							alert('ERREUR');
						</script>

						<?php
					}}

					?>

					<form action="" method="post">
					<center><h2>Mise pour le match <?php echo $match['equipe_1']; ?> - <?php echo $match['equipe_2']; ?></h2></center><hr>
					miser: <input type="text" name="mise">€ <br><br><br>
					<input type="submit" name="valider" value="Miser!">
					</form>


					</div>
				</div>

			<!-- Main -->
<?php include 'footer/footer.html' ?>
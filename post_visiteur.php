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
							<h1><a href="index.php" class="titre"><i>Post</i></a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Accueil</a></li>
									<li class='current'><a href="blog.php">Blog</a></li>
									<li><a href="tchat.php">Tchat</a></li>
									<li><a href="email.php">Me contacter</a></li>
									<li><a href="login.php">Se connecter</a></li>
									<li><a href="register.php">S'inscrire</a></li>
									<br><br>
									<li class="current"><a href="post.php">Post</a></li>
								</ul>
							</nav>
							</div>
							</div>

										<div id="main-wrapper">
					<div class="container">




							<?php
if(!isset($_GET['id'])){
	header('Location: index.php');
}else{
	$get_id = intval($_GET['id']);
}

$v1 = $db->query("SELECT * FROM articles WHERE id='".$get_id."'");
if($v1){
$info_article = $v1->fetch(PDO::FETCH_BOTH);
if(isset($info_article['id'])){
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Blog</title>
</head>
<body>
<center><h1><font size="32"><?php echo htmlspecialchars($info_article['titre']); ?></font></h1><hr></center><h5> par <?php echo $info_article['auteur']. ' le ' .$info_article['date']; ?>.</h5><br>
 <fieldset><?php echo nl2br(htmlspecialchars($info_article['contenu'])); ?></fieldset><br>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="" />
</head>
<body>
</body>
</html>

<form action="register.php" method="post">
<input type="submit" name="envoyer" value="Ecrir un commentaire?"><hr>
</form>

<?php
$v2 = $db->query("SELECT * FROM commentaires WHERE id_article = '".$info_article['id']."' ORDER BY id LIMIT 0,10");
if($v2){
	while($info_com = $v2->fetch(PDO::FETCH_BOTH)){
?>

<center><b><?php echo 'Par ' .$info_com['auteur'] . ' le ' .$info_com['date'] ; ?></b>:</center>
<fieldset><legend>Commentaire</legend><?php echo nl2br(htmlspecialchars($info_com['contenu'])); ?></fieldset><br><hr>

<?php }}}else 
header('Location: index.php');
?>
<?php } ?>





							</div>
						</div>
					</div>




<!-- Footer -->
<?php include 'footer/footer.html' ?>
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
									<li><a href="profile.php">Profile (<?php echo $_SESSION['pseudo']; ?>)</a></li>
									<li><a href="logout.php">Se déconnecter</a></li>
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

									if($_SESSION['pseudo'] == 'WillyDounga'){

									$req3 = $db->query("SELECT points FROM membre WHERE pseudo = '".$_SESSION['pseudo']."'");
									$nb_points = $req3->fetch(PDO::FETCH_BOTH);


									?>

									<?php
									$v1 = $db->query("SELECT id, titre FROM articles");
									$info_art = $v1->fetch();
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

														<?php
														$id_art = $info_article['id'];

														$like = $db->prepare("SELECT id FROM likes WHERE id_article = ?");
														$like->execute(array($id_art));
														$like = $like->rowCount();

														$dislike = $db->prepare("SELECT id FROM dislikes WHERE id_article = ?");
														$dislike->execute(array($id_art));
														$dislike = $dislike->rowCount();

														?>
															
														<a href="like.php?id=<?php echo $info_article['id']?>">Like</a><?php echo " (" .$like. ")"; ?><br>
														<a href="dislike.php?id=<?php echo $info_article['id']?>">Dislike</a><?php echo " (" .$dislike. ")"; ?><br><br>


															<li><a class="button icon fa-file-text" href="post.php?id=<?php echo $info_article['id'] ?>">Lire la suite</a></li>
															<li><a class="button alt icon fa-comment" href="article.php">Poster un article</a></li>
														</ul>
													</footer>


													<a href="delart.php?id=<?php echo $info_article['id']; ?>">Supprimer</a><br>

												</section>
											</div>

									<?php }}}else{ ?>


										<?php

										if(isset($_SESSION['pseudo'])){

										$req3 = $db->query("SELECT points FROM membre WHERE pseudo = '".$_SESSION['pseudo']."'");
										$nb_points = $req3->fetch(PDO::FETCH_BOTH);
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

														<?php

														$id_art = $info_article['id'];

														$like = $db->prepare("SELECT id FROM likes WHERE id_article = ?");
														$like->execute(array($id_art));
														$like = $like->rowCount();

														$dislike = $db->prepare("SELECT id FROM dislikes WHERE id_article = ?");
														$dislike->execute(array($id_art));
														$dislike = $dislike->rowCount();

														?>

														<a href="like.php?id=<?php echo $info_article['id']?>">Like</a><?php echo " (" .$like. ")"; ?><br>
														<a href="dislike.php?id=<?php echo $info_article['id']?>">Dislike</a><?php echo " (" .$dislike. ")"; ?><br><br>

															<li><a class="button icon fa-file-text" href="post.php?id=<?php echo $info_article['id'] ?>">Lire la suite</a></li>
															<li><a class="button alt icon fa-comment" href="article.php">Poster un article</a></li>
														</ul>
													</footer>
													<?php
													$art_id = $info_article['id'];
													$reqq = $db->query("SELECT * FROM articles WHERE id = '$art_id'");
													$pseudo = $reqq->fetch();
													if($_SESSION['pseudo'] == $pseudo['auteur']){
													?>
													<a href="delart.php?id=<?php echo $info_article['id']; ?>">Supprimer</a><br>
													<?php } ?>
												</section>
											</div>


										<?php }}}else{ header('Location: blog_visiteur.php'); }} ?>
										</div>

										<br><center><a href="article.php" class="button icon fa-file-text">Poster un article?</a></center>


										
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
			<!-- Footer -->
<?php include 'footer/footer.html' ?>

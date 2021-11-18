<?php include 'config.php'; ?>
<?php
															
															$id_art = $_GET['id'];

															$req3 = $db->query("SELECT * FROM shop WHERE id = '$id_art'");
															$donnee_arts = $req3->fetch();

															 $name = $donnee_arts['nom'];
															 $prix = $donnee_arts['prix'];
															 $vendeur = $donnee_arts['vendeur'];
															 $id_produit = $donnee_arts['id'];

															 $pseudo = $_SESSION['pseudo'];
															 $req4 = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
															 $info_membre = $req4->fetch();

															 $id_membre = $info_membre['id'];

																$db->query("INSERT INTO panier(id, nom, prix, vendeur, id_membre, id_produit) VALUES (NULL, '$name', '$prix', '$vendeur', '$id_membre', '$id_produit')");
																header("Location: shop.php");

															?>
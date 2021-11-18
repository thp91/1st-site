<?php include 'config.php'; ?> 

<?php
$id_article = $_GET['id'];
$req = $db->query("SELECT * FROM articles WHERE id = '$id_article'");
$art = $req->fetch();
if($_SESSION['pseudo'] == $art['auteur']){
	$db->query("DELETE FROM articles WHERE id = '$id_article'");
	header('Location: blog.php');
}else{
	header('Location: blog.php');
}

?>
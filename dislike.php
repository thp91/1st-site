<?php include 'config.php'; ?>
<?php
$id_article = $_GET['id'];
$session = $_SESSION['pseudo'];

$req2 = $db->query("SELECT * FROM dislikes WHERE membre = '$session'");
$pseudo_dislike = $req2->fetch();

$req = $db->query("SELECT * FROM dislikes WHERE membre = '$session' AND id_article = '$id_article'");
$pseudo_dislikes = $req->fetch();

$req3 = $db->query("SELECT * FROM likes WHERE membre = '$session'");
$pseudo_like = $req2->fetch();

if($pseudo_dislikes['membre'] == $pseudo_like['membre']){
	$db->query("DELETE FROM likes WHERE membre = '$session' AND id_article = '$id_article'");
}

if($pseudo_dislikes['membre'] == $session){
	$db->query("DELETE FROM dislikes WHERE membre = '$session' AND id_article = '$id_article'");
	header('Location: blog.php');
}else{

	$db->query("INSERT INTO dislikes(id, id_article, membre) VALUES (NULL, '$id_article', '$session')");
	header('Location: blog.php');
}

?>
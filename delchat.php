<?php include 'config.php'; ?>

<?php if(!isset($_GET['id'])); header('Location: tchat.php'); ?>
<?php if(!isset($_SESSION['pseudo'])); header('Location: tchat.php'); ?>

<?php
$id = $_GET['id'];
$membre = $_SESSION['pseudo'];
$req = $db->query("SELECT * FROM tchat WHERE id = '$id'");
$membre_chat = $req->fetch();

if($membre == 'WillyDounga'){
	$db->query("DELETE FROM tchat WHERE id = '$id'");
	header('Location: tchat.php');
}else{

if($membre_chat['auteur'] == $membre){
$db->query("DELETE FROM tchat WHERE id = '$id'");
header('Location: tchat.php');
}else{
header('Location: tchat.php');	
}
}

?>
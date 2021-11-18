<?php include 'config.php'; ?>

<?php

$pseudo = $_SESSION['pseudo'];

$req2 = $db->query("SELECT admin, ban FROM membre WHERE pseudo = '$pseudo'");
$admin = $req2->fetch();

if(!isset($_GET['id'])){
	header('Location: index.php');
}

if($admin['admin'] == 0){
	header('Location: index.php');
}

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
}

?>

<?php

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$ban = $db->prepare('UPDATE membre SET admin = ? WHERE id = ?');
	$ban->execute(array(1, $id));
	header('Location: admin.php');
}else{
	header('Location: index.php');
}

?>
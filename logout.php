<?php include ('config.php');

if(!isset($_SESSION['pseudo'])){
	header('Location: index.php');
}else{

session_destroy();
header('Location: index_visiteur.php');

}
?>
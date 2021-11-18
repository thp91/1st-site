<?php include 'config.php'; ?>

<?php

							$pseudo = $_SESSION['pseudo'];

							$id_req = $db->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
							$id_fetch = $id_req->fetch();
							$id = $id_fetch['id'];

							$delete = $db->prepare("DELETE FROM membre WHERE id = ?");
							$delete->execute(array($id));
							session_destroy();
							header('Location: index.php');

							?>

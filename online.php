							<?php

							$temp_session = 60;
							$temp_actuel = date("U");
							$ip_user = $_SERVER['REMOTE_ADDR'];

							$req_ip_exist = $db->prepare('SELECT * FROM online WHERE ip_user = ?');
							$req_ip_exist->execute(array($ip_user));
							$ip_exist = $req_ip_exist->rowCount();

							if($ip_exist == 0){
								$add_ip = $db->prepare('INSERT INTO online VALUES(?,?)');
								$add_ip ->execute(array($ip_user,$temp_actuel));
							}else{
								$update_ip = $db->prepare('UPDATE online SET time = ? WHERE ip_user = ?');
								$update_ip->execute(array($temp_actuel, $ip_user));
							}

							$session_delete_time = $temp_actuel - $temp_session;

							$delete_ip = $db->prepare('DELETE FROM online WHERE time < ?');
							$delete_ip->execute(array($session_delete_time));

							$show_user_number = $db->query('SELECT * FROM online');
							$user_number = $show_user_number->rowCount();

							echo $temp_actuel;

							?>
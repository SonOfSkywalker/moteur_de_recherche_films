<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$host_name = '...';
$database = '...';
$user_name = '...';
$password = '...';


$link = new mysqli($host_name, $user_name, $password, $database);

if ($link->connect_error) {
  die('<p>La connexion au serveur MySQL a échoué: '. $link->connect_error .'</p>');
} else {

}



?>

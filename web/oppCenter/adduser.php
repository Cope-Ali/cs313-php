<?php

include("accessDB.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);


$PDO = $db->prepare("INSERT INTO user_table (username, password) VALUES ('$_POST[username]', '$hashed')");
$PDO->execute();

header("Location: signin.php");
die();
?>

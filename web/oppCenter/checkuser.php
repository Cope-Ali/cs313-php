<?php
session_start();
include("accessDB.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$PDO = $db->prepare("SELECT password from user_table WHERE username = '$_POST[username]'");
$PDO->execute();
$result = $PDO->fetchAll(PDO::FETCH_ASSOC);

if(password_verify($_POST['password'], $result[0]['password']) ) {
    $_SESSION['userAuthorized'] = $_POST['username'];
    $_SESSION['user_id'] = $result[0]['user_id'];
    header("Location: home.php");
}
else {
    session_destroy();
    header("Location: signin.php?error=true");
}
?>

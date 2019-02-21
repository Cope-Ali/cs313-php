<?php
//start session to store credentials
session_start();
include("accessDB.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <?php include("header.php");?>
    
    <link rel="stylesheet" href="oppStyle.css">
</head>
<body>

<?php include("nav.php");?>

<div class="container" >
<h2> Please enter your new username and password </h2>
<form action="adduser.php" method="post">
    <input name="username" placeholder="Username">
    <input name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>
</body>
</html>
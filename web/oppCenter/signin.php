<?php
include("accessDB.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>

<a href="signup.php">Sign up now!</a> <br>

<?php
    if($_GET['error'] == "true") {
        echo "<h1> Please try again, Wrong password or username</h1>";
    }
?>

<form action="checkuser.php" method="post">
    <input name="username" placeholder="Username">
    <input name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>
</body>
</html>
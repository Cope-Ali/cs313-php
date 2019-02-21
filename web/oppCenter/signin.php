<?php
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
<h1> Please sign in: </h1>


<?php
    if($_GET['error'] == "true") {
        echo "<h2 style='color:red;'> Please try again, Wrong password or username</h2>";
    }
?>

<form action="checkuser.php" method="post">
    <input name="username" placeholder="Username">
    <input name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>
<h2>New to the site? </h2>
<a href="signup.php">Sign up now!</a> <br>
</body>
</html>
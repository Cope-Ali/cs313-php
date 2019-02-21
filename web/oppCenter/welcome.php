<?php
    session_start();
    if(!isset($_SESSION['userAuthorized'])) {
        session_destroy();
        header("Location: signin.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['userAuthorized']; ?></h1>
</body>
</html>

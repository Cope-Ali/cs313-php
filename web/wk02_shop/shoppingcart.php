<?php
session_start();
echo "Shopping Cart";
if(isset($_SESSION['userName'])){
}

function delete($i)
{
  unset($_SESSION['cart'][$i]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("shop_head.php");?>
    <link rel="stylesheet" href="shoppingStyle.css">
</head>
<body>

<?php include("shop_nav.php");?>


<?php
if($_SESSION['frau']=='true')
{
    echo '<p> Frau Flufferbutt </p>';
   echo  '<img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">';
   echo ' <button type="button" onclick="$_SESSION["frau"]="false""> Delete From Cart </button>';
}

if($_SESSION['princess']=='true')
{
    echo '<p> Princess Snow White </p>
    <img src="images/snow_white.jpg" alt="Very fluffy small black and white chicken" height="50">
    <button type="button" onclick="$_SESSION["princess"]="false""> Delete From Cart </button>';
}

if($_SESSION['houdini']=='true')
{
    echo '<p> Houdini </p>
    <img src="images/houdini.jpg" alt="Very fluffy small black and white chicken" height="50">
    <button type="button" onclick="$_SESSION["houdini"]="false""> Delete From Cart </button>';
}

if($_SESSION['roxi']=='true')
{
    echo '<p> Roxi </p>
    <img src="images/roxi.jpg" alt="Very fluffy small black and white chicken" height="50">
    <button type="button" onclick="$_SESSION["roxi"]="false""> Delete From Cart </button>';
}
?>
</body>
</html>
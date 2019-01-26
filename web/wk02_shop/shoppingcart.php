<?php
session_start();
print_r($_SESSION);
echo "Shopping Cart";
if(isset($_SESSION['userName'])){
if(!isset($frau_qty)){
$frau_qty=0;
echo $frau_qty;
}
if(!isset($snow_qty)){
$snow_qty=0;
echo $snow_qty;
}
if(!isset($houdini_qty)){
$houdini_qty =0;
}
if(!isset($roxi_qty)){
$roxi_qty = 0;
echo $roxi_qty;
}

if(count($_SESSION["cart"]) > 0){
foreach ($_SESSION["cart"] as $key => $value) {
    switch($value) {
        case "frau":
            $frau_qty++;
            $value = "";
            break;
        case "snow":
            $snow_qty++;
            $value = "";
            break;
        case "houdini":
            $houdini_qty++;
            $value = "";
            break;
        case "roxi":
            $roxi_qty++;
            $value = "";
            break;
        case "":
            break;
    }
}
$_SESSION["cart"] = array();
}

echo $frau_qty;
echo $snow_qty;
echo $houdini_qty;
echo $roxi_qty;

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

<!-- <form action="checkout.php" method="post"> -->
<?php
if($frau_qty>0)
{
    echo '<form action="shoppingcart.php" method="post">';
    echo '<p> Frau Flufferbutt </p>';
   echo  '<img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">';
  echo 'Total in Cart :' . $frau_qty . '<br>';
   echo '  Quantity: <input type = "number" name="frau" value='.$frau_qty.' >
   <input type="submit" value="Update Cart"> </form><br><br>';
}

if($snow_qty>0)
{
    echo '<form action="shoppingcart.php" method="post">';
    echo '<p> Princess Snow White </p>
    <img src="images/snow_white.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $snow_qty . '<br>';
    echo '  Quantity: <input type = "number" name="snow" value='.$snow_qty.' >
   <input type="submit" value="Update Cart"> <br><br>';
}

if($houdini_qty>0)
{
    echo '<form action="shoppingcart.php" method="post">';
    echo '<p> Houdini </p>
    <img src="images/houdini.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $houdini_qty . '<br>';
    echo '  Quantity: <input type = "number" name="houdini" value='.$houdini_qty.' >
    <input type="submit" value="Update Cart"> <br><br>';
}

if($roxi_qty>0)
{
    echo '<form action="shoppingcart.php" method="post">';
    echo '<p> Roxi </p>
    <img src="images/roxi.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $roxi_qty . '<br>';
    echo '  Quantity: <input type = "number" name="roxi" value='.$roxi_qty.' >
   <input type="submit" value="Update Cart"> <br><br>';
}
?>
<!-- </form> -->
</body>
</html>
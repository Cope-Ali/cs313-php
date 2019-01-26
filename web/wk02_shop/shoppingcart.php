<?php
session_start();
print_r($_SESSION);
echo "Shopping Cart";
if(isset($_SESSION['userName'])){

$frau_qty=0;
echo $frau_qty;
$snow_qty=0;
echo $snow_qty;
$houdini_qty = 0;
echo $houdini_qty;
$roxi_qty = 0;
echo $roxi_qty;

foreach ($_SESSION["cart"] as $key => $value) {
    switch($value) {
        case "frau":
            $frau_qty++;
            break;
        case "snow":
            $snow_qty++;
            break;
        case "houdini":
            $houdini_qty++;
            break;
        case "roxi":
            $roxi_qty++;
            break;
    }
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


<?php
if($frau_qty>0)
{
    echo '<p> Frau Flufferbutt </p>';
   echo  '<img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">';
  echo 'Total in Cart :' . $frau_qty . '<br>';
   echo ' <button type="button" onclick="$_SESSION["frau"]="false""> Delete From Cart </button>';
}

if($snow_qty>0)
{
    echo '<p> Princess Snow White </p>
    <img src="images/snow_white.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $snow_qty . '<br>';
    echo '<button type="button" onclick="$_SESSION["princess"]="false""> Delete From Cart </button>';
}

if($houdini_qty>0)
{
    echo '<p> Houdini </p>
    <img src="images/houdini.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $houdini_qty . '<br>';
    echo '<button type="button" onclick="$_SESSION["houdini"]="false""> Delete From Cart </button>';
}

if($roxi_qty>0)
{
    echo '<p> Roxi </p>
    <img src="images/roxi.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $roxi_qty . '<br>';
    echo '<button type="button" onclick="$_SESSION["roxi"]="false""> Delete From Cart </button>';
}
?>
</body>
</html>
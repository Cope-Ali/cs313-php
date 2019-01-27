<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <?php include("shop_head.php");?>
    <link rel="stylesheet" href="shoppingStyle.css">
</head>
<body>

<?php include("shop_nav.php");?>

<h2> Cart Contents </h2>
<?php
if($_POST['frau']>0)
{
    
    echo '<p> Frau Flufferbutt </p>';
   echo  '<img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">';
  echo 'Total in Cart :' . $_POST['frau'] . '<br><br>';
    for($i=0; $i<$_POST["frau"]; $i++){
    array_push($_SESSION["cart"], "frau");
    }

}

if($_POST['snow']>0)
{
    
    echo '<p> Princess Snow White </p>
    <img src="images/snow_white.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $_POST['snow'] . '<br><br>';
    for($i=0; $i<$_POST["snow"]; $i++){
        array_push($_SESSION["cart"], "snow");
        }

}

if($_POST['houdini']>0)
{
    
    echo '<p> Houdini </p>
    <img src="images/houdini.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $_POST['houdini']. '<br><br>';
    for($i=0; $i<$_POST["houdini"]; $i++){
        array_push($_SESSION["cart"], "houdini");
        }
    
}

if($_POST['roxi']>0)
{
    
    echo '<p> Roxi </p>
    <img src="images/roxi.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total in Cart :' . $_POST['roxi'] . '<br><br>';
    for($i=0; $i<$_POST["roxi"]; $i++){
        array_push($_SESSION["cart"], "roxi");
        }
   
}
?>
<br>
<br>
<hr>
<form action="orderConfirmation.php" method="post">
    <input type="text" name="Name" placeholder="Name"> <br>
    <input type="text" name="Email" placeholder="Email"> <br>
    <input type="text" name="Street" placeholder="Street"> <br>
    <input type="text" name="City" placeholder="City"> <br>
    <input type="text" name="State" placeholder="State"> <br>
    <input type="text" name="ZipCode" placeholder="Zip Code"> <br>
    <button type="submit">Submit</button>
</form>
<button type="button" onclick="shoppingcart.php"> Return to Cart </button>


</body>
</html>

<?php
//start session to store cart
session_start();
print_r($_SESSION);
if(!isset($_SESSION['userName'])){

$_SESSION['userName'] = 'user';
$_SESSION['cart'] = array();
}

echo $_POST["frau"];
if($_POST["frau"] > 0){
    echo "Frau more than one";
    array_push($_SESSION["cart"], "frau");
}

echo $_POST["snow"];
if($_POST["snow"] > 0){
    echo "snow more than one";
    array_push($_SESSION["cart"], "snow");
}

echo $_POST["houdini"];
if($_POST["houdini"] > 0){
    echo "houdini more than one";
    array_push($_SESSION["cart"], "houdini");
}

echo $_POST["roxi"];
if($_POST["roxi"] > 0){
    echo "roxi more than one";
    array_push($_SESSION["cart"], "roxi");
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

<div class="container" id="intro">
	<h2>Available Chickens</h2>
	<p>Here are our currently available chickens. Please check back often as our stock is frequently changing due to my addiction to buying baby chicks everytime I am at the feed store.</p>
</div>
<form action="browse.php" method="post">
<div class="item" id="fluffer">
    <h3> Frau Flufferbutt </h3>
    <img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="150">
    <p> Frau Flufferbutt may look small and dainty, but she can hold her own. She keeps all the little chicks in line and doesn't take anything from the full size birds either. As a cochin bird, her small stature is full size and she will lay dainty, mini green eggs. You can never go wrong watching her little waddly run as she races around the yard.  </p>
   Quantity: <input type = "number" name="frau" value="0" >
   <input type="submit" value="Add to Cart">
</div>

<div class="item" id="princess"> 
    <h3> Princess Snow White </h3>
    <img src="images/snow_white.jpg" alt="Large White Chicken with a few black tipped feathers" height="150">
    <p> Most treasured chicken of all time. Princess Snow White is gentle enough to let even the smallest of determined children pick her up. Yet she is fiesty enough to claim the "best" spot on the nighly perch. She keeps all other chickens in line and is truely the leader of the flock. She keeps a watchful eye out for any humans who may be coming to offer sunflower seeds or yesterday's leftovers. </p>
    Quantity: <input type = "number" name="snow" value="0" >
   <input type="submit" value="Add to Cart">
</div>

<div class="item" id="houdini">
    <h3> Houdini </h3>
    <img src="images/houdini.jpg" alt="Mostly white chicken with tan markings" height="150">
    <p> Magical Escaping Chicken! She can get out of any enclosure! She will dig under it, she will fly over it. No nets will stop her she just breaks on through! She will lay brown eggs, but you will probably never find them due to her magical prowess! </p>
    Quantity: <input type = "number" name="houdini" value="0" >
   <input type="submit" value="Add to Cart">
</div>

<div class="item" id="Roxi">
    <h3> Roxi </h3>
    <img src="images/roxi.jpg" alt="skinny white chicken" height="150">
    <p> Dumber than a box of rocks. Roxi will likely kill herself trying to get THROUGH the fence instead of walking through the open gate just a few inches away. Proof that survival of the fittest, sometimes makes mistakes. She should lay white eggs, assuming normal biological functions are not beyond her limited capabilities. </p>
    Quantity: <input type = "number" name="roxi" value="0" >
   <input type="submit" value="Add to Cart">
</div>
</form>
<div class="checkout">
<a href="shoppingcart.php">Checkout Here</a>

</div>

<?php include("shop_footer.php");?>

</body>
</html>
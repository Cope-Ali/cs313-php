
<?php
//start session to store cart
session_start();
$_SESSION['userName'] = 'user';
$_SESSION['cart'] = array('test');

function addCart($item){
array_push($_SESSION["cart"], $item);
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
	<p>Here are our currently available chickens. Please check back often as our stock is frequently changing due to my addiction to buying baby chicks everytime I'm at the feed store.</p>
</div>
<div class="item" id="fluffer">
    <h3> Frau Flufferbutt </h3>
    <img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="150">
    <p> Frau Flufferbutt may look small and dainty, but she can hold her own. She keeps all the little chicks in line and doesn't take anything from the full size birds either. As a cochin bird, her small stature is full size and she will lay dainty, mini green eggs. You can never go wrong watching her little waddly run as she races around the yard.  </p>
    <button type="button" onclick="<?php addCart("Frau Flufferbutt") ?>"> Add to Cart </button>
</div>

<div class="item" id="princess"> 
    <h3> Princess Snow White </h3>
    <img src="images/snow_white.jpg" alt="Large White Chicken with a few black tipped feathers" height="150">
    <p> Most treasured chicken of all time. Princess Snow White is gentle enough to let even the smallest of determined children pick her up. Yet she is fiesty enough to claim the "best" spot on the nighly perch. She keeps all other chickens in line and is truely the leader of the flock. She keeps a watchful eye out for any humans who may be coming to offer sunflower seeds or yesterday's leftovers. </p>
    <button type="button" onclick="<?php addCart('Princess Snow White') ?>"> Add to Cart </button>
</div>

<div class="item" id="houdini">
    <h3> Houdini </h3>
    <img src="images/houdini.jpg" alt="Mostly white chicken with tan markings" height="150">
    <p> Magical Escaping Chicken! She can get out of any enclosure! She will dig under it, she will fly over it. No nets will stop her she just breaks on through! She will lay brown eggs, but you will probably never find them due to her magical prowess! </p>
    <button type="button" onclick="<?php addCart('Houdini') ?>"> Add to Cart </button>
</div>

<div class="item" id="Roxi">
    <h3> Roxi </h3>
    <img src="images/roxi.jpg" alt="skinny white chicken" height="150">
    <p> Dumber than a box of rocks. Roxi will likely kill herself trying to get THROUGH the fence instead of walking through the open gate just a few inches away. Proof that survival of the fittest, sometimes makes mistakes. She should lay white eggs, assuming normal biological functions are not beyond her limited capabilities. </p>
    <button type="button" onclick="<?php addCart('Roxi') ?>"> Add to Cart </button>
</div>
<div class="checkout">
<a href="shoppingcart.php">Checkout Here</a>

</div>

<?php include("shop_footer.php");?>

</body>
</html>
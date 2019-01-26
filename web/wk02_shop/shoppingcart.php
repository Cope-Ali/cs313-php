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

<!-- <?php
for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo '<div class="item" id="$i">';
    echo '<p>';
    echo $_SESSION['cart'][$i] . '<br>';
    echo '<button type="button" onclick="<?php delete($i) ?>"> Delete From Cart </button>';
    echo '</p> </div>';
    
}
?> -->
<?php
if($_SESSION['frau'] = 'true')
{
    echo '<p> Frau Flufferbutt </p>
    <img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">
    <button type="button" onclick="delete()"> Delete From Cart </button>';
}
?>
</body>
</html>
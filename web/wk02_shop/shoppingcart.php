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
for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo '<div class="item" id="$i">';
    echo '<p>';
    echo $_SESSION['cart'][$i] . '<br>';
    echo '<button type="button" onclick="<?php delete($i) ?>"> Delete From Cart </button>';
    echo '</p>';
}
?>

</body>
</html>
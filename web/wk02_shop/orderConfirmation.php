<?php
session_start();
echo "Order Confirmation";
if(isset($_SESSION['userName'])){
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


<h2> Thank you for your order! </h2>

<h3> Customer Information </h3>
<?php
for ($i = 0; $i < count($_SESSION['customer']); $i++){
echo $_SESSION['customer'][$i] . '<br';
}
?>

<h3> Order Infomration </h3>
<?php
for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo $_SESSION['cart'][$i] . '<br';
}
?>

</body>
</html>
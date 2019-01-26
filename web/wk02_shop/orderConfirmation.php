<?php
session_start();
echo "Order Confirmation";
if(isset($_SESSION['userName'])){
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $street = test_input($_POST["street"]);
    $city = test_input($_POST["city"]);
    $state = test_input($_POST["state"]);
    $zip = test_input($_POST["zip"]);
    array_push($_SESSION['customer'],$name, $email, $street, $city, $state, $zip);
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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

<h3> Order Information </h3>
<?php
for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo $_SESSION['cart'][$i] . '<br';
}
?>

</body>
</html>
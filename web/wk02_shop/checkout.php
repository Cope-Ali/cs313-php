<?php
session_start();
echo "Check Out";
if(isset($_SESSION['userName'])){
}
$_SESSION['customer']=array();
$name = $email = $street = $city = $state = $zip = "";

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
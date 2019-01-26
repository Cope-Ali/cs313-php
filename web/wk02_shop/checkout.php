<?php
session_start();
print_r($_SESSION);
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
    // header("location:orderConfirmation.php");
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  echo $_POST["frau"];
if($_POST["frau"] > 0){
    echo "Frau more than one";
?>

<!DOCTYPE html>
<html>
<head>
    <?php include("shop_head.php");?>
    <link rel="stylesheet" href="shoppingStyle.css">
</head>
<body>

<?php include("shop_nav.php");?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" name="Name" placeholder="Name"> <br>
    <input type="text" name="Email" placeholder="Email"> <br>
    <input type="text" name="Street" placeholder="Street"> <br>
    <input type="text" name="City" placeholder="City"> <br>
    <input type="text" name="State" placeholder="State"> <br>
    <input type="text" name="ZipCode" placeholder="Zip Code"> <br>
    <button type="submit">Submit</button>
</form>
<button type="button" onclick="shoppingcart.php"> Return to Cart </button>

<h3> Customer Information </h3>
<?php
for ($i = 0; $i < count($_SESSION['customer']); $i++){
echo $_SESSION['customer'][$i] . '<br>';
}
?>

</body>
</html>
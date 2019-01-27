<?php
session_start();
print_r($_SESSION);
echo "Order Confirmation";
if(isset($_SESSION['userName'])){
}

if($frau_qty==0){
    $frau_qty=0;
    echo $frau_qty;
    }
    if($snow_qty==0){
    $snow_qty=0;
    echo $snow_qty;
    }
    if($houdini_qty==0){
    $houdini_qty =0;
    }
    if($roxi_qty==0){
    $roxi_qty = 0;
    echo $roxi_qty;
    }
    
    if(count($_SESSION["cart"]) > 0){
    foreach ($_SESSION["cart"] as $key => $value) {
        switch($value) {
            case "frau":
                $frau_qty++;
                $value = "";
                break;
            case "snow":
                $snow_qty++;
                $value = "";
                break;
            case "houdini":
                $houdini_qty++;
                $value = "";
                break;
            case "roxi":
                $roxi_qty++;
                $value = "";
                break;
            case "":
                break;
        }
    }
    $_SESSION["cart"] = array();
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
echo 'Name: ' . $_POST['name'] . '<br>';
echo 'Email: ' . $email . '<br>';

?>

<h3> Order Information </h3>
<?php
if($frau_qty>0)
{
    
    echo '<p> Frau Flufferbutt </p>';
   echo  '<img src="images/frau.jpg" alt="Very fluffy small black and white chicken" height="50">';
  echo 'Total :' . $frau_qty . '<br>';

}

if($snow_qty>0)
{
    
    echo '<p> Princess Snow White </p>
    <img src="images/snow_white.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total :' . $snow_qty . '<br>';

}

if($houdini_qty>0)
{
    
    echo '<p> Houdini </p>
    <img src="images/houdini.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total :' . $houdini_qty . '<br>';
}

if($roxi_qty>0)
{
    
    echo '<p> Roxi </p>
    <img src="images/roxi.jpg" alt="Very fluffy small black and white chicken" height="50">';
    echo 'Total :' . $roxi_qty . '<br>';
}
?>

</body>
</html>

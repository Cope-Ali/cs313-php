<?php
session_start();
echo "Shopping Cart";
if(isset($_SESSION['userName'])){

}
for ($i = 0; $i < count($_SESSION['cart']); $i++){
    echo $_SESSION['cart'][$i] . '<br>';
}
echo "test";

?>
<?php
session_start();
echo "Shopping Cart";
if(isset($_SESSION['username'])){

print_r($_SESSION);
echo $cartContents;
}
?>
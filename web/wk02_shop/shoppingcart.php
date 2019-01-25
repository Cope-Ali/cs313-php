<?php
session_start();
echo "Shopping Cart";
if(isset($_SESSION['userName'])){
print_r($_SESSION);
foreach($cartContents as $item)
echo $item;
}
?>
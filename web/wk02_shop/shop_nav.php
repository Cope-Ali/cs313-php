<div class="container">
	<ul class="nav">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Browse") {?>active<?php }?>" href="browse.php">Browse</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Cart") {?>active<?php }?>" href="shoppingcart.php">Shopping Cart</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Checkout") {?>active<?php }?>" href="checkout.php">Checkout</a>
	</ul>
</div>

<style>

.nav{
    display: grid;
    width: 60%;
    margin: auto;
    grid-template-columns: auto auto auto;
}

.nav-item {
background-color: #86aeef;
list-style-type:none;
}

.clear{
    list-style-type:none;
    float: clear;
}



</style>
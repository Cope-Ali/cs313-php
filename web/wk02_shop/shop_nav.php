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
      </li>
      <li class="clear"></li>
	</ul>
</div>

<style>

.nav-item {
float: left;
width: 400 px;
background-color: #86aeef;
padding; 30px;
list-style-type:none;

}

.clear{
    float: clear;
}



</style>
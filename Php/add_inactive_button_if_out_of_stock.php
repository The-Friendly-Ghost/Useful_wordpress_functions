<?php

// Adds text to the products on the product archive page
// when a product is out of stock. The text is added at
// the spot of the add-to-cart-button. You need to add some
// extra CSS to style the text like a button.

add_filter( 'woocommerce_loop_add_to_cart_link', 'my_out_of_stock_button' );

function my_out_of_stock_button( $args ){
  global $product;
  if( $product && !$product->is_in_stock() ){
	  return '<a class="inactive-add-to-cart-button">+ Fles</a>';
  }
  return $args;
}

?>

<?php

// Adds the product ID under the product title in the product loop widget.

add_filter( 'woocommerce_cart_item_name', 'filter_woocommerce_cart_item_name', 10, 3 );

function filter_woocommerce_cart_item_name( $item_name, $cart_item, $cart_item_key ) {
    
    // Get Product ID
    $product_id = $cart_item['variation_id'] > 0 ? $cart_item['variation_id'] : $cart_item['product_id'];

	// Add product ID to the product loop, under the title.
    if ( (strpos($_SERVER['REQUEST_URI'], "[YOUR-URL]") !== false) ) {
   		return $item_name . '<br><span class="product-id-title"> Product-ID: ' . $product_id . '</span>';
	}
	return $item_name;
}

?>
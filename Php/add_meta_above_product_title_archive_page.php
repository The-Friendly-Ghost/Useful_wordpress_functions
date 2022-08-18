<?php

// Adds a meta field above the product title on the product archive page.

add_action( 'woocommerce_before_shop_loop_item_title', 'add_meta_above_title', 10);

function add_meta_above_title() {
	global $product;

	// replace the custom field name with your own
	$my_variable = get_post_meta( $product->id, '[META_FIELD_ID]', true );		
	
	echo '<div class="product-meta-boven-titel">' . ucwords( $my_variable ) . '</div>';
}

?>

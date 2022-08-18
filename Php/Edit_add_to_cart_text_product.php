<?php
// SOURCE: https://www.codegearthemes.com/blogs/woocommerce/woocommerce-how-to-change-add-to-cart-button-text
// Change the standard text on the add to cart button on the single product 
// page. Wordpress and Woocommerce.

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 

function woocommerce_custom_single_add_to_cart_text() {

	// OPTIONAL: If the url is [Your-URL], change the text to [YOUR_TEXT]
	if (strpos($_SERVER['REQUEST_URI'], "[Your-URL]") !== false) {
		return __( '[YOUR_TEXT]', 'woocommerce' );
	}

	// In all other cases, change the add to cart text to [YOUR_TEXT]
    return __( '[YOUR_TEXT]', 'woocommerce' ); 
}
?>

<?php

// Change the standard text on the add to cart button on the product archive 
// page. Wordpress and Woocommerce.

add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );

function woocommerce_custom_product_add_to_cart_text() {
    return __( '[YOUR-TEXT]', 'woocommerce' );
}

?>

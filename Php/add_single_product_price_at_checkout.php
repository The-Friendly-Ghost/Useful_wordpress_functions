<?php

// By default, if you have 5 times a certain product in your basket, Woocommerce
// only shows the total price at checkout. This function adds the price of 
// a single product to the information on the checkout page.

add_filter( 'woocommerce_checkout_cart_item_quantity', 'show_product_price_on_checkout', 10, 3 );

function show_product_price_on_checkout( $item_quantity, $cart_item, $cart_item_key ) {
    return $cart_item['data']->get_price_html() . ' ' . $item_quantity;
}

?>
<?php

// Maybe, you want to offer custom shipping when an order is above a certain
// weight. With this function, the customer gets redirected to a different page
// when a customer wants to go to the checkout page and the total weight of the
// order is above 50 kg.
// You can change the '50' to a weight of your choosing.

add_action('woocommerce_check_cart_items','check_cart_weight');

function check_cart_weight(){
    global $woocommerce;
    $weight = $woocommerce->cart->cart_contents_weight;
    if( $weight > 50 ){
		if ( is_checkout() ) {
			header("Location: [YOUR-URL]");
			exit();
		}
    }
}

?>
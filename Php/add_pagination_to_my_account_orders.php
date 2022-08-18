<?php

// By default, WooCommerce has no option to change the amount of orders a customer
// gets to see in the 'my account > orders' page. With this function you can
// change that.

function add_pagination_my_orders( $args ) {
    $args['posts_per_page'] = 5; // You can change this number.
    return $args;
}
add_filter( 'woocommerce_my_account_my_orders_query', 'add_pagination_my_orders', 10, 1 );

?>
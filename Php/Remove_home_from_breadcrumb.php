<?php

// By default, Wordpress shows the homepage in your breadcrumbs of your webshop.
// This functions removes home from the breadcrumbs. Your breadcrumbs will now
// start with the product category or shop page (depending on your
// webshop structure).

add_filter('woocommerce_breadcrumb_defaults', function( $defaults ) {
    unset($defaults['home']); //removes home link.
    return $defaults; //returns rest of links
});

?>
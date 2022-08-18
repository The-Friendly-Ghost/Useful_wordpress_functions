<?php

// Remove the standard zoom functionality on product image hover on the 
// single product page. Also disables lightbox on product image click. In
// other words,, the product image won't do anything when you hover over
// it or click on it. Wordpress / Woocommerce only.

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}

add_action( 'wp', 'remove_image_zoom_support', 100 );
function remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}

add_filter( 'woocommerce_single_product_image_thumbnail_html', 'remove_product_image_link', 10, 2 );

?>
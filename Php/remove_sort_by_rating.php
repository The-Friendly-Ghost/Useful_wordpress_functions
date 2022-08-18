<?php

// SOURCE : https://rudrastyh.com/woocommerce/sorting-options.html

// When a webshop is just starting out, sorting by rating is useless. To remove
// this sorting option, use this function.

add_filter( 'woocommerce_catalog_orderby', 'remove_rating_sort_option' );

function remove_rating_sort_option( $options ){
	unset( $options[ 'rating' ] );
	return $options;
}

?>
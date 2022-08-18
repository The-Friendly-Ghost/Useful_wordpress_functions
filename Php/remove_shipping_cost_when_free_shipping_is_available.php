<?php

// SOURCE : https://stackoverflow.com/questions/60622128/hide-specific-shipping-method-when-free-shipping-is-available-in-woocommerce

// It doesn't make sense to offer a paid shipping option when free shipping 
// is also offered. WooCommerce doesn't fix this by default.
// This function will remove any paid shipping methods if free shipping is
// available for the customer.

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );

function hide_shipping_when_free_is_available( $rates, $package ) {
    $new_rates = array();
    foreach ( $rates as $rate_id => $rate ) {
        // Only modify rates if free_shipping is present.
        if ( 'free_shipping' === $rate->method_id ) {
            $new_rates[ $rate_id ] = $rate;
            break;
        }
    }

    if ( ! empty( $new_rates ) ) {
        //Save local pickup if it's present.
        foreach ( $rates as $rate_id => $rate ) {
            if ('local_pickup' === $rate->method_id ) {
                $new_rates[ $rate_id ] = $rate;
                break;
            }
        }
        return $new_rates;
    }

    return $rates;
}

?>
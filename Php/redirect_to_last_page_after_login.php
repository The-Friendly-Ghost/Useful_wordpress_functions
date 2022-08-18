<?php

/* SOURCE : https://gist.github.com/EvanHerman/492c09fbb584e0c428ae
*
*	Add a hidden field to our WooCommerce login form - passing in the refering page URL
*	Note: the input (hidden) field doesn't actually get created unless the user was directed
*	to this page from a single product page
*/

function redirect_user_back_to_product() {
	// check for a referer
	$referer = wp_get_referer();
	// if there was a referer.. 
	if( $referer ) {
		$post_id = url_to_postid( $referer );
		$post_data = get_post( $post_id );
		if( $post_data ) {
			// if the refering page was a single product, let's append a hidden field to reidrect the user to
			if( isset( $post_data->post_type ) && $post_data->post_type == 'product' ) {
				?>
					<input type="hidden" name="redirect-user" value="<?php echo $referer; ?>">
				<?php
			}
		}
	}
}
add_action( 'woocommerce_login_form', 'redirect_user_back_to_product' );

function wc_custom_user_redirect( $redirect, $user ) 
{ 
	$redirect = esc_url( $_POST['redirect-user'] ); 
	return $redirect; 
} 
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );

?>
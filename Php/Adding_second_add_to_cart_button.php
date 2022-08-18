<?php
// SOURCE: https://www.cssigniter.com/quickly-add-multiples-of-a-product-to-the-woocommerce-cart/

// Function to add a second add-to-cart-button next to the single-add-to-cart-button 
// to add a product x amount of times. This function works on the product
// archive and on a single product page. Only for Wordpress and WooCommerce.

add_action( 'woocommerce_after_shop_loop_item', 'cssigniter_second_cart_button', 15 );
add_action( 'woocommerce_after_add_to_cart_button', 'cssigniter_second_cart_button', 15 );

function cssigniter_second_cart_button() {
	// line 15 | GET GLOBAL VALUES
	// Get the data about the current product.

	global $product;

	// line 20 | SET QUANTITY
	// Select the amount of time that the button has to add the product to the cart

	$quantity = 6;

	// line 25 - 27 | EXLUDE URL's
	// Optional: exclude certain URL's from using this function

	if (strpos($_SERVER['REQUEST_URI'], "/collectie/cadeauverpakking/") !== false) {
		return;
	}

	// line 33 - 38 | EDGE CASE CHECK
	// Certain checks to exclude certain products (out of stock, not
	// purchasable, etc)

	if ( empty( $quantity )
	|| 'simple' !== $product->get_type()
	|| ! $product->is_purchasable()
	|| ! $product->is_in_stock() ) {
		return;
	}
	
	// line 49 - 81 | CREATE INACTIVE BUTTON
	// If a product is in stock, but does not have [quantity] amount in stock.
	// This code adds a inactive button next to the single-add-to-cart button.
	// The class of this button is 'custom-bulk-button-inactive'. You can edit
	// the styling of the button with CSS. (make it greyed out for example.)
	// Note that in line 71 you have to edit the text that you want to have in
	// the button.

	if ( $product->get_manage_stock() ) {
		if ( $product->get_stock_quantity() < $quantity && $product->get_stock_quantity() > 0 ) {
			if (is_product())
				return;
			$classes = implode(
		' ',
		array_filter(
			array(
				'button',
				'custom-bulk-button-inactive',
				'product_type_' . $product->get_type(),
				'add_to_cart_button',
				)
			)
		);

		ob_start();
		?>
		<span
		class="<?php echo esc_attr( $classes ); ?>"
		rel="nofollow">
		<?php
		echo sprintf(
		/* translators: %s: quantity to add to cart */
			esc_html__( '[your_text_on_the_button]', 'your-text-domain' ),
		);
		?>
		</span>

		<?php
		echo ob_get_clean();
		return;
		}
	}

	// line 91 - 125 | CREATE ACTIVE BUTTON
	// If a product is in stock, and has more than [quantity] in stock.
	// This code adds a (active) button next to the single-add-to-cart button.
	// The class of this button is 'custom-bulk-button'. You can edit
	// the styling of the button with CSS.
	// Note that in line 117 you have to edit the text that you want to have in
	// the button.

	$classes = implode(
		' ',
		array_filter(
			array(
				'button',
				'custom-bulk-button',
				'product_type_' . $product->get_type(),
				'add_to_cart_button',
				$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
			)
		)
	);

	ob_start();

	?>
	<a
	href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
	class="<?php echo esc_attr( $classes ); ?>"
	data-quantity="<?php echo absint( $quantity ); ?>"
	data-product_id="<?php echo absint( $product->get_id() ); ?>"
	data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
	rel="nofollow">
	<?php
	echo sprintf(
	/* translators: %s: quantity to add to cart */
		esc_html__( '[your_text_on_the_button]', 'your-text-domain' ),
		absint( $quantity )
	);
	?>
	</a>

	<?php

	echo ob_get_clean();
}

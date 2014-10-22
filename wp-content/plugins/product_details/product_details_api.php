<?php 

/*
 * Plugin Name: Product details
 */

function prod_details_init() {
	if( have_rows('product_details') ) {
		$details_array = array();

		while( have_rows('product_details') ){
			the_row();
			array_push($details_array, array(
				'title' => get_sub_field('title'),
				'blurb' => get_sub_field('blurb'),
				'content' => get_sub_field('content')
				)
			);
		}

		wp_localize_script('ideum-site', 'IDEUM_SITE',
			array(
				'product_details' => $details_array
			)
		);
	} //close if
}

add_action('wp_enqueue_scripts', 'prod_details_init');
?>
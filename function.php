<?php

// Load CSS
function porto_child_css() {
	// porto child theme styles
	wp_deregister_style( 'styles-child' );
	wp_register_style( 'styles-child', esc_url( get_stylesheet_directory_uri() ) . '/style.css' );
	wp_enqueue_style( 'styles-child' );

	if ( is_rtl() ) {
		wp_deregister_style( 'styles-child-rtl' );
		wp_register_style( 'styles-child-rtl', esc_url( get_stylesheet_directory_uri() ) . '/style_rtl.css' );
		wp_enqueue_style( 'styles-child-rtl' );
	}
}

add_action( 'wp_enqueue_scripts', 'porto_checkout_script', 1002 );
function porto_checkout_script() {
	global $wp;
	if ( is_checkout() && empty( $wp->query_vars['order-pay'] ) && ! isset( $wp->query_vars['order-received'] ) ) {
		wp_register_script( 'porto-jquery-validate', esc_url( get_stylesheet_directory_uri() ) . '/js/jquery.validate.min.js', array('jquery'), '', true);
		wp_register_script( 'porto-child-checkout', esc_url( get_stylesheet_directory_uri() ) . '/js/checkout-validation.js', array('jquery', 'porto-jquery-validate'), '', true);
		wp_enqueue_script( 'porto-child-checkout' );
	}
}

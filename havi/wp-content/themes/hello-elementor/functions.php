<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.9.0' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		if ( apply_filters( 'hello_elementor_register_menus', true ) ) {
			register_nav_menus( [ 'menu-1' => esc_html__( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => esc_html__( 'Footer', 'hello-elementor' ) ] );
		}

		if ( apply_filters( 'hello_elementor_post_type_support', true ) ) {
			add_post_type_support( 'page', 'excerpt' );
		}

		if ( apply_filters( 'hello_elementor_add_theme_support', true ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
					'script',
					'style',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', true ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', true ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		if ( apply_filters( 'hello_elementor_register_elementor_locations', true ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( ! function_exists( 'hello_elementor_add_description_meta_tag' ) ) {
	/**
	 * Add description meta tag with excerpt text.
	 *
	 * @return void
	 */
	function hello_elementor_add_description_meta_tag() {
		if ( ! apply_filters( 'hello_elementor_description_meta_tag', true ) ) {
			return;
		}

		if ( ! is_singular() ) {
			return;
		}

		$post = get_queried_object();
		if ( empty( $post->post_excerpt ) ) {
			return;
		}

		echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $post->post_excerpt ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'hello_elementor_add_description_meta_tag' );

// Admin notice
if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

// Settings page
require get_template_directory() . '/includes/settings-functions.php';

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check whether to display the page title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * BC:
 * In v2.7.0 the theme removed the `hello_elementor_body_open()` from `header.php` replacing it with `wp_body_open()`.
 * The following code prevents fatal errors in child themes that still use this function.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		wp_body_open();
	}
}
wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true );



// thay đổi text default 
add_filter('woocommerce_product_add_to_cart_text', 'change_add_to_cart_button_text');

function change_add_to_cart_button_text($text) {
    $text = 'Thêm vào giỏ hàng &#8250;'; 
    return $text;
}


add_filter('woocommerce_product_single_add_to_cart_text', 'change_single_add_to_cart_button_text');

function change_single_add_to_cart_button_text($text) {
    $text = 'Thêm vào giỏ hàng'; 
    return $text;
}

add_filter('gettext', 'change_related_products_label', 20, 3);

function change_related_products_label($translated_text, $text, $domain) {
    if ($text === 'Related products' && $domain === 'woocommerce') {
        $translated_text = 'Sản phẩm liên quan';
    }
    return $translated_text;
}
add_filter('woocommerce_product_description_heading', 'change_product_description_heading');

function change_product_description_heading($text) {
    $text = 'Mô tả sản phẩm'; 
    return $text;
}

add_filter('gettext', 'change_reviews_label', 20, 3);

function change_reviews_label($translated_text, $text, $domain) {
    if ($text === 'Reviews' && $domain === 'woocommerce') {
        $translated_text = 'Nhận xét sản phẩm'; 
    }
    return $translated_text;
}

add_filter('woocommerce_reviews_title', 'change_reviews_title');

function change_reviews_title($text) {
    $text = 'Nhận xét sản phẩm'; 
    return $text;
}


add_filter('woocommerce_product_description_tab_title', 'change_product_description_tab_title');

function change_product_description_tab_title($title) {
    return 'Mô tả sản phẩm'; 
}

add_filter('woocommerce_product_reviews_tab_title', 'change_reviews_tab_title');

function change_reviews_tab_title($title) {
    return 'Nhận xét sản phẩm'; // Thay đổi văn bản theo ý muốn của bạn
}

add_filter('woocommerce_product_additional_information_tab_title', 'change_additional_information_tab_title');

function change_additional_information_tab_title($title) {
    return 'Thông tin thêm'; 
}

function single_product_content_func(){

    if (is_product()) {

       

        wc_get_template_part('content', 'single-product');

    }

}




add_shortcode('single_product_content', 'single_product_content_func');


// //remove hook single product

// remove_all_actions('woocommerce_after_single_product_summary');

// remove_all_actions('woocommerce_after_add_to_cart_button');

// remove_all_actions('woocommerce_before_add_to_cart_form');

// remove_all_actions('woocommerce_before_add_to_cart_quantity');



// //remove single product gallery

// add_action( 'woocommerce_before_single_product', function() {

//     add_filter( 'woocommerce_product_get_gallery_image_ids', '__return_empty_array' );

// } );



// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
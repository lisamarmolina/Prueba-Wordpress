<?php

/**
 * Plugin: WPB Elementor Addons
 *
 * Author: WpBean
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/**
 * Get template part implementation
 *
 * Looks at the theme directory first
 */

if( !function_exists('wpb_ea_get_template_part') ){
    function wpb_ea_get_template_part( $slug, $name = '' ) {
    $wpb_elementor_addons = wpb_elementor_addons::init();

    $templates = array();
    $name = (string) $name;

    // lookup at theme/slug-name.php or wpb-elementor-addons/slug-name.php
    if ( '' !== $name ) {
        $templates[] = "{$slug}-{$name}.php";
        $templates[] = $wpb_elementor_addons->theme_dir_path . "{$slug}-{$name}.php";
    }

    $template = locate_template( $templates );

    // fallback to plugin default template
    if ( !$template && $name && file_exists( $wpb_elementor_addons->template_path() . "{$slug}-{$name}.php" ) ) {
        $template = $wpb_elementor_addons->template_path() . "{$slug}-{$name}.php";
    }

    // if not yet found, lookup in slug.php only
    if ( !$template ) {
        $templates = array(
            "{$slug}.php",
            $wpb_elementor_addons->theme_dir_path . "{$slug}.php"
        );

        $template = locate_template( $templates );
    }

    if ( $template ) {
        load_template( $template, false );
    }
}
}

/**
 * Include a template by precedance
 *
 * Looks at the theme directory first
 *
 * @param  string  $template_name
 * @param  array   $args
 *
 * @return void
 */

if( !function_exists('wpb_ea_get_template') ){
    function wpb_ea_get_template( $template_name, $args = array() ) {
        $wpb_elementor_addons = wpb_elementor_addons::init();

        if ( $args && is_array($args) ) {
            extract( $args );
        }

        $template = locate_template( array(
            $wpb_elementor_addons->theme_dir_path . $template_name,
            $template_name
        ) );

        if ( ! $template ) {
            $template = $wpb_elementor_addons->template_path() . $template_name;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }
}


/**
 * PHP implode with key and value ( Owl carousel data attr )
 */

if( !function_exists('wpb_ea_owl_carousel_data_attr_implode') ){
    function wpb_ea_owl_carousel_data_attr_implode( $array ){
        
        foreach ($array as $key => $value) {

            if( isset($value) &&  $value != '' ){
                $output[] = $key . '=' . '"'. esc_attr( $value ) . '"' ;
            }
        }

        return implode( ' ', $output );
    }
}

/**
 * get all types of posts
 */
function wpb_ea_get_all_post_type_options() {

    $post_types = get_post_types(array('public' => true), 'objects');

    $options = array();

    foreach ($post_types as $post_type) {
        $options[$post_type->name] = $post_type->label;
    }

    return $options;
}

/**
 * get all taxonomy
 */

function wpb_ea_get_all_taxonomy_options() {

    $taxonomies = get_taxonomies( array('public' => true), 'objects' );

    $options = array();

    foreach ($taxonomies as $taxonomy) {
        $options[$taxonomy->name] = $taxonomy->label;
    }

    return $options;
}

/**
 * Check addon is enable or not
 * $addon : the addon key
 * $default : default value 
 */

if( !function_exists('wpb_ea_enable_addons') ){
    function wpb_ea_enable_addons( $addon = '', $default = '' ){

        if( $addon ){

            $addons_status = wpb_ea_get_option( $addon, 'wpb_ea_addons', $default );

            if( $addons_status == 'on' ){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
}



/**
 * Init Elementor addons
 */

add_action( 'elementor/init', 'wpb_ea_add_elementor_category' );
add_action( 'elementor/widgets/widgets_registered', 'wpb_ea_add_elementor_widgets' );



/**
 * Add a New Elementor Category
 */

if( !function_exists('wpb_ea_add_elementor_category') ){
    function wpb_ea_add_elementor_category(){
        \Elementor\Plugin::instance()->elements_manager->add_category(
            'wpb_ea_widgets',
            array(
                'title' => esc_html__( 'WPB ELEMENTOR ADDONS', 'wpb-elementor-addons' ),
            ),
            1
        );
    }
}


/**
 * Add Elementor widgets
 */

if( !function_exists('wpb_ea_add_elementor_widgets') ){
    function wpb_ea_add_elementor_widgets(){

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'content_box', 'on' ) ){
            wpb_ea_get_template('content_box.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'counter', 'on' ) ){
            wpb_ea_get_template('counter.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'fancy_list', 'on' ) ){
            wpb_ea_get_template('fancy_list.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'image_gallery', 'on' ) ){
            wpb_ea_get_template('image_gallery.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'logo_slider', 'on' ) ){
            wpb_ea_get_template('logo_slider.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'news_ticker', 'on' ) ){
            wpb_ea_get_template('news_ticker.php');
        }
        
        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'post_grid_slider', 'on' ) ){
            wpb_ea_get_template('post_grid_slider.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'pricing_tables', 'on' ) ){
            wpb_ea_get_template('pricing_tables.php');
        }
        
        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'service_box', 'on' ) ){
            wpb_ea_get_template('service_box.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'slider', 'on' ) ){
            wpb_ea_get_template('slider.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'team_members', 'on' ) ){
            wpb_ea_get_template('team_members.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'testimonials', 'on' ) ){
            wpb_ea_get_template('testimonials.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'video_popup', 'on' ) ){
            wpb_ea_get_template('video_popup.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'timeline', 'on' ) ){
            wpb_ea_get_template('timeline.php');
        }

        if( wpb_ea_enable_addons( WPB_EA_PREFIX.'videos_grid', 'on' ) ){
            wpb_ea_get_template('videos_grid.php');   
        }

    }
}


/**
 * Getting gallery categories array
 */

function wpb_ea_array_flatten($array) { 
    if (!is_array($array)) { 
        return false; 
    } 

    $result = array(); 

    foreach ($array as $key => $value) { 
        if (is_array($value)) { 
            $result = array_merge($result, wpb_ea_array_flatten($value)); 
        } else { 
            $result[$key] = $value; 
        } 
    } 

    return $result; 
}

function wpb_ea_gallery_categories( $gallery_items ){

    if (!is_array($gallery_items)) { 
        return false; 
    } 

    $gallery_category_names = array();
    $gallery_category_names_final = array();

    if( is_array( $gallery_items ) ){

        foreach( $gallery_items as $gallery_item ) :
            $gallery_category_names[] = $gallery_item['gallery_category_name'];
        endforeach;

        if( is_array($gallery_category_names) && !empty($gallery_category_names) ){
            foreach ($gallery_category_names as $gallery_category_name ) {
                $gallery_category_names_final[] = explode(',', $gallery_category_name);
            }
        }

        if( is_array($gallery_category_names_final) && !empty($gallery_category_names_final) && function_exists('wpb_ea_array_flatten') ){
            $gallery_category_names_final = wpb_ea_array_flatten($gallery_category_names_final);
            return array_unique( array_filter($gallery_category_names_final) );
        }

    }

}

/**
 * Gallery Item category classes
 */

function wpb_ea_gallery_item_category_classes( $gallery_classes, $id ){

    if (!($gallery_classes)) { 
        return false; 
    } 

    $gallery_cat_classes    = array();
    //$gallery_classes        = str_replace(" ", "-", $gallery_classes);
    $gallery_classes        = explode(',', $gallery_classes);

    if( is_array($gallery_classes) && !empty($gallery_classes) ){
        foreach ($gallery_classes as $gallery_class ) {
            $gallery_cat_classes[] = sanitize_title( $gallery_class ) . '-' . $id;
        }
    }

    return implode(' ', $gallery_cat_classes);
}


/**
 * Body Class
 */

add_filter( 'body_class', 'wpb_ea_body_class' );

function wpb_ea_body_class( $classes ) {

    if ( !\Elementor\Plugin::$instance->preview->is_preview_mode() ) {
        $classes[] = 'wpb-elementor-addons';
    }
    return $classes;
}
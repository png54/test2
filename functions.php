<?php
/**
 * CGEA Functions and Definitions
 *
 * @package cgea-theme
 */

// Eviter les erreurs fatales si Advanced Custom Fields (ACF) n'est pas installé/activé
if ( ! function_exists( 'get_field' ) ) {
    function get_field( $selector, $post_id = false, $format_value = true ) {
        return false;
    }
}
if ( ! function_exists( 'the_field' ) ) {
    function the_field( $selector, $post_id = false, $format_value = true ) {
        $val = get_field( $selector, $post_id, $format_value );
        echo is_array($val) ? '' : esc_html($val);
    }
}

if ( ! function_exists( 'cgea_setup' ) ) :
    function cgea_setup() {
        // Support du multilingue
        load_theme_textdomain( 'cgea-theme', get_template_directory() . '/languages' );

        // Balise de titre gérée par WordPress
        add_theme_support( 'title-tag' );

        // Support des images à la une
        add_theme_support( 'post-thumbnails' );

        // Enregistrement des menus de navigation
        register_nav_menus( array(
            'primary' => esc_html__( 'Menu Principal (Bilingue)', 'cgea-theme' ),
            'footer'  => esc_html__( 'Liens Utiles Pied de Page', 'cgea-theme' ),
        ) );

        // Support du format HTML5 pour la recherche et les formulaires
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'cgea_setup' );

/**
 * Enregistrement des scripts et styles du thème
 */
function cgea_scripts() {
    // Styles principaux et polices
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap', array(), null );
    wp_enqueue_style( 'cgea-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Scripts d'animation et d'interactivité
    wp_enqueue_script( 'cgea-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true );
    wp_enqueue_script( 'cgea-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js', array(), '2.7.1', true );
}
add_action( 'wp_enqueue_scripts', 'cgea_scripts' );

/**
 * Enregistrement des Custom Post Types requis par le CGEA
 */
function cgea_register_custom_post_types() {
    $cpts = array(
        'news'          => array('singular' => 'Actualité', 'plural' => 'Actualités', 'icon' => 'dashicons-format-aside'),
        'activities'    => array('singular' => 'Activité', 'plural' => 'Activités', 'icon' => 'dashicons-portfolio'),
        'events'        => array('singular' => 'Événement', 'plural' => 'Événements', 'icon' => 'dashicons-calendar-alt'),
        'gallery'       => array('singular' => 'Galerie', 'plural' => 'Galeries Photo', 'icon' => 'dashicons-format-image'),
        'documents'     => array('singular' => 'Document', 'plural' => 'Documents utiles', 'icon' => 'dashicons-pdf'),
        'partners'      => array('singular' => 'Partenaire', 'plural' => 'Partenaires', 'icon' => 'dashicons-groups'),
        'presidents'    => array('singular' => 'Président', 'plural' => 'Historique Présidents', 'icon' => 'dashicons-businessman'),
        'speeches'      => array('singular' => 'Discours', 'plural' => 'Discours officiels', 'icon' => 'dashicons-megaphone'),
        'projects'      => array('singular' => 'Projet', 'plural' => 'Projets & Programmes', 'icon' => 'dashicons-admin-tools'),
        'announcements' => array('singular' => 'Annonce', 'plural' => 'Annonces & Concours', 'icon' => 'dashicons-bell')
    );

    foreach ($cpts as $slug => $labels) {
        $args = array(
            'label'                 => $labels['plural'],
            'labels'                => array(
                'name'                  => $labels['plural'],
                'singular_name'         => $labels['singular'],
                'add_new_item'          => 'Ajouter un ' . $labels['singular'],
                'edit_item'             => 'Modifier ' . $labels['singular'],
                'all_items'             => 'Tous les ' . $labels['plural'],
            ),
            'public'                => true,
            'has_archive'           => true,
            'show_in_rest'          => true, // Active l'éditeur Gutenberg
            'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
            'menu_icon'             => $labels['icon'],
            'taxonomies'            => array( 'category' ),
        );
        register_post_type( $slug, $args );
    }
}
add_action( 'init', 'cgea_register_custom_post_types' );

/**
 * Sécurisation de l'API REST et retrait des métadonnées WP inutiles
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

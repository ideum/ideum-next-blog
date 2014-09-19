<?php
/**
 * The blog listing template file
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package     WordPress
 * @subpackage  Timber
 * @since       Timber 0.1
 */

    if (!class_exists('Timber')){
        echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
        return;
    }

    
    $context = Timber::get_context();
    $context['posts'] = Timber::get_posts();
    $context['acf'] = get_field_objects($data['post']->ID); // #FIXME - need to be able to get acf value, does not work
    $context['foo'] = 'bar';
    $context['post']['slug'] = 'blog';


    // Custom queries for blog page go here

    $templates = array('home.twig', 'index.twig');
    Timber::render($templates, $context);



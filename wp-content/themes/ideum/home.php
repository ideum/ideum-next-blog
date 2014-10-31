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
    
    $context['pagination'] = Timber::get_pagination();
    $context['acf'] = get_field_objects($data['post']->ID); 
    $context['foo'] = 'bar';
    $context['post']['slug'] = 'blog';

    // values for dev site - delete eventually
    //$context['blog'] = new TimberPost(12181);
    //$context['custom_header'] = get_field('header_image_text_content', 12181);

    // values for live site
    $context['blog'] = new TimberPost(11864);
    $context['custom_header'] = get_field('header_image_text_content', 11864);

    $templates = array('home.twig', 'index.twig');
    Timber::render($templates, $context);

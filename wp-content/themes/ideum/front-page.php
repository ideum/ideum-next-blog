<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays the front page for the
 * site.
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render(array('front-page.twig'), $context);
$context['acf'] = get_field_objects($data['post']->ID);

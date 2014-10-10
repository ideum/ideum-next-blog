<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();

$context['title'] = $post->title();

//$post_cat = $post->get_terms('category');
//$post_cat = $post_cat[0]->ID;

$context['acf'] = get_field_objects($data['post']->ID); 

$sidebar_context = array();
$sidebar_context['related'] = Timber::get_posts('post_type=ideum_project&cat='.$post_cat.'&posts_per_page=3');

$context['bottombar'] = Timber::get_sidebar('bar-related-projects.twig', $sidebar_context);
$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

Timber::render(array('single-ideum_project.twig'),  $context);
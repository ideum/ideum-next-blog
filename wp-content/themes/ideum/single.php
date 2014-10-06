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

$post = Timber::query_post();

$post_cat = $post->get_terms('category');
$post_cat = $post_cat[0]->ID;

$context['post'] = $post;

$context['wp_title'] .= ' - ' . $post->title();
$context['wp_author'] .= ' - ' . $post->author();


$context['acf'] = get_field_objects($data['post']->ID); 

//$context['comment_form'] = TimberHelper::get_comment_form();

$sidebar_context = array();
$sidebar_context['related'] = Timber::get_posts('cat=-592'.$post_cat.'&posts_per_page=3');

$context['bottombar'] = Timber::get_sidebar('bottombar-related.twig', $sidebar_context);
$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}



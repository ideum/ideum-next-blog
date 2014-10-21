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

// this cluster not currently in use on this page - likely will be later
$post_author_img_id = get_the_author_meta('team_user_image');
$acf_author_img_url = wp_get_attachment_url( $post_author_img_id );
$context['acf_author_image'] = $acf_author_img_url;

//$context['comment_form'] = TimberHelper::get_comment_form();

$sidebar_context = Timber::get_context();
$sidebar_context['related_posts'] = Timber::get_posts('cat=-592,'.$post_cat.'&numberposts=3');  //FIXME - don't know if this works
$sidebar_context['thispost'] = Timber::get_post($post->ID);
$sidebar_context['acf_author_image'] = $acf_author_img_url;

$context['related_posts'] = Timber::get_sidebar('bar-related-posts.twig', $sidebar_context);
$context['sidebar_post'] = Timber::get_sidebar('sidebar-post.twig', $sidebar_context);

if (post_password_required($post->ID)){ 
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}



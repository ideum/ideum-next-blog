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

$context['post'] = $post;

$post_cat = get_the_category();
$cat_name = $post_cat[0]->name;

// make an argument list for related posts get_post query
$args = array(
  'posts_per_page'  => 3,
  'category'        => $cat_name,
  'numberposts'     => 3,
  'post_type'       => 'post',
  'exclude'         => $post->ID
 );

//print_r ($args);
//echo '/'.$cat_name.'/';

$post_author_img_id = get_the_author_meta('team_user_image');
$acf_author_img_url = wp_get_attachment_url( $post_author_img_id );

$context['acf'] = get_field_objects($data['post']->ID);

//$context['comment_form'] = TimberHelper::get_comment_form();

$sidebar_context = Timber::get_context();
$sidebar_context['site_url'] = get_bloginfo('url');

$sidebar_context['related_posts'] = Timber::get_posts($args); //FIXME - don't know if this works

$sidebar_context['thispost'] = Timber::get_post($post->ID);
$sidebar_context['acf_author_image'] = $acf_author_img_url;

$context['related_posts'] = Timber::get_sidebar('bar-related-posts.twig', $sidebar_context);
$context['sidebar_post'] = Timber::get_sidebar('sidebar-post.twig', $sidebar_context);

// Dirty hack for "Array" bug
if (is_array($context['post']->pull_quote)) {
    $context['post']->pull_quote = current($context['post']->pull_quote);
}

if (post_password_required($post->ID)){ 
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}

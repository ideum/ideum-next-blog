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

$post = Timber::query_post();

$post_cat = $post->get_terms('category');

$context['post'] = $post;

$context['acf'] = get_field_objects($data['post']->ID);

$sidebar_context = array();
$sidebar_context['featured'] = Timber::get_posts('cat=592&posts_per_page=1');

$context['blogbar'] = Timber::get_sidebar('bar-featured-post.twig', $sidebar_context);

Timber::render(array('front-page.twig'), $context);

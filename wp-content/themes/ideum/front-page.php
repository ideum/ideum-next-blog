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
$context['site_url'] = get_bloginfo('url');

$sidebar_context = Timber::get_context();
$sidebar_context['site_url'] = get_bloginfo('url');
$sidebar_context['featured_post'] = Timber::get_posts('cat=592&numberposts=1&posts_per_page=1');
$sidebar_context['featured_projects'] = Timber::get_posts('post_type=ideum_project&numberposts=6&posts_per_page=6'); 

$context['featured_projects'] = Timber::get_sidebar('bar-featured-projects.twig', $sidebar_context);
$context['related_posts'] = Timber::get_sidebar('bar-related-posts.twig', $sidebar_context);

$context['featured_post'] = Timber::get_sidebar('bar-featured-post.twig', $sidebar_context);

$data['share_dialog'] = get_option('share_dialog');
Timber::render('share-post.twig', $data);

Timber::render(array('front-page.twig'), $context);

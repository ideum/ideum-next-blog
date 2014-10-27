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

$context['post'] = $post;

$args = array('fields'=>'ids');
$post_cats = $post->get_terms('category', $args);

$context['acf'] = get_field_objects($data['post']->ID);

$sidebar_context = Timber::get_context();
$sidebar_context['site_url'] = get_bloginfo('url');
$sidebar_context['related_projects'] = Timber::get_posts('post_type=ideum_project&cat='.$post_cats.'&posts_per_page=3'); //FIXME - don't know if this works
$sidebar_context['thisproject'] = Timber::get_post($post->ID);

$context['related_projects'] = Timber::get_sidebar('bar-related-projects.twig', $sidebar_context);
$context['sidebar_project'] = Timber::get_sidebar('sidebar-project.twig', $sidebar_context);

Timber::render(array('single-ideum_project.twig'),  $context);
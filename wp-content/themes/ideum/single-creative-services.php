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
// very ugly way to get a comma-delimited list of category ids for related posts
$post_cats = $post->get_terms('category', $args); 
if ($post_cats[0]->ID) { $post_cats_ids = $post_cats[0]->ID; } 
if ($post_cats[1]->ID) { $post_cats_ids = $post_cats_ids.','.$post_cats[1]->ID; } 
if ($post_cats[2]->ID) { $post_cats_ids = $post_cats_ids.','.$post_cats[2]->ID; } 
if (!$post_cats_ids) { $post_cats_ids = '0'; } else { $post_cats_ids = $post_cats_ids.',15'; }
//echo $post_cats_ids;

$context['acf'] = get_field_objects($data['post']->ID);

$sidebar_context = Timber::get_context();
$sidebar_context['site_url'] = get_bloginfo('url');
$sidebar_context['related_projects'] = Timber::get_posts('post_type=creative-services&cat='.$post_cats_ids.'&posts_per_page=3');
$sidebar_context['thisproject'] = Timber::get_post($post->ID);

$context['related_projects'] = Timber::get_sidebar('bar-related-projects.twig', $sidebar_context);
$context['sidebar_project'] = Timber::get_sidebar('sidebar-project.twig', $sidebar_context);

Timber::render(array('single-creative-services.twig'),  $context);
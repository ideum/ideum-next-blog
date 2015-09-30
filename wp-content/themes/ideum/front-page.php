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

// 'featured posts' needs to be from the 'Featured' category 592/dev or 604/live
// no, Ben, it is not possible to use cat slugs instead of ids - it just doesn't work that way 
// unless, of course, we make a custom function
$sidebar_context['featured_post'] = Timber::get_posts('cat=604&numberposts=1&posts_per_page=1'); 
// remove '592' as value for cat (above) before pushing - that value is not in use in live site

$sidebar_context['recent_projects'] = Timber::get_posts('post_type=creative-services&numberposts=12&posts_per_page=12'); 

$context['recent_projects'] = Timber::get_sidebar('bar-recent-projects.twig', $sidebar_context);

$context['related_posts'] = Timber::get_sidebar('bar-related-posts.twig', $sidebar_context);

$context['featured_post'] = Timber::get_sidebar('bar-featured-post.twig', $sidebar_context);

$context['social_media_feed'] = ideum_social_feed(6);

$data['share_dialog'] = get_option('share_dialog');
Timber::compile('share-post.twig', $data);

Timber::render(array('front-page.twig'), $context);

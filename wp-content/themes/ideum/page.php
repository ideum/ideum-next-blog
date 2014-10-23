<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();

$context['acf'] = get_field_objects($data['post']->ID);
$context['slug'] = $slug; 
$context['post'] = $post;

$context['post_parent'] = $post_parent;

ob_start();
$parent_permalink = get_permalink($post->post_parent); 
$parent_title= get_the_title($post->post_parent); 
echo '<li><a href="'.$parent_permalink.'">'.$parent_title.'</a></li>';
wp_list_pages("title_li=&child_of=".$post->post_parent."");
$context['parent_menu'] = ob_get_clean();

$context['share_dialog'] = Timber::compile('share.twig', $data);
$context['follow_dialog'] = Timber::compile('follow.twig', $data);
$context['featured_pages_contact'] = Timber::compile('featured-pages-contact.twig', $data);

$context['sidebar_contact'] = Timber::get_sidebar('sidebar-contact.twig', $sidebar_context);

if (is_page('11825')){
  $context['team'] = Timber::get_posts('post_type=ideum_employee&post_status=publish&exclude=2655&order=asc&img=team_user_image&posts_per_page=-1'); 
  
}

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);

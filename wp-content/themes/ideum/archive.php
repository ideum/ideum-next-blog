<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.2
 */

		$templates = array('archive.twig', 'index.twig');

		$data = Timber::get_context();
		$data['page'] = Timber::get_post('creative-services'); // need it to get creative services ogp image

		if (is_page('blog')) {
			$data['blog'] = Timber::get_post('blog');
		}

		$data['the_post_type'] = $_GET['post_type'];

		$data['title'] = 'Archive';
		if (is_day()){
			$data['title'] = 'Archive: '.get_the_date( 'D M Y' );
		} else if (is_month()){
			$data['title'] = 'Archive: '.get_the_date( 'M Y' );
		} else if (is_year()){
			$data['title'] = 'Archive: '.get_the_date( 'Y' );
		} else if (is_tag()){
			$data['title'] = 'Tag Archive for <em>' . single_tag_title('', false) .'</em>';
			$data['custom_cat_url'] = 'http://'.$_SERVER[HTTP_HOST].''.$_SERVER[REQUEST_URI]; // used for metadata url 
		} else if (is_author()) {
			$data['title'] = 'Author Archive for <em>' . get_the_author().'</em>';
			if (isset($query_vars['author'])){
				$author = new TimberUser($wp_query->query_vars['author']);
				$data['author'] = $author;
				$data['title'] = 'Author Archives: ' . $author->name();
			}
		} else if (is_category()){
			$data['title'] = 'Category Archive for <em>' . single_cat_title('', false) .'</em>';
			$data['custom_cat_url'] = 'http://'.$_SERVER[HTTP_HOST].''.$_SERVER[REQUEST_URI]; // used for metadata url 
			array_unshift($templates, 'archive-'.get_query_var('cat').'.twig');
		} else if (is_post_type_archive()){
			$data['title'] = post_type_archive_title('', false);
			array_unshift($templates, 'archive-'.get_post_type().'.twig');
		}

		if ($post_type == 'ideum_project') {
			$data['custom_slug'] = 'creative-services'; // used for metadata url slug and contextual div class
			$data['custom_slug2'] = 'ideum_project'; // used for metadata url slug
			if (is_category()) {
				$data['custom_slug'] = 'project-category-archive'; // used for metadata url slug and contextual div class
				$data['custom_cat_url'] = 'http://'.$_SERVER[HTTP_HOST].''.$_SERVER[REQUEST_URI];// used for metadata url 
			}
			$data['custom_header'] = get_field('header_image_text_content', 11803);
			$data['ogp_image_path'] = get_field('alternative_meta_image_path', 11803);
			$data['ogp_image'] = get_field('alternative_meta_image', 11803);
			$data['ogp_title'] = get_field('alternative_meta_title', 11803);
			$data['ogp_keywords'] = get_field('alternative_meta_keywords', 11803);
			$data['ogp_description'] = get_field('alternative_meta_description', 11803);
            $data['categories'] = get_categories(array('type' => 'ideum_project'));
		}

		$data['posts'] = Timber::get_posts();

		rewind_posts();

		$data['pagination'] = Timber::get_pagination();

		Timber::render($templates, $data);

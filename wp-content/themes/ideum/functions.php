<?php

	if (!class_exists('Timber')){
		add_action( 'admin_notices', function(){
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
		});
		return;
	}

	class StarterSite extends TimberSite {

		function __construct(){
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_filter('timber_context', array($this, 'add_to_context'));
			add_filter('get_twig', array($this, 'add_to_twig'));
			add_action('init', array($this, 'register_post_types'));
			add_action('init', array($this, 'register_taxonomies'));
			add_action('init', array($this, 'register_scripts'));
			add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
			$this->register_field_groups();
			parent::__construct();
		}

		function register_post_types(){
			register_post_type( 'ideum_employee', array(
				'labels' => array(
					'name' => __( 'Employees' ),
					'singular_name' => __( 'Employee' )
				),
				'public' => true,
				'has_archive' => true
			));
			register_post_type( 'creative-services', array(
				'labels' => array(
					'name' => __( 'Projects' ),
					'singular_name' => __( 'Project' )
				),
				'taxonomies' => array('category'), // added to provide categories for custom post types - or we could register a custom taxonomy for this
				'public' => true,
				'has_archive' => true
			));
			// register_post_type( 'ideum_prod_details', array(
			// 	'labels' => array(
			// 		'name' => __( 'Product-Details' ),
			// 		'singular_name' => __( 'Product-Details' )
			// 	),
			// 	'public' => true,
			// 	'has_archive' => false,
			// 	'can_export' => true,
			// 	'exclude_from_search' => false
			// ));
		}

		function register_taxonomies(){
			// this is where you can register custom taxonomies
		}

		function register_field_groups(){
			if(function_exists("register_field_group")){
				register_field_group(array (
					'id' => 'acf_post-fields',
					'title' => 'Post Fields',
					'fields' => array (
						array (
							'key' => 'field_53fe544ddc5bf',
							'label' => 'Pull Quote',
							'name' => 'pull_quote',
							'type' => 'textarea',
							'instructions' => 'Quote from the article.	This will appear with the featured image at the top of the page.',
							'required' => 0, // value was '1' - had to set to '0' in order to import old posts
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => 200,
							'rows' => 3,
							'formatting' => 'none',
						),
					),
					'location' => array (
						array (
							array (
								'param' => 'post_type',
								'operator' => '==',
								'value' => 'post',
								'order_no' => 0,
								'group_no' => 0,
							),
						),
					),
					'options' => array (
						'position' => 'normal',
						'layout' => 'no_box',
						'hide_on_screen' => array (
						),
					),
					'menu_order' => 0,
				));
			}
		}

		function add_to_context($context){
			$context['foo'] = 'bar';
			$context['stuff'] = 'I am a value set in your functions.php file';
			$context['notes'] = 'These values are available everytime you call Timber::get_context();';
			$context['menu'] = new TimberMenu('menu-nav');
			$context['tabs'] = new TimberMenu('pre-nav');
			$context['nav'] = new TimberMenu('primary-nav');
			$context['foot'] = new TimberMenu('footer-nav');
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

		function register_scripts(){
			wp_register_script('ideum-vendor', get_template_directory_uri() . '/js/vendor.js', array(), null, true);
			wp_register_script('ideum-site', get_template_directory_uri() . '/js/site.js', array('ideum-vendor'), null, true);

			wp_register_style('select2', get_template_directory_uri() . '/bower_components/select2/select2.css');
			wp_register_style('angular-carousel', get_template_directory_uri() . '/bower_components/ideum-angular-carousel/dist/angular-carousel.css');
			wp_register_style('ideum-site', get_template_directory_uri() . '/style.css', array('select2', 'angular-carousel'));

		}

		function enqueue_scripts(){
			wp_enqueue_script('ideum-site');

			wp_enqueue_style('ideum-site');
		}

	}

	new StarterSite();

	function myfoo($text){
		//$text .= ' bar!';
		//return $text;
	}

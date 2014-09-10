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
				'has_archive' => true,
			));
			register_post_type( 'ideum_project', array(
				'labels' => array(
					'name' => __( 'Projects' ),
					'singular_name' => __( 'Project' )
				),
				'public' => true,
				'has_archive' => true,
			));
		}

		function register_taxonomies(){
			//this is where you can register custom taxonomies
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
							'required' => 1,
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
			$context['menu'] = new TimberMenu();
			$context['site'] = $this;
			return $context;
		}

		function add_to_twig($twig){
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
			return $twig;
		}

	}

	new StarterSite();

	function myfoo($text){
		$text .= ' bar!';
		return $text;
	}

<?php
// Register Some Libraries
if ( file_exists( get_template_directory() .'/inc/admin-init.php') ) {     
    require_once( get_template_directory() .'/inc/admin-init.php' );     
}

/* theme support - nav menu */
	add_action( 'init', 'lmd_register_menu' );
	
	function lmd_register_menu() {
		register_nav_menu( 'main-menu', 'Main Menu');
	}

	add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	
	add_theme_support('automatic-feed-links');
	add_theme_support( 'title-tag' ); 

	/* theme support - thumbnail */
	add_theme_support('post-thumbnails');
	add_image_size('posthumb', 1200, 800, 'true');

//Load some scripts and styles
function lmd_scripts_styles() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js');
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('bt_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
	wp_enqueue_script('custom_js',get_template_directory_uri() . '/js/lombokmedia.js', '', '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

	//CSS
	wp_enqueue_style('bt_css', get_template_directory_uri() . '/css/bootstrap.min.css', false ,'4.4.1');
	wp_enqueue_style('fa_css', get_template_directory_uri() . '/css/fontawesome.min.css', false ,'5.12.10');
	wp_enqueue_style('gfont_css', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap', false , '1.0');
	wp_enqueue_style('style_css', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'lmd_scripts_styles');

/* Set the content width based on the theme's design and stylesheet. */
	if ( ! isset( $content_width ) ) {
		$content_width = 780;
	}


/*** widget ***/
	if ( function_exists('register_sidebar') )
	{	
		register_sidebar(array(
			'name' => __( 'sidebar', 'lombokmedia' ),
			'id' => 'sidebar',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title h4">',
			'after_title' => '</h2>',
		));
	}

function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches[1][0];
  
	if(empty($first_img)) {
	  $first_img = get_template_directory_uri().'/img/default-thumbnail.jpg';
	}
	return $first_img;
  }

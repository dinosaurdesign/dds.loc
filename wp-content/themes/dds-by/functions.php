<?php
/**
 * dds.by functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dds.by
 */

if ( ! function_exists( 'dds_by_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dds_by_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dds.by, use a find and replace
		 * to change 'dds-by' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dds-by', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'       => esc_html__( 'Primary', 'dds-by' ),
			'top'          => esc_html__( 'top', 'dds-by' ),
			'footer_serv'  => esc_html__( 'Футер Услуги', 'dds-by' ),
			'footer_about' => esc_html__( 'Футер О нас', 'dds-by' ),
			'post_Footer'  => esc_html__( 'terms', 'dds-by' ),
		) );
		add_filter( 'nav_menu_css_class', 'nav_css_filter' );

		function nav_css_filter( $classes )
		{
			// Здесь добавить или убрать классы...
			return $classes;
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'dds_by_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'dds_by_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dds_by_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dds_by_content_width', 640 );
}

add_action( 'after_setup_theme', 'dds_by_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dds_by_widgets_init()
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dds-by' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dds-by' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'dds_by_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dds_by_scripts()
{
	wp_enqueue_style( 'dds-by-style', get_template_directory_uri() . '/css/style.css', array(), '15' );
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, null, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dds-by-main', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	if ( is_category( 'portfolio' ) )
	{
		wp_enqueue_script( 'dds-by-mixitup.js', get_template_directory_uri() . '/js/mixitup.min.js', array(), '20151215', true );
	}
}
add_action( 'widgets_init', 'true_remove_default_widget', 20 );
add_action( 'wp_enqueue_scripts', 'dds_by_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) )
{
	require get_template_directory() . '/inc/jetpack.php';
		/**
		 * Disable the emoji's
		 */
		add_action( 'init', 'disable_emojis' );
		function disable_emojis()
		{
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		}
		/**
		 * Filter function used to remove the tinymce emoji plugin.
		 *
		 * @param array $plugins
		 *
		 * @return   array             Difference betwen the two arrays
		 */
		function disable_emojis_tinymce( $plugins )
		{
			if ( is_array( $plugins ) )
			{
				return array_diff( $plugins, array( 'wpemoji' ) );
			} else
				{
				return array();

		}
	}
}

function page_excerpt()
{
	add_post_type_support('page', array('excerpt'));
}
add_action('init', 'page_excerpt');

## Отключаем Emojis в WordPress
	## отключаем DNS prefetch
	add_filter( 'emoji_svg_url', '__return_empty_string' );
	require get_template_directory() . '/f/f_remove.php';


////////////////////////////////////////////////////////////////////////////
////                          шалонизаця постов
///////////////////////////////////////////////////////////////////////////
add_filter( 'single_template', function ( $template ) {
	// Get the current single post object
	$post = get_queried_object();
	// Set our 'constant' folder path
	$path = 'template-parts/';

	// Set our variable to hold our templates
	$templates = [];

	// Lets handle the custom post type section
	if ( 'post' !== $post->post_type ) {
		$templates[] = $path . 'single-' . $post->post_type . '-' . $post->post_name . '.php';
		$templates[] = $path . 'single-' . $post->post_type . '.php';
	}

	// Lets handle the post post type stuff
	if ( 'post' === $post->post_type ) {
		// Get the post categories
		$categories = get_the_category( $post->ID );
		// Just for incase, check if we have categories
		if ( $categories ) {
			foreach ( $categories as $category ) {
				// Create possible template names
				$templates[] = $path . 'single-cat-' . $category->slug . '.php';
				$templates[] = $path . 'single-cat-' . $category->term_id . '.php';
			} //endforeach
		} //endif $categories
	} // endif

	// Set our fallback templates
	$templates[] = $path . 'single.php';
	$templates[] = $path . 'default.php';
	$templates[] = 'index.php';

	/**
	 * Now we can search for our templates and load the first one we find
	 * We will use the array ability of locate_template here
	 */
	$template = locate_template( $templates );

	// Return the template rteurned by locate_template
	return $template;
} );
//////////////////////////////////////////////////////////////////////////
//                          шалонизаця сраниц
/////////////////////////////////////////////////////////////////////////
// фильтр передает переменную $template - путь до файла шаблона.
// Изменяя этот путь мы изменяем файл шаблона.
add_filter( 'template_include', 'my_template' );
function my_template( $template )
{
	# аналог второго способа
	// если это страница со слагом portfolio, используем файл шаблона page-portfolio.php
	// используем условный тег is_page()
	if ( is_page( 'about' ) )
	{
		if ( $new_template = locate_template( array( '/template-parts/page-about.php' ) ) )
		{
			return $new_template;
		}
	}
	if ( is_page( 'contacts' ) )
	{
		if ( $new_template = locate_template( array( '/template-parts/page-contacts.php' ) ) )
		{
			return $new_template;
		}
	}

	# шаблон для группы рубрик
	// этот пример будет использовать файл из папки темы tpl_special-cats.php,
	// как шаблон для рубрик с ID 9, названием "Без рубрики" и слагом "php"
	if ( is_category( array( 9, 'services', 'php' ) ) )
	{
		return get_stylesheet_directory() . '/template-parts/category-service.php';
	}
	if ( is_category( array( 9, 'portfolio', 'php' ) ) )
	{
		return get_stylesheet_directory() . '/template-parts/category-portfolio.php';
	}

	return $template;
//
}

require get_template_directory() . '/f/f_breadcrumbs.php';

require get_template_directory() . '/f/f_thumbnail.php';

require get_template_directory() . '/f/f_samepost.php';

require get_template_directory() . '/f/f_order.php';


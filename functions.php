<?php
/**
 * drunk functions and definitions
 *
 * @package drunk
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
show_admin_bar(0);
if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}

if ( ! function_exists( 'drunk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function drunk_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on drunk, use a find and replace
	 * to change 'drunk' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'drunk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'drunk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'drunk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // drunk_setup
add_action( 'after_setup_theme', 'drunk_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function drunk_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'drunk' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'drunk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function drunk_scripts() {
	wp_enqueue_style( 'drunk-style', get_stylesheet_uri() );
	wp_enqueue_style( 'drunk-bs', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" );
	wp_enqueue_style( 'drunk-fa', "//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" );
	wp_enqueue_style( 'drunk-drunk', get_template_directory_uri()."/css/drunk.css",null,"1.0" );
	wp_enqueue_style( 'drunk-animate', "//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'drunk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'drunk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'drunk-wow', '//cdnjs.cloudflare.com/ajax/libs/wow/1.0.2/wow.min.js', array("jquery"), '20130115', true );
	wp_enqueue_script( 'drunk-ss', get_template_directory_uri()."/js/jquery.smoothState.js", array("jquery"), '20141202', true );
	wp_enqueue_script( 'drunk-bigslide', get_template_directory_uri()."/js/bigSlide.js", array("jquery"), '20130115', true );
	wp_enqueue_script( 'drunk-ns', "//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.5.1/jquery.nicescroll.min.js", array("jquery"), '20130115', true );
	wp_enqueue_script( 'drunk-main', get_template_directory_uri()."/js/drunk.js", array("jquery"), '20141202.4', true );
	wp_localize_script( 'drunk-main',"data",array("url"=>site_url("/")) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    if(class_exists("themePacific_Jetpack_Tiled_Gallery")){
        $gallery = new themePacific_Jetpack_Tiled_Gallery;
        $gallery->default_scripts_and_styles();

    }


}
add_action( 'wp_enqueue_scripts', 'drunk_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

// Hooks your functions into the correct filters
function my_add_mce_button() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'my_register_mce_button' );
    }
}
add_action('admin_head', 'my_add_mce_button');

// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['my_mce_button'] = get_template_directory_uri() .'/js/mce-button.js';
    return $plugin_array;
}

// Register new button in the editor
function my_register_mce_button( $buttons ) {
    array_push( $buttons, 'my_mce_button' );
    return $buttons;
}

function sayHello(){
    ?>
    <h2>Hello World</h2>
    <p>Hello Hello, Where is everyone</p>
    <input id="hello" type="text"/>
    <button id="myb">Click Me</button>

    <script type="text/javascript">
        ;(function($){
            //alert("I am loaded");
            $("#myb").on("click",function(){
                tinyMCE.activeEditor.insertContent('WPExplorer.com is Awesome! ' + $("#hello").val());
                tb_remove();
            })
        })(jQuery);
    </script>
    <?php
    die("");
}



add_action("wp_ajax_popup","sayHello");
add_action("wp_ajax_nopriv_popup","sayHello");
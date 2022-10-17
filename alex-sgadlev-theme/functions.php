<?php
/**
 * alex-sgadlev-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alex-sgadlev-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


/* Constant */
define( 'THEME_URI', get_template_directory_uri()  );
define( 'THEME_NAME', 'alex-sgadlev-theme'  );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alex_sgadlev_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on alex-sgadlev-theme, use a find and replace
		* to change 'alex-sgadlev-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'alex-sgadlev-theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'alex-sgadlev-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'alex_sgadlev_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'alex_sgadlev_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alex_sgadlev_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'alex_sgadlev_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'alex_sgadlev_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alex_sgadlev_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'alex-sgadlev-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'alex-sgadlev-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'alex_sgadlev_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alex_sgadlev_theme_scripts() {
	wp_enqueue_style( 'alex-sgadlev-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'alex-sgadlev-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'alex-sgadlev-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alex_sgadlev_theme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





// Add files
function my_scripts_and_css(){

	// scripts
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', THEME_URI . '/js/jquery.min.js');
	wp_enqueue_script( 'jquery' );


	wp_register_script( 'jquery-migrate', THEME_URI . '/js/jquery-migrate.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'jquery.inputmask', THEME_URI . '/js/jquery.inputmask.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'bootstrap', THEME_URI . '/js/bootstrap.min.js', array( 'jquery', 'slick' ), '', true );
	wp_register_script( 'customizer', THEME_URI . '/js/customizer.js', array( 'jquery', 'jquery.inputmask' ), '', true );
	wp_register_script( 'slick', THEME_URI . '/js/slick.js', array( 'jquery', 'jquery-migrate' ), '', true );	


	wp_enqueue_script( 'jquery-migrate' );
	wp_enqueue_script( 'jquery.inputmask' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'customizer' );
	wp_enqueue_script( 'slick' );


	// style
	wp_register_style( 'bootstrap',  THEME_URI . '/css/bootstrap.min.css');
	wp_register_style( 'slick',  THEME_URI . '/css/slick.css');
	wp_register_style( 'slick-theme',  THEME_URI . '/css/slick-theme.css');
	
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'slick-theme' );

	if(is_front_page()){
		wp_register_style( 'front-page',  THEME_URI . '/css/front-page.css');
		wp_enqueue_style( 'front-page' );
	}


}
add_action( 'wp_enqueue_scripts', 'my_scripts_and_css' );





// Add title
function alex_sgadlev_theme_before_content(){

	if( is_front_page() || is_home() ){
		return;
	}
	echo '<header class="entry-header">' . the_title( '<h1 class="entry-title">', '</h1>' ) . '</header>';
}




// Review main page
add_action('after_main_page', 'review_main_page');
function review_main_page(){

	add_action( 'comment_form_top', 'ci_comment_rating_rating_field' );


	add_filter( 'comment_form_submit_field', 
	function ( $submit_field ) {
		return $submit_field . '</div>';
	});

	?>

	<section id="reviews" class="container-section">
		<div class="container">
			<h2 class="title"><?php _e('Reviews', THEME_NAME) ?></h2>

	<?php

		$args_comments = array(
			'number'  => 5,
			'post_id'  => get_option('page_on_front'),
			'post__in'  => get_option('page_on_front'),
			'status'  => 'approve',
			'orderby' => 'comment_date',
			'order'   => 'DESC',
			'type'    => '',
			'hierarchical'=> false,
		);



		if( $comments = get_comments( $args_comments ) ){

				?>
				<section class="regular slider">
						
							<?php
							
							foreach( $comments as $comment ){
								$comm_link = get_comment_link( $comment->comment_ID );
								$a = strip_tags($comment->comment_author);
								$comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0, 50 ) .'...';
								echo '<div>';
								echo '<p class="comment-author">' . $a . '</p>';
								echo ci_comment_rating_display_rating($comment->comment_ID);
								echo '<p class="comment-content">' . $comm_short_txt . '</p>';
								echo '</div>';
							}
								
							?>
								
				
				</section>
				

			
				<?php
				
		}



			comment_form( $args = array('title_reply' => __('Add review', THEME_NAME),		
			'fields' => apply_filters('comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' .  ($req ? '<span>*</span>' : '') .
					'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . 'placeholder="' . __('Name', THEME_NAME) . '" /></p>',
				'email' => '<p class="comment-form-email">' .
					($req ? '<span>*</span>' : '') .
					'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . 'placeholder="' . __('Email', THEME_NAME) . '" />' . '</p>',
				'url' => '')),
			'comment_notes_after' => '',), $post_id = get_option('page_on_front') );

			//var_dump(get_the_ID());

			//comment_form($args = array(), $post_id = get_option('page_on_front'));

		

		?>

		</div>
	</section>

	<?php

}

// Create the rating interface.
function ci_comment_rating_rating_field () {
	?>
	<label for="rating">Rating<span class="required">*</span></label>
	<fieldset class="comments-rating">
		<span class="rating-container">
			<?php for ( $i = 5; $i >= 1; $i-- ) : ?>
				<input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"></label>
			<?php endfor; ?>
			<input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0"></label>
		</span>
	</fieldset><div class="comment-fiel-block">
	<?php
}
// Save the rating submitted by the user.
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
	if ( ( isset( $_POST['rating'] ) ) && ( '' !== $_POST['rating'] ) )
	$rating = intval( $_POST['rating'] );
	add_comment_meta( $comment_id, 'rating', $rating );
}
// Make the rating required.
add_filter( 'preprocess_comment', 'ci_comment_rating_require_rating' );
function ci_comment_rating_require_rating( $commentdata ) {
	if ( ! is_admin() && ( ! isset( $_POST['rating'] ) || 0 === intval( $_POST['rating'] ) ) )
	wp_die( __( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.' ) );
	return $commentdata;
}
// Display the rating on a submitted comment.
function ci_comment_rating_display_rating( $comment ){

	if ( $rating = get_comment_meta( $comment, 'rating', true ) ) {
		$stars = '<p class="stars">';
		for ( $i = 1; $i <= $rating; $i++ ) {
			$stars .= '<span class="dashicons dashicons-star-filled"></span>';
		}
		$stars .= '</p>';
		$comment_text = $comment_text . $stars;
		return $comment_text;
	} else {
		return $comment_text;
	}
}
// Textarea placeholder
add_filter( 'comment_form_defaults', 'gm_textarea_placeholder' );
function gm_textarea_placeholder( $fields ) {
    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="' . __('Review', THEME_NAME) . '"',
        $fields['comment_field']
    );

	return $fields;
}




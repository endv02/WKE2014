	<?php
/**
 * WKE2014 Theme Optionen
 *
 * @source http://github.com/RRZE-Webteam/WKE2014
 * @creator xwolf
 * @version 1.0
 * @licence GPL
 */
	
	

require( get_template_directory() . '/inc/constants.php' );
$options = get_option('wke2014_theme_options');
$options = wke2014_compatibility($options);

// ** bw 2012-08-12 wordpress reverse proxy x-forwarded-for ip fix ** //
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $xffaddrs = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
  $_SERVER['REMOTE_ADDR'] = $xffaddrs[0];
}    

      

if ( ! isset( $content_width ) )   $content_width = $defaultoptions['content-width'];
require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'after_setup_theme', 'wke2014_setup' );

if ( ! function_exists( 'wke2014_setup' ) ):
function wke2014_setup() {
     global $defaultoptions;
     global $options;
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();
        // This theme uses post thumbnails
        add_theme_support( 'post-thumbnails' );
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
               
	if (isset($options['aktiv-basemod_blau']) && ($options['aktiv-basemod_blau']==1)) {
	    $logo = $defaultoptions['logo_blau'];
	} else {	
	    $logo = $defaultoptions['logo_gruen'];
	}
        $args = array(
            'width'         => 0,
            'height'        => 0,
            'default-image' => $logo,
            'uploads'       => true,
            'random-default' => false,                      
            'flex-height' => true,
            'flex-width' => true,
	    'header-text'   => false,
            'suggested-height' => $defaultoptions['logo-height'],
            'suggested-width' => $defaultoptions['logo-width'],
            'max-width' => 350,           
        );
       add_theme_support( 'custom-header', $args );
               
       $args = array(
	    'default-color' => $defaultoptions['background-header-color'],
	    'default-image' => $defaultoptions['background-header-image'],
	    'background_repeat'	=> 'repeat-x',
	    'background_position_x'  => 'left',
	    'background_position_y'  => 'bottom',
	    'wp-head-callback'       => 'wke2014_custom_background_cb',	
	);
       
	/**
	 * wke2014 custom background callback.
	 *
	 */
	function wke2014_custom_background_cb() {
                 global $defaultoptions;
                 global $options;
	        // $background is the saved custom image, or the default image.
	        $background = set_url_scheme( get_background_image() );
	
	        // $color is the saved custom color.
	        // A default has to be specified in style.css. It will not be printed here.
	        $color = get_theme_mod( 'background_color' );
	
	        if ( ! $background && ! $color )
	                return;
                        
	        $style = $color ? "background-color: #$color;" : '';
	
	        if ( $background ) {
                        $image = " background-image: url('$background');";
                       
                       
	                $repeat = get_theme_mod( 'background_repeat', 'repeat-x' );
	                if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
	                        $repeat = 'repeat-x';
	                $repeat = " background-repeat: $repeat;";
	
	                $positionx = get_theme_mod( 'background_position_x', 'left' );
	                if ( ! in_array( $positionx, array( 'center', 'right', 'left' ) ) )
	                        $positionx = 'left';
	                $positiony = get_theme_mod( 'background_position_y', 'bottom' );
	                if ( ! in_array( $positiony, array( 'top', 'bottom' ) ) )
	                        $positiony = 'bottom';
			
	                $position = " background-position: $positionx $positiony;";
	
	                $attachment = get_theme_mod( 'background_attachment', 'scroll' );
	                if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
	                        $attachment = 'scroll';
	                $attachment = " background-attachment: $attachment;";
	
	                $style .= $image . $repeat . $position . $attachment;
	        } 
		
	    
	    echo '<style type="text/css" id="custom-background-css">';
	    echo '.header { '.trim( $style ).' } ';
	    echo '</style>';
	}       
       
	add_theme_support( 'custom-background', $args );
       
	if ( function_exists( 'add_theme_support' ) ) {
	    add_theme_support( 'post-thumbnails' );
	    set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
	}

	if ( function_exists( 'add_image_size' ) ) { 
	    add_image_size( 'teaser-thumb', $options['teaser-thumbnail_width'], $options['teaser-thumbnail_height'], $options['teaser-thumbnail_crop'] ); //300 pixels wide (and unlimited height)
	}
	
        
        // Make theme available for translation
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain('wke2014', get_template_directory() . '/languages');
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if ( is_readable( $locale_file ) )
                require_once( $locale_file );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
                'primary'	=> __( 'Hauptnavigation', 'wke2014' ),
        //        'targetmenu'	=> __( 'Zielgruppenmenu', 'wke2014' ),
                'tecmenu'	=> __( 'Technische Navigation (Kontakt, Impressum, etc)', 'wke2014' ),
        ) );


       if ($options['login_errors']==0) {
        /** Abschalten von Fehlermeldungen auf der Loginseite */      
           add_filter('login_errors', create_function('$a', "return null;"));
       }        
        /** Entfernen der Wordpressversionsnr im Header */
        remove_action('wp_head', 'wp_generator');
	
	/* Zulassen von Shortcodes in Widgets */
	add_filter('widget_text', 'do_shortcode');
}
endif;

require( get_template_directory() . '/inc/widgets.php' );

/* 
function wke2014_scripts() {
    global $options;
    global $defaultoptions;


    wp_enqueue_script(
		'layoutjs',
		$defaultoptions['src-layoutjs'],
		array('jquery'),
                $defaultoptions['js-version']
	);
 
    if (is_singular() && ($options['aktiv-commentreplylink']==1) && get_option( 'thread_comments' )) {        
            wp_enqueue_script(
		'comment-reply',
		$defaultoptions['src-comment-reply'],
		false,
                $defaultoptions['js-version']
	);  
     }        
   
                   
}
add_action('wp_enqueue_scripts', 'wke2014_scripts');
*/



/* Refuse spam-comments on media */
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

	


function wke2014_compatibility ($oldoptions) {
    global $defaultoptions;
   
    if (!is_array($oldoptions)) {
	$oldoptions = array();
    }
    $newoptions = array_merge($defaultoptions,$oldoptions);	
   

    return $newoptions;
}

if ( ! function_exists( 'get_wke2014_options' ) ) :
/*
 * Erstes Bild aus einem Artikel auslesen, wenn dies vorhanden ist
 */
function get_wke2014_options( $field ){
    global $defaultoptions;	    
    if (!isset($field)) {
	$field = 'wke2014_theme_options';
    }
    $orig = get_option($field);
    if (!is_array($orig)) {
        $orig=array();
    }
    $alloptions = array_merge( $defaultoptions, $orig  );	
    return $alloptions;
}
endif;



/*
 * Adds optional styles in header
 */
function wke2014_add_basemod_styles() {
    global $options;
    
    if ( !is_admin() ) { 
	$theme  = wp_get_theme();
	wp_register_style( 'wke2014', get_bloginfo( 'stylesheet_url' ), false, $theme['Version'] );
	wp_enqueue_style( 'wke2014' );
    }    
    if ((isset($options['aktiv-basemod_zusatzinfo'])) && ($options['aktiv-basemod_zusatzinfo']==1)) {
	wp_enqueue_style( 'basemod_zusatzinfo', $options['src_basemod_zusatzinfo'] );
    }
     if ((isset($options['aktiv-basemod_links'])) && ($options['aktiv-basemod_links']==1)) {
	wp_enqueue_style( 'basemod_links', $options['src_basemod_links'] );
    }
     if ((isset($options['aktiv-basemod_sidebar'])) && ($options['aktiv-basemod_sidebar']==1)) {
	wp_enqueue_style( 'basemod_sidebar', $options['src_basemod_sidebar'] );
    }
      if ((isset($options['aktiv-basemod_blau'])) && ($options['aktiv-basemod_blau']==1)) {
	wp_enqueue_style( 'basemod_blau', $options['src_basemod_blau'] );
	
    }
     if ((isset($options['aktiv-socialmediabuttons'])) && ($options['aktiv-socialmediabuttons']==1)) {
	wp_enqueue_style( 'basemod_socialmediabuttons', $options['src_socialmediabuttons'] );
	
    }
   
    
    
}
add_action( 'wp_enqueue_scripts', 'wke2014_add_basemod_styles' );

function wke2014_admin_head() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/admin.css" />'; 
}
add_action('admin_head', 'wke2014_admin_head');



/*
 * Breadcrumb
 */

function wke2014_breadcrumbs() {
  global $defaultoptions;
  global $options;
  $delimiter = '<img width="20" height="9" alt=" &raquo; " src="'.$defaultoptions['src-breadcrumb-image'].'">';
  $home = $options['text-startseite']; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 

    global $post;
    $homeLink = home_url('/');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . __( 'Artikel der Kategorie ', 'wke2014' ). '"' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && !is_search() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ') ) ? '' : $cat_parents;
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . __( 'Suche nach ', 'wke2014' ).'"' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . __( 'Artikel mit Schlagwort ', 'wke2014' ). '"' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . __( 'Artikel von ', 'wke2014' ). $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . '404' . $after;
    }
 /*
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'wke2014') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 */
  } elseif (is_home() || is_front_page()) {
      echo $before .$home. $after;
  }
  
}

function wke2014_contenttitle () {
     global $defaultoptions;
     global $options;
  $before = ''; 
  $after = ''; 
 $delimiter = ': ';
   $home = $options['text-startseite']; // text for the 'Home' link

  if ( !is_home() && !is_front_page() || is_paged() ) {
    global $post;
    $homeLink = home_url('/');
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . __( 'Artikel der Kategorie ', 'wke2014' ). '"' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_day() ) {
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
        echo $before . get_the_title() . $after;
    } elseif ( !is_single() && !is_page() && !is_search() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after; 
    } elseif ( is_attachment() ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      echo $before . get_the_title() . $after; 
    } elseif ( is_search() ) {
      echo $before . __( 'Suche nach ', 'wke2014' ).'"' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . __( 'Artikel mit Schlagwort ', 'wke2014' ). '"' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . __( 'Artikel von ', 'wke2014' ). $userdata->display_name . $after;
    } elseif ( is_404() ) {
      echo $before . '404' . $after;
    } else {
	 echo $before . get_the_title() . $after;
    }
  } elseif (is_home() || is_front_page()) {
      echo $before .$home. $after;
  }
}

if ( ! function_exists( 'wke2014_filter_wp_title' ) ) :   
/*
 * Sets the title
 */    
function wke2014_filter_wp_title( $title, $separator ) {
        // Don't affect wp_title() calls in feeds.
        if ( is_feed() )
                return $title;

        // The $paged global variable contains the page number of a listing of posts.
        // The $page global variable contains the page number of a single post that is paged.
        // We'll display whichever one applies, if we're not looking at the first page.
        global $paged, $page;

        if ( is_search() ) {
                // If we're a search, let's start over:
                $title = sprintf( __( 'Suchergebnisse f&uuml;r %s', 'wke2014' ), '"' . get_search_query() . '"' );
                // Add a page number if we're on page 2 or more:
                if ( $paged >= 2 )
                        $title .= " $separator " . sprintf( __( 'Seite %s', 'wke2014' ), $paged );
                // Add the site name to the end:
                $title .= " $separator " . get_bloginfo( 'name', 'display' );
                // We're done. Let's send the new title back to wp_title():
                return $title;
        }

        // Otherwise, let's start by adding the site name to the end:
        $title .= get_bloginfo( 'name', 'display' );

        // If we have a site description and we're on the home/front page, add the description:
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
                $title .= " $separator " . $site_description;

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
                $title .= " $separator " . sprintf( __( 'Seite %s', 'wke2014' ), max( $paged, $page ) );

        // Return the new title to wp_title():
        return $title;
}
endif;
add_filter( 'wp_title', 'wke2014_filter_wp_title', 10, 2 );




function wke2014_excerpt_length( $length ) {
	global $defaultoptions;
        return $defaultoptions['teaser_maxlength'];
}
add_filter( 'excerpt_length', 'wke2014_excerpt_length' );

function wke2014_continue_reading_link() {
        return ' <a class="nobr weiter" title="'.strip_tags(get_the_title()).'" href="'. get_permalink() . '">' . __( 'Weiterlesen <span class="meta-nav">&rarr;</span>', 'wke2014' ) . '</a>';
}

function wke2014_auto_excerpt_more( $more ) {
        return ' &hellip;' . wke2014_continue_reading_link();
}
add_filter( 'excerpt_more', 'wke2014_auto_excerpt_more' );


function wke2014_custom_excerpt_more( $output ) {
       if ( has_excerpt() && ! is_attachment() ) {      
                $output .= wke2014_continue_reading_link();
        }
        return $output;
}
add_filter( 'get_the_excerpt', 'wke2014_custom_excerpt_more' );



function wke2014_remove_gallery_css( $css ) {
        return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'wke2014_remove_gallery_css' );


if ( ! function_exists( 'wke2014_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function wke2014_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        global $defaultoptions;
        global $options;         
        
        switch ( $comment->comment_type ) :
                case '' :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>">
                <div class="comment-details">
                    
                <div class="comment-author vcard">
                    <?php printf( __( '%s <span class="says">meinte am</span>', 'wke2014' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); 
                    ?>
                </div><!-- .comment-author .vcard -->
                <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Der Kommentar wartet auf die Freischaltung.', 'wke2014' ); ?></em>
                        <br />
                <?php endif; ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                   <?php
                          /* translators: 1: date, 2: time */
                       printf( __( '%1$s um %2$s', 'wke2014' ), get_comment_date(),  get_comment_time() ); ?></a> Folgendes:<?php edit_comment_link( __( '(Edit)', 'wke2014' ), ' ' );
                    ?>
                </div><!-- .comment-meta .commentmetadata -->
                </div>

                <div class="comment-body"><?php comment_text(); ?></div>
                <?php if ($options['aktiv-commentreplylink']) { ?>
                <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>                       
                </div> <!-- .reply -->
                <?php } ?>


        </div><!-- #comment-##  -->

        <?php
                        break;
                case 'pingback'  :
                case 'trackback' :
        ?>
        <li class="post pingback">
                <p><?php _e( 'Pingback:', 'wke2014' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'wke2014'), ' ' ); ?></p>
        <?php
                        break;
        endswitch;
}
endif;



function wke2014_remove_recent_comments_style() {
        global $wp_widget_factory;
        remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'wke2014_remove_recent_comments_style' );



if ( ! function_exists( 'wke2014_post_teaser' ) ) :
/**
 * Erstellung eines Artikelteasers
 */
function wke2014_post_teaser($titleup = 1, $showdatebox = 1, $showdateline = 0, $teaserlength = 200, $thumbfallback = 1, $usefloating = 0) {
  global $options;
  global $post;
   
  $sizeclass='';
  $leftbox = '';
  if ($showdatebox==0) {
      $showdatebox=1;
  }
  if ($showdatebox!=5) {
       $sizeclass = 'ym-column withthumb';      
       // Generate Thumb/Pic or Video first to find out which class we need
       
     
	    $leftbox .=  '<div class="infoimage">';	    
	    $sizeclass = 'ym-column withthumb'; 
	    $thumbnailcode = '';	
	    $firstpic = '';
	    $firstvideo = '';
	    if (has_post_thumbnail()) {
		$thumbnailcode = get_the_post_thumbnail($post->ID, 'teaser-thumb');
	    }
		   
		$firstpic = get_wke2014_firstpicture();
		$firstvideo = get_wke2014_firstvideo();
		$fallbackimg = '<img src="'.$options['src-teaser-thumbnail_default'].'" alt="">';
		$output = '';
		if ($showdatebox==1) {
		    if ((isset($thumbnailcode)) && (strlen(trim($thumbnailcode))>10)) {
			$output = $thumbnailcode;
		    } elseif ((isset($firstpic)) && (strlen(trim($firstpic))>10)) {
			$output = $firstpic;
		    }  elseif ((isset($firstvideo)) && (strlen(trim($firstvideo))>10)) {
			$output = $firstvideo; $sizeclass = 'ym-column withvideo';
		    } else {
			$output = $fallbackimg;
		    }
	    
		} elseif ($showdatebox==2) {

		    if ((isset($firstpic)) && (strlen(trim($firstpic))>10)) {
			$output = $firstpic;		    
		    } elseif ((isset($thumbnailcode)) && (strlen(trim($thumbnailcode))>10)) {
			$output = $thumbnailcode;
		    }  elseif ((isset($firstvideo)) && (strlen(trim($firstvideo))>10)) {
			$output = $firstvideo; $sizeclass = 'ym-column withvideo';
		    } else {
			$output = $fallbackimg;
		    }
			    		    
		} elseif ($showdatebox==3) {
		    if ((isset($firstvideo)) && (strlen(trim($firstvideo))>10)) {
			$output = $firstvideo; $sizeclass = 'ym-column withvideo';		    	    
		    } elseif ((isset($thumbnailcode)) && (strlen(trim($thumbnailcode))>10)) {
			$output = $thumbnailcode;
		    } elseif ((isset($firstpic)) && (strlen(trim($firstpic))>10)) {
			$output = $firstpic;	
		    } else {
			$output = $fallbackimg;
		    }
		    		    
		    
		} elseif ($showdatebox==4) {
		    if ((isset($firstvideo)) && (strlen(trim($firstvideo))>10)) {
			$output = $firstvideo; $sizeclass = 'ym-column withvideo';		    	    
		    } elseif ((isset($firstpic)) && (strlen(trim($firstpic))>10)) {
			$output = $firstpic;			
		    } elseif ((isset($thumbnailcode)) && (strlen(trim($thumbnailcode))>10)) {
			$output = $thumbnailcode;		    
		    } else {
			$output = $fallbackimg;
		    }
		    		
		} else {
		    $output = $fallbackimg; 
		}	
	   
    	    
	    $leftbox .= $output;
	    $leftbox .=  '</div>'; 
  } else {
       $sizeclass = 'ym-column';
  }
  if ($usefloating==1) {
      $sizeclass .= " usefloating";
  }
  ?> 
  <div <?php post_class($sizeclass); ?> id="post-<?php the_ID(); ?>" >
    <?php 
        
     if ($titleup==1) { ?>
        <div class="post-title ym-cbox"><h2>          
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
	</h2></div>       
       <div class="ym-column"> 
     <?php }	
   /* 
	 * 1 = Thumbnail (or: first picture, first video, fallback picture),
	 * 2 = First picture (or: thumbnail, first video, fallback picture),
	 * 3 = First video (or: thumbnail, first picture, fallback picture),
	 * 4 = First video (or: first picture, thumbnail, fallback picture),
	 * 5 = Nothing */
     
    if ($showdatebox<5) { 
	    echo '<div class="post-info ym-col1"><div class="ym-cbox">';
		
            echo $leftbox;
             
            echo '</div></div>';
            echo '<div class="post-entry ym-col3">';
            echo '<div class="ym-cbox';
            if ($usefloating==0) { echo ' ym-clearfix'; }
            echo '">';	
	} else {
	     echo '<div class="post-entry ym-cbox">';
	}
	if ($titleup==0) { ?>       
	    <div class="post-title"><h2>          
	        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
	          <?php the_title(); ?>
                </a>
	    </h2></div>
	 <?php }
	  
	 if ($showdateline==1) { ?>
	    <p class="pubdateinfo"><?php wke2014_post_pubdateinfo(0); ?></p>	  	  
	 <?php }
	   
	 echo get_wke2014_custom_excerpt($teaserlength); ?>     
	 <?php if ($showdatebox<5) {	?>  
            </div>    	
            <div class="ym-ie-clearing">&nbsp;</div>	
	<?php } ?>
    </div>
    
    <?php if ($titleup==1) { echo '</div>'; }       
    echo '</div>'; 

}
endif;





if ( ! function_exists( 'wke2014_post_pubdateinfo' ) ) :
/**
 * Fusszeile unter Artikeln: Ver&ouml;ffentlichungsdatum
 */
function wke2014_post_pubdateinfo($withtext = 1) {
    if ($withtext==1) {
	echo '<span class="meta-prep">';
        echo __('Ver&ouml;ffentlicht am', 'wke2014' );
	echo '</span> ';
    }
    printf('%1$s',
                sprintf( '<span class="entry-date">%1$s</span>',
                        get_the_date()
                )
        );
}
endif;

if ( ! function_exists( 'wke2014_post_autorinfo' ) ) :
/**
 * Fusszeile unter Artikeln: Autorinfo
 */
function wke2014_post_autorinfo() {
        printf( __( ' <span class="meta-prep-author">von</span> %1$s ', 'wke2014' ),               
                sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span> ',
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        sprintf( esc_attr__( 'Artikel von %s', 'wke2014' ), get_the_author() ),
                        get_the_author()
                )
        );
}
endif;

if ( ! function_exists( 'wke2014_post_taxonominfo' ) ) :
/**
 * Fusszeile unter Artikeln: Taxonomie
 */
function wke2014_post_taxonominfo() {
         $tag_list = get_the_tag_list( '', ', ' );
        if ( $tag_list ) {
                $posted_in = __( 'unter %1$s und tagged %2$s. <br>Hier der permanente <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Link</a> zu diesem Artikel.', 'wke2014' );
        } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
                $posted_in = __( 'unter %1$s. <br><a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permanenter Link</a> zu diesem Artikel.', 'wke2014' );
        } else {
                $posted_in = __( '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permanenter Link</a> zu diesem Artikel.', 'wke2014' );
        }
        // Prints the string, replacing the placeholders.
        printf(
                $posted_in,
                get_the_category_list( ', ' ),
                $tag_list,
                get_permalink(),
                the_title_attribute( 'echo=0' )
        );
}
endif;

// this function initializes the iframe elements 
// maybe wont work on multisite installations. please use plugins instead.
function wke2014_change_mce_options($initArray) {
    $ext = 'iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
    if ( isset( $initArray['extended_valid_elements'] ) ) {
        $initArray['extended_valid_elements'] .= ',' . $ext;
    } else {
        $initArray['extended_valid_elements'] = $ext;
    }
    // maybe; set tiny paramter verify_html
    $initArray['verify_html'] = false;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'wke2014_change_mce_options');

if ( ! function_exists( 'get_wke2014_firstpicture' ) ) :
/*
 * Erstes Bild aus einem Artikel auslesen, wenn dies vorhanden ist
 */
function get_wke2014_firstpicture(){
    global $post;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $matches = array();
    preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
   if ((is_array($matches)) && (isset($matches[1]))) {
        $first_img = $matches[1];
        if (!empty($first_img)){
            $site_link =  home_url();  
            $first_img = preg_replace("%$site_link%i",'', $first_img); 
            $imagehtml = '<img src="'.$first_img.'" alt="" >';
            return $imagehtml;    
        }
    }
}
endif;


if ( ! function_exists( 'get_wke2014_firstvideo' ) ) :
/*
 * Erstes Bild aus einem Artikel auslesen, wenn dies vorhanden ist
 */
function get_wke2014_firstvideo($width = 300, $height = 169, $nocookie =1, $searchplain =1){
    global $post;
    ob_start();
    ob_end_clean();
    $matches = array();
    preg_match('/src="([^\'"]*www\.youtube[^\'"]+)/i', $post->post_content, $matches);
    if ((is_array($matches)) && (isset($matches[1]))) {
        $entry = $matches[1];	
        if (!empty($entry)){
	    if ($nocookie==1) {
		$entry = preg_replace('/youtube.com\/watch\?v=/','youtube-nocookie.com/embed/',$entry);
	    }
            $htmlout = '<iframe width="'.$width.'" height="'.$height.'" src="'.$entry.'" allowfullscreen></iframe>';
            return $htmlout;    
        }
    }
    // Schau noch nach YouTube-URLs die Plain im text sind. Hilfreich fuer
    // Installationen auf Multisite ohne iFrame-Unterstützung
    if ($searchplain==1) {
       preg_match('/\b(https?:\/\/www\.youtube[\/a-z0-9\.\-\?=]+)/i', $post->post_content, $matches);
        if ((is_array($matches)) && (isset($matches[1]))) {
            $entry = $matches[1];	
            if (!empty($entry)){
                if ($nocookie==1) {
                    $entry = preg_replace('/youtube.com\/watch\?v=/','youtube-nocookie.com/embed/',$entry);
                }
                $htmlout = '<iframe width="'.$width.'" height="'.$height.'" src="'.$entry.'" allowfullscreen></iframe>';
                return $htmlout;    
            }
         }  
    }
   return;
}
endif;

if ( ! function_exists( 'get_wke2014_custom_excerpt' ) ) :
/*
 * Erstellen des Extracts
 */
function get_wke2014_custom_excerpt($length = 0, $continuenextline = 1, $removeyoutube = 1){
  global $options;
  global $post;
      
  if (has_excerpt()) {
      return  get_the_excerpt();
  } else {
      $excerpt = get_the_content();
       if (!isset($excerpt)) {
          $excerpt = __( 'Kein Inhalt', 'wke2014' );
        }
  }
  if ($length==0) {
      $length = $options['teaser_maxlength'];
  }
  if ($removeyoutube==1) {
   $excerpt = preg_replace('/^\s*([^\'"]*www\.youtube[\/a-z0-9\.\-\?=]+)/i','',$excerpt);
   // preg_match('/^\s*([^\'"]*www\.youtube[\/a-z0-9\.\-\?=]+)/i', $excerpt, $matches);
  }
  
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt); 
  if (mb_strlen($excerpt)<5) {
      $excerpt = __( 'Kein Inhalt', 'wke2014' );
  }

  if (mb_strlen($excerpt) >  $length) {
    $the_str = mb_substr($excerpt, 0, $length);
    $the_str .= "...";
  }  else {
      $the_str = $excerpt;
  }
  $the_str = '<p>'.$the_str;
  if ($continuenextline==1) {
      $the_str .= '<br>';
  }
  $the_str .= wke2014_continue_reading_link();
  $the_str .= '</p>';
  return $the_str;
}
endif;


if ( ! function_exists( 'get_wke2014_anmeldebuttons' ) ) :
/**
 * Displays Anmeldebutton
 */
function get_wke2014_anmeldebuttons() {
      global $options;
      if (isset($options['aktiv-buttons']) && ($options['aktiv-buttons']==1)) {
	  if (isset($options['aktiv-anmeldebutton']) && ($options['aktiv-anmeldebutton']==1)
              && isset($options['url-anmeldebutton']) ) {
	      echo '<a href="'.$options['url-anmeldebutton'].'" class="button breit gross '.$options['color-anmeldebutton'].'">'.$options['title-anmeldebutton'].'</a>';
	      echo "\n";
	   }
      
	  if (isset($options['aktiv-cfpbutton']) && ($options['aktiv-cfpbutton']==1)
              && isset($options['url-cfpbutton']) ) {
	      echo '<a href="'.$options['url-cfpbutton'].'" class="button breit gross '.$options['color-cfpbutton'].'">'.$options['title-cfpbutton'].'</a>';
	      echo "\n";
	   }
      }
}
endif;

if ( ! function_exists( 'get_wke2014_socialmediaicons' ) ) :
/**
 * Displays Social Media Icons
 */
function get_wke2014_socialmediaicons() {
    global $options;
    global $default_socialmedia_liste;
    $zeigeoption = $options['aktiv-socialmediabuttons'];
    
    if ($zeigeoption != 1) {
	return;
    }
    $result = '';
    $links = '';
    $result .= '<div class="socialmedia_iconbar">';
    $result .=  '<ul class="socialmedia">';       
    foreach ( $default_socialmedia_liste as $entry => $listdata ) {                
        $value = '';
        $active = 0;
        if (isset($options['sm-list'][$entry]['content'])) {
                $value = $options['sm-list'][$entry]['content'];
        } else {
                $value = $default_socialmedia_liste[$entry]['content'];
         }
         if (isset($options['sm-list'][$entry]['active'])) {
                $active = $options['sm-list'][$entry]['active'];
        }        
        if (($active ==1) && ($value)) {
            $links .= '<li><a class="icon_'.$entry.'" href="'.$value.'">';
            $links .=  $listdata['name'].'</a></li>';
	    $links .= "\n";
        }
    }
    
    if (strlen($links) > 1) {
	$result .= $links;
	$result .= '</ul>';
	$result .= '</div>';	
	echo $result;
    } else {
	return;
    }

    
}
endif;


if ( ! function_exists( 'short_title' ) ) :
/*
 * Erstellen des Kurztitels
 */
function short_title($after = '...', $length = 6, $textlen = 10) {
   $thistitle =   get_the_title();  
   $mytitle = explode(' ', get_the_title());
   if ((count($mytitle)>$length) || (mb_strlen($thistitle)> $textlen)) {
       while(((count($mytitle)>$length) || (mb_strlen($thistitle)> $textlen)) && (count($mytitle)>1)) {
           array_pop($mytitle);
           $thistitle = implode(" ",$mytitle);           
       }       
       $morewords = 1;
   } else {              
       $morewords = 0;
   }
   if (mb_strlen($thistitle)> $textlen) {
      $thistitle = mb_substr($thistitle, 0, $textlen);
      $morewords = 1;     
   }
   if ($morewords==1) {
       $thistitle .= $after;
   }   
   return $thistitle;
}
endif;



class My_Walker_Nav_Menu extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    public function start_el( &$output, $item, $depth, $args ) {
        if ( '-' === $item->title )
        {
            // you may remove the <hr> here and use plain CSS.
            $output .= '<li class="menu_separator"><hr>';
        } else{
            parent::start_el( $output, $item, $depth, $args );
        }
    }
    /* Klasse has_children einfuegen */
    public function display_element($el, &$children, $max_depth, $depth = 0, $args, &$output){
        $id = $this->db_fields['id'];

        if(isset($children[$el->$id]))
            $el->classes[] = 'has_children';

        parent::display_element($el, $children, $max_depth, $depth, $args, $output);
    }
}
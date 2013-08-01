<?php
/**
 * WKE2014  Constants
 *
 **/ 

$defaultoptions = array(
    'js-version'                    => '1.1',
    'default-color'		    => 'e6e6e6',
    'thumbnail-width'		    => 624,
    'thumbnail-height'		    => 9999,
    'content-width'                 => 625,  
   
    'aktiv_menueselectlist'	    => 1,
    'src_basemod_zusatzinfo'	    => get_template_directory_uri() . '/css/basemod_zusatzinfo.css',
    'aktiv-basemod_zusatzinfo'	    => 1,    
    'src_basemod_links'		    => get_template_directory_uri() . '/css/basemod_links.css',
    'active-basemod_links'	    => 1,
    'src_basemod_sidebar'	    => get_template_directory_uri() . '/css/basemod_sidebar.css',
    'aktiv-basemod_sidebar'	    => 1,
    'src_basemod_mediaqueries'	    => get_template_directory_uri() . '/css/mediaqueries.css',
    'aktiv-basemod_mediaqueries'    => 1,

    
    'logo'			    => get_template_directory_uri() . '/images/logo-techfak.png',
    'logo-width'		    => 360,
    'logo-height'		    => 135,
    'background-header-color'	    => 'e6e6e6',
    'background-header-image'	    => '',
    
    'login_errors'		    => 0,
    'src-breadcrumb-image'	    => get_template_directory_uri() .'/images/breadcrumbarrow.gif',
    'src-teaser-thumbnail_default'  => '',
    
    
    'category-teaser'			    => 1,
    'category-num-article-fullwidth'	    => 10,
    'category-num-article-halfwidth'	    => 0,
    
    'category-teaser-maxlength'		    => 500,            
    'category-teaser-titleup'		    => 1, /* Titles up */ 
    'category-teaser-datebox'		    => 0, 
	/* 0 = Datebox, 
	 * 1 = Thumbnail (or: first picture, first video, fallback picture),
	 * 2 = First picture (or: thumbnail, first video, fallback picture),
	 * 3 = First video (or: thumbnail, first picture, fallback picture),
	 * 4 = First video (or: first picture, thumbnail, fallback picture),
	 * 5 = Nothing */ 
    'category-teaser-floating'		    => 0,
    'category-teaser-dateline'		    => 0, /* 1 = show Date on line up of the text if no datebox */
    'category-teaser-maxlength-halfwidth'   => 200,        
    'category-teaser-titleup-halfwidth'	    => 1, /* Titles up */ 
    'category-teaser-datebox-halfwidth'	    => 1, 
    'category-teaser-floating-halfwidth'    => 1,
    'category-teaser-dateline-halfwidth'    => 0, /* 1 = show Date on line up of the text if no datebox */    

    'num-article-startpage-fullwidth'       => 1,
    'num-article-startpage-halfwidth'       => 4,
    'teaser-thumbnail_width'		    => 120,
    'teaser-thumbnail_height'		    => 120,
    'teaser-thumbnail_crop'		    => 0,
    'src-teaser-thumbnail_default'	    => get_template_directory_uri() .'/images/default-teaserthumb.gif',
    'teaser-thumbnail_fallback'		    => 1,       
    'teaser-title-maxlength'        => 50,
    'teaser-subtitle'               => __( 'Topthema', 'wke2014' ),
    'teaser-title-words'            => 7,

    'teaser_maxlength'              => 500,
    'teaser-titleup'		    => 1, /* Titles up */ 
    'teaser-datebox'		    => 0,
    'teaser-floating'		    => 0,
    'teaser-dateline'		    => 0, /* 1 = show Date on line up of the text if no datebox */
    'teaser-maxlength-halfwidth'   => 200,        
    'teaser-titleup-halfwidth'	    => 1, /* Titles up */ 
    'teaser-datebox-halfwidth'	    => 1, 
    'teaser-floating-halfwidth'	    => 1,
    'teaser-dateline-halfwidth'    => 0, /* 1 = show Date on line up of the text if no datebox */      
        
);



        
/*
 * Default font modifications for standard css style
 */
$default_farbbasemods = array(
    'basemod_blau.css'    => __( 'Blau', 'wke2014' ),    
 );





/*
 * Definition welche Konstanten als Optionen im Backend geaendert werden koennen
 */


$setoptions = array(
   'techfak2013_theme_options'   => array(
       
       'design'   => array(
           'tabtitle'   => __('Design', 'wke2014'),
           'fields' => array(
              'basemods_colors' => array(
                  'type'    => 'select',
                  'title'   => __( 'Farbvarianten', 'wke2014' ),
                  'label'   => __( 'Farbvariationen des Designs gem&auml;&szlig; Einrichtungsart', 'wke2014' ),
		  'liste'   => $default_farbbasemods,
                  'default' => '',
              ),
	       /* 
              'aktiv-basemod_siegel' => array(
                  'type'    => 'bool',
                  'title'   => __( 'FAU-Siegel', 'wke2014'),
                  'label'   => __( 'Siegel im Hintergrund anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_siegel'],
              ),
              'aktiv-basemod_sidebar' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Sidebar', 'wke2014'),
                  'label'   => __( 'Sidebar rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_sidebar'],
              ),
	      'aktiv-basemod_targetmenu' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Zielgruppenmen&uuml;', 'wke2014'),
                  'label'   => __( 'zeige ein Zielgruppenmen&uuml;','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_targetmenu'],
              ),
	      'aktiv-basemod_search' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Suchmaske', 'wke2014'),
                  'label'   => __( 'Suchmaske immer anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_search'],
              ),  
	      
	       */
	     
               
           )
       ),
      
     
   )
);



?>

<?php
global $options;
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/grafiken/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>  <!-- begin: body -->
  <div class="page_margins">  <!-- begin: page_margins --> 
    <div id="seite" class="page">  <!-- begin: seite -->
      <a name="seitenmarke" id="seitenmarke"></a>
      
      <header><div id="kopf">  <!-- begin: kopf -->   
	    
	     
	    <div id="logo">
		    <p>				
		    <?php if ( ! is_home() ) { ?>
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo $options['default_text_title_home_backlink']; ?>" rel="home" class="logo">
		    <?php } ?>                                                             
		    <img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>">
		<?php                                
		if ( ! is_home() ) { ?> </a>  <?php } ?>
		    </p>

	    </div>
	    <?php if ( is_active_sidebar( 'headerbox-area' ) ) { 
		dynamic_sidebar( 'headerbox-area' ); 
	     } elseif (isset($options['headerbox-datum']) && isset($options['headerbox-title'])) { ?>
		 <div id="header-box">
		    <div class="wrapper">
			<p class="datum"><?php echo $options['headerbox-datum']; ?></p>
			<p class="titel"><?php echo $options['headerbox-title']; ?></p>
		    </div>
		</div>
	    <?php } ?>

	    <?php get_search_form(); ?>

	    <div id="titel">
		    <h1><?php wke2014_contenttitle(); ?></h1> 
	    </div>       

	      
			
		 
	    <div id="breadcrumb">
		    <h2>Sie befinden sich hier: </h2>
			    <p>			    
				<?php if (function_exists('wke2014_breadcrumbs')) wke2014_breadcrumbs(); ?>
			    </p>
	    </div>               
	    <div id="sprungmarken">
	      <h2>Sprungmarken</h2>
	      <ul>
			<li class="first"><a href="#contentmarke">Zum Inhalt</a><span class="skip">. </span></li>
			<li><a href="#bereichsmenumarke">Zur Navigation</a><span class="skip">. </span></li>		
			<li class="last"><a href="#sidebar">Zu sonstigen Informationen</a><span class="skip">. </span></li>            
	      </ul>
	    </div>
	    <?php if ( has_nav_menu( 'targetmenue' ) ) { ?>
		<nav id="zielgruppen-menue" class="zielgruppen-menue" role="navigation">
		    <?php wp_nav_menu( array( 'theme_location' => 'targetmenue', 'fallback_cb' => '', 'depth' => 1 ) );?>
		</nav><!-- #target-navigation -->
	     <?php } ?> 	  
		 <?php if ($options['aktiv-slider']==1) { ?>
	    <div id="headerimgs">
		<div id="control" class="btn"></div>
		<div id="headerimg1" class="headerimg"></div>
		<div id="headerimg2" class="headerimg"></div>
	    </div>
	     <?php } ?>
	</div></header>  <!-- end: kopf -->
      	<hr id="nachkopf" />  
		<div id="main">  <!-- begin: main -->
      		<div id="menu">  <!-- begin: menu -->	  
		        <div id="bereichsmenu">
		         	<h2><a name="bereichsmenumarke" id="bereichsmenumarke">Navigation</a></h2>      
				  
			    <?php 
                                if ( has_nav_menu( 'primary' ) ) {
                                    wp_nav_menu( array( 'container' => 'ul',  'menu_class'  => 'menu',
					'menu_id'         => 'navigation',  'theme_location' => 'primary', 'walker'  => '' ));      
                                } else { ?>
                                    
                                        <ul id="navigation" class="menu">      
                                            <?php  wp_page_menu( array(
                                        'sort_column' => 'menu_order, post_title',
                                        'echo'        => 1,
                                        'show_home'   => 1 ) ); ?>          
                                        </ul>
                                    
                                <?php  } ?>
				
				
		        </div>
			<?php if ( is_active_sidebar( 'kurzinfo-area' ) ) { 
			    dynamic_sidebar( 'kurzinfo-area' ); 
			 } ?>
		</div>  <!-- end: menu -->

		<?php get_sidebar(); ?>
		
		             
	    	<div id="content">  <!-- begin: content -->
	        <a name="contentmarke" id="contentmarke"></a>       
    
    

	    
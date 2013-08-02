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
    'default_text_title_home_backlink'	=>  __( 'Zur&uuml;ck zur Startseite', 'wke2014' ),
    'src_basemod_zusatzinfo'	    => get_template_directory_uri() . '/css/basemod_zusatzinfo.css',
    'aktiv-basemod_zusatzinfo'	    => 1,    
    'src_basemod_links'		    => get_template_directory_uri() . '/css/basemod_links.css',
    'aktiv-basemod_links'	    => 1,
    'src_basemod_sidebar'	    => get_template_directory_uri() . '/css/basemod_sidebar.css',
    'aktiv-basemod_sidebar'	    => 1,
    'src_basemod_blau'		    => get_template_directory_uri() . '/css/basemod_blau.css',
    'aktiv-basemod_blau'	    => 1,
    

    
    'logo'			    => get_template_directory_uri() . '/images/wke_logo_2014_gruen.png',
    'logo_gruen'		    => get_template_directory_uri() . '/images/wke_logo_2014_gruen.png',
    'logo_blau'			    => get_template_directory_uri() . '/images/wke_logo_2014_blau.png',
    'logo-width'		    => 170,
    'logo-height'		    => 106,
    'background-header-color'	    => 'ffffff',
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
    
    'headerbox-datum'		    => '20.03.<br />+ 21.03.',
    'headerbox-title'		    => 'Webkongress <br /> Erlangen <span class="jahr">2014</span>',
        
);






/*
 * Definition welche Konstanten als Optionen im Backend geaendert werden koennen
 */


$setoptions = array(
   'wke2014_theme_options'   => array(
       
       'design'   => array(
           'tabtitle'   => __('Design', 'wke2014'),
           'fields' => array(
              
   	      

              'aktiv-basemod_sidebar' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Sidebar', 'wke2014'),
                  'label'   => __( 'Sidebar rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_sidebar'],
              ),
	      'aktiv-basemod_zusatzinfo' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Zusatzinfo', 'wke2014'),
                  'label'   => __( 'Zusatzinfo anzeigen','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_zusatzinfo'],
              ),
	      'aktiv-basemod_links' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Linkicons', 'wke2014'),
                  'label'   => __( 'Automatische Linkicons aktivieren','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_links'],
              ),  
	        'aktiv-basemod_blau' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Blaues Logo', 'wke2014'),
                  'label'   => __( 'Logo im blauen Stil aktivieren','wke2014' ),
                  'default' => $defaultoptions['aktiv-basemod_blau'],
              ),  
	      'headerbox-datum' => array(
                  'type'    => 'html',
                  'title'   => __( 'Datumsangabe', 'wke2014'),
                  'label'   => __( 'Datum des Kongresses in Box rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['headerbox-datum'],
              ), 
	      'headerbox-title' => array(
                  'type'    => 'html',
                  'title'   => __( 'Titel', 'wke2014'),
                  'label'   => __( 'Subtitel in Box rechts anzeigen','wke2014' ),
                  'default' => $defaultoptions['headerbox-title'],
              ), 
	      
	     
	     
               
           )
       ),
       'startseite' => array(
	   'tabtitle'   => __('Startseite', 'wke2014'),
           'fields' => array(
              
		'teaser-title-maxlength' => array(
		      'type'    => 'number',
		      'title'   => __( 'Textl&auml;nge', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge des Titels im Teaser.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-title-maxlength'],
		  ),   
		 'teaser-title-words' => array(
		      'type'    => 'number',
		      'title'   => __( 'Wortzahl', 'wke2014' ),
		      'label'   => __( 'Zahl der Worte im Teaser; Die maximale Textl&auml;nge begrenzt diesen Wert jedoch.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-title-words'],
		  ),

		'auszuege'  => array(
		      'type'    => 'section',
		      'title'   => __( 'Gestaltung Textausz&uuml;ge', 'wke2014' ),                      
		  ),      
		    'num-article-startpage-fullwidth' => array(
		      'type'    => 'number',
		      'title'   => __( 'Beitr&auml;ge &uuml;ber ganze Breite', 'wke2014' ),
		      'label'   => __( 'Zahl der Beitr&auml;ge, die &uuml;ber die gesamte Inhaltsbreite gehen.', 'wke2014' ),
		      'default' => $defaultoptions['num-article-startpage-fullwidth'],
			'parent'  => 'auszuege'
		  ),
		  'num-article-startpage-halfwidth' => array(
		      'type'    => 'select',
		      'title'   => __( 'Beitr&auml;ge &uuml;ber halbe Breite', 'wke2014' ),
		      'label'   => __( 'Zahl der Beitr&auml;ge, die in Spalten mit je zwei Beitr&auml;gen nebeneinander, angezeigt werden.', 'wke2014' ),
		      'liste'   => array(0 => 0, 2 => 2, 4 => 4, 6 => 6, 8 => 8),
		      'default' => $defaultoptions['num-article-startpage-halfwidth'],
		      'parent'  => 'auszuege'
		  ),               


		 'teaser_maxlength' => array(
		      'type'    => 'number',
		      'title'   => __( 'L&auml;nge des Teasertextes (Artikelauszug)', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge auf der Startseite.', 'wke2014' ),
		      'default' => $defaultoptions['teaser_maxlength'],
		     'parent'  => 'auszuege'
		  ),                        
		  'teaser-titleup' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Titel oben', 'wke2014' ),
		      'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text', 'wke2014' ),
		      'default' => $defaultoptions['teaser-titleup'],
		      'parent'  => 'auszuege'
		  ), 
		  'teaser-datebox' => array(
		      'type'    => 'select',
		      'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
		      'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels.', 'wke2014' ),
		      'default' => $defaultoptions['teaser-datebox'],
		      'liste'   =>  array(
				    0 => __("Datumsbox anzeigen","wke2014"), 
				    1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"), 	    
				    2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"), 
				    3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"), 
				    4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"), 
				    5 => __("Nichts anzeigen","wke2014")), 
		      'parent'  => 'auszuege'
		  ), 	              
		  'teaser-floating' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
		      'label'   => __( 'Text umflie&szlig;t das Bild', 'wke2014' ),
		      'default' => $defaultoptions['teaser-floating'],
		      'parent'  => 'auszuege'
		  ),  
		   'teaser-dateline' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Datumszeile', 'wke2014' ),
		      'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird', 'wke2014' ),
		      'default' => $defaultoptions['teaser-dateline'],
		      'parent'  => 'auszuege'
		  ), 

		    'teaser-maxlength-halfwidth' => array(
		      'type'    => 'number',
		      'title'   => __( 'L&auml;nge des Teasertextes', 'wke2014' ),
		      'label'   => __( 'Maximale Textl&auml;nge f&uuml;r Artikelausz&uuml;ge (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-maxlength-halfwidth'],
		    'parent'  => 'auszuege'
		  ),                 
		 'teaser-titleup-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Titel oben', 'wke2014' ),
		      'label'   => __( 'Titel &uuml;ber Logo/Datumsbox und Text (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-titleup-halfwidth'],
		      'parent'  => 'auszuege'
		  ), 
		  'teaser-datebox-halfwidth' => array(
		      'type'    => 'select',
		      'title'   => __( 'Symbolbild/Datumsbox', 'wke2014' ),
		      'label'   => __( 'Links des Textauszuges das Datum, das Artikelbild, ein Bild des Artikels oder ein verlinktes Video anzeigen; Abhängig vom Inhalt des Artikels. (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
		      'default' => $defaultoptions['teaser-datebox-halfwidth'],
		      'liste'   =>  array(
				    0 => __("Datumsbox anzeigen","wke2014"), 
				    1 => __("Reihenfolge: Artikelbild, erstes Bild, erstes Video oder Ersatzbild zeigen","wke2014"), 	    
				    2 => __("Reihenfolge: Erstes Bild, Artikelbild, erstes Video oder Ersatzbild zeigen","wke2014"), 
				    3 => __("Reihenfolge: Erstes Video, Artikelbild, erstes Bild oder Ersatzbild zeigen","wke2014"), 
				    4 => __("Reihenfolge: Erstes Video, erstes Bild, Artikelbild oder Ersatzbild zeigen","wke2014"), 
				    5 => __("Nichts anzeigen","wke2014")), 

		      'parent'  => 'auszuege'		  
		  ), 
		  'teaser-floating-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Flie&szlig;ender Text', 'wke2014' ),
		      'label'   => __( 'Text umflie&szlig;t das Bild (Bei Beitr&auml;gen &uuml;ber halbe Breite)', 'wke2014' ),
		      'default' => $defaultoptions['teaser-floating-halfwidth'],
		      'parent'  => 'auszuege'
		  ), 	       

		   'teaser-dateline-halfwidth' => array(
		      'type'    => 'bool',
		      'title'   => __( 'Datumszeile', 'wke2014' ),
		      'label'   => __( 'Datumszeile vor dem Text, falls keine Datumsbox angezeigt wird (Bei Beitr&auml;gen &uuml;ber halbe Breite).', 'wke2014' ),
		      'default' => $defaultoptions['teaser-dateline-halfwidth'],
		      'parent'  => 'auszuege'
		  ), 
	     ),  
                 
       ),
      
     
   )
);



?>

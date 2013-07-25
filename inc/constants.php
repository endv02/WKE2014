<?php
/**
 * Piratenkleider Constants
 *
 **/ 

$defaultoptions = array(
    'js-version'                    => '1.1',
    'default-color'		    => 'e6e6e6',
    'thumbnail-width'		    => 624,
    'thumbnail-height'		    => 9999,
    'content-width'                 => 625,
    'aktiv-basemod_siegel'	    => 0,
    'aktiv-basemod_sidebar'	    => 0,
    'aktiv-basemod_targetmenu'	    => 0,
    'aktiv-basemod_search'	    => 1,
    'aktiv-basemod_transparentetabellen'    => 0,
    'aktiv_menueselectlist'	    => 1,
    'logo'			    => get_template_directory_uri() . '/images/logo-techfak.png',
    'logo-width'		    => 360,
    'logo-height'		    => 135,
);



        
/*
 * Default font modifications for standard css style
 */
$default_farbbasemods = array(
    'basemod_gelb.css'	    => __( 'Gelb', 'techfak-2013'),
    'basemod_orange.css'    => __( 'Orange', 'techfak-2013'),
    'basemod_rot.css'	     => __( 'Rot', 'techfak-2013' ),
    'basemod_gruen.css'	     => __( 'Gr&uuml;n', 'techfak-2013' ),
    'basemod_hellblau.css'	     => __( 'Hellblau', 'techfak-2013' ),    
 );



                  


/*
 * Definition welche Konstanten als Optionen im Backend geaendert werden koennen
 */


$setoptions = array(
   'techfak2013_theme_options'   => array(
       
       'design'   => array(
           'tabtitle'   => __('Design', 'techfak-2013'),
           'fields' => array(
              'basemods_colors' => array(
                  'type'    => 'select',
                  'title'   => __( 'Farbvarianten', 'techfak-2013' ),
                  'label'   => __( 'Farbvariationen des Designs gem&auml;&szlig; Einrichtungsart', 'techfak-2013' ),
		  'liste'   => $default_farbbasemods,
                  'default' => '',
              ),
	       /* 
              'aktiv-basemod_siegel' => array(
                  'type'    => 'bool',
                  'title'   => __( 'FAU-Siegel', 'techfak-2013'),
                  'label'   => __( 'Siegel im Hintergrund anzeigen','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_siegel'],
              ),
              'aktiv-basemod_sidebar' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Sidebar', 'techfak-2013'),
                  'label'   => __( 'Sidebar rechts anzeigen','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_sidebar'],
              ),
	      'aktiv-basemod_targetmenu' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Zielgruppenmen&uuml;', 'techfak-2013'),
                  'label'   => __( 'zeige ein Zielgruppenmen&uuml;','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_targetmenu'],
              ),
	      'aktiv-basemod_search' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Suchmaske', 'techfak-2013'),
                  'label'   => __( 'Suchmaske immer anzeigen','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_search'],
              ),  
	       'aktiv-basemod_transparentetabellen' => array(
                  'type'    => 'bool',
                  'title'   => __( 'Tabellenstil', 'techfak-2013'),
                  'label'   => __( 'Tabellen ohne Farbe anzeigen','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_transparentetabellen'],
              ),  
	       */
	      'aktiv_menueselectlist'   => array(
                  'type'    => 'bool',
                  'title'   => __( 'Dropdown Men&uuml; aktivieren', 'techfak-2013'),
                  'label'   => __( 'Dropdown Liste f&uuml;r Small Screen Devices aktivieren','techfak-2013' ),
                  'default' => $defaultoptions['aktiv-basemod_transparentetabellen'],
              ),  
               
           )
       ),
      
     
   )
);



?>

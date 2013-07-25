<?php get_header();    
  global $options;  

     if ( is_active_sidebar( 'inhaltsinfo-area' ) ) { 
    	 dynamic_sidebar( 'inhaltsinfo-area' ); 
    }  

      $i = 0; 
      $col = 0; 
      
      $numentries = $options['num-article-startpage-fullwidth'] + $options['num-article-startpage-halfwidth']; 
      $col_count = 3; 
      $cols = array();
      while (have_posts() && $i<$numentries) : the_post();
      $i++;
      ob_start();
      if (( isset($options['num-article-startpage-fullwidth']))
                && ($options['num-article-startpage-fullwidth']>=$i )) {
		 wke2014_post_teaser($options['teaser-titleup'],$options['teaser-datebox'],$options['teaser-dateline'],$options['teaser_maxlength'],$options['teaser-thumbnail_fallback'],$options['teaser-floating']);
      } else {
		 wke2014_post_teaser($options['teaser-titleup-halfwidth'],$options['teaser-datebox-halfwidth'],$options['teaser-dateline-halfwidth'],$options['teaser-maxlength-halfwidth'],$options['teaser-thumbnail_fallback'],$options['teaser-floating-halfwidth']);
      }
      $output = ob_get_contents();
      ob_end_clean();
      if (isset($output)) {
        $cols[$col++] = $output;
      }
      endwhile;
      ?>
      <div class="columns">
        <?php
        $z=1;
        foreach($cols as $key => $col) {
            if (( isset($options['num-article-startpage-fullwidth']))
                && ($options['num-article-startpage-fullwidth']>$key )) {
                    echo $col;                                               
                } else {          
                     if (( isset($options['num-article-startpage-fullwidth']))
                            && ($options['num-article-startpage-fullwidth']==$key )
                             && ($options['num-article-startpage-fullwidth']>0 )) {
                         echo '<hr>';
                        }                                              
                    echo '<div class="column'.$z.'">' . $col . '</div>';                            
                    $z++;
                    if ($z>2) {
                        $z=1;
                        echo '<hr style="clear: both;">';
                    }
                }            
        }
        ?>     
      </div>

      
      <?php if ( ! have_posts() ) : ?>
       <h2><?php _e("Nichts gefunden", 'wke2014'); ?></h2>
        <p>
            <?php _e("Es konnten keine Artikel gefunden werden. Bitte versuchen Sie es nochmal mit einer Suche.", 'wke2014'); ?>
        </p>
        <?php get_search_form(); ?>
        <hr>
      <?php endif; ?>
 
     

<?php get_footer(); ?>
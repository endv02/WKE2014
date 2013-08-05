   <?php
   global $options;

     
                $category_description = category_description();
                if ( ! empty( $category_description ) )
                        echo '' . $category_description . ''; 
		
		if ( ! have_posts() ) : ?>
                        <h1><?php _e( 'Nichts gefunden', 'wke2014' ); ?></h1>
                        <p><?php _e( 'Vielleicht hilft eine Suche weiter?', 'wke2014' ); ?></p>
                        <div class="fullwidth"><?php get_search_form(); ?></div>
                <?php endif; 
		
		while ( have_posts() ) : the_post(); ?>

                <?php /* gallery */ 

                
		    if ( in_category( _x('gallery', 'gallery category slug', 'wke2014') ) ) : ?>
                        <h2>
                                <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wke2014' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                </a>
                        </h2>
                        <?php wke2014_post_pubdateinfo(); ?>

		    <?php if ( post_password_required() ) : ?>
                        <?php the_content(); ?>
		     <?php else : 			 
			$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
			$total_images = count( $images );
			$image = array_shift( $images );
			$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
		    ?>
			    <a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>

			    <p>
				    <?php printf( __( 'Diese Galerie enth&auml;lt <a %1$s>%2$s photos</a>.', 'wke2014' ),
							    'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'wke2014' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
							    $total_images
						    ); ?>
			    </p>

			    <?php the_excerpt(); ?>
		    <?php endif; ?>

                        <a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'wke2014'), 'category' ); ?>" title="<?php esc_attr_e( 'Zeige Artikel aus der Galerie', 'wke2014' ); ?>"><?php _e( 'Mehr Bildergalerien', 'wke2014' ); ?></a>
                                        |
                                        <?php comments_popup_link( __( 'Hinterlasse einen Kommentar', 'wke2014' ), __( '1 Comment', 'wke2014' ), __( '% kommentare', 'wke2014' ) ); ?>
                                        <?php edit_post_link( __( 'Bearbeiten', 'wke2014' ), '|', '' ); ?>
          

             
                <?php else : 
                               

		    	 wke2014_post_teaser($options['category-teaser-titleup'],$options['category-teaser-datebox'],$options['category-teaser-dateline'],$options['category-teaser-maxlength'],$options['teaser-thumbnail_fallback'],$options['category-teaser-floating']);
     

                endif; // This was the if statement that broke the loop into three parts based on categories. ?>

                <?php endwhile; // End the loop. Whew. ?>

                <?php /* Display navigation to next/previous pages when applicable */ ?>
                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                            <?php next_posts_link( __( '&larr; &Auml;ltere Beitr&auml;ge', 'wke2014' ) ); ?>
                            <?php previous_posts_link( __( 'Neuere Beitr&auml;ge &rarr;', 'wke2014' ) ); ?>
                <?php endif; ?>

        <div class="container-fluid flexible-row-block post-list">
        	<div class="container">
            	<div class="row title-row">
                	<div class="col">
                    	<span class="title"><?php the_sub_field('related_postspages_header');?></span>
                    </div>
                </div>
            
            	<div class="row">
					<?php
					// loop through the rows of data
					while ( have_rows('select_postspages') ) : the_row(); ?>
					
						<?php
							$id = get_sub_field('postpage_object');
							$temp = $post;
							$post = get_post( $id );
							setup_postdata( $post );
						?>
						
							<?php include( get_stylesheet_directory() . '/template-parts/post/content-news.php');?>
							
						<?php
							wp_reset_postdata();
							$post = $temp;
						?>
						
					<?php endwhile;?>
                </div>
            </div>
        </div>
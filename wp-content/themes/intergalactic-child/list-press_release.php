<?php
 /*Template Name: list press release
 */
 
get_header(); ?>
<div class='press-release-container row'>
	
	    <?php
    $mypost = array( 'post_type' => 'press_release', 'release_type'=>'press-release');
    $loop = new WP_Query( $mypost );
    ?>
    	<div class='left-press-posts col-lg-8'>
    		<div class="post-type-title" >Press Release </div>
		<div class='post-list'>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
<a href='<?php the_permalink(); ?>'>
			<div class='post-item'>
				<div class="post-date" ><?php get_post_meta( get_the_ID(), 'media_coverage_date', true ) ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<div class='post-description'><?php the_excerpt() ?> </div>
				<div class='post-media'>
					 <?php the_post_thumbnail() ?>
				</div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
				
				</div>
			</div>
	</a>
		
   <?php endwhile; ?>

		</div>
	</div>
	<div class='right-press-posts col-lg-4'>
<!-- 		<div class='section-heading'>
			<h4>MEDIA CONTACTS</h4> -->

		<!-- 	<div class='section-sub-heading'>For any media queries <a href='#'>contact us</a></div>
		</div> -->

			<?php
    $mypost = array( 'post_type' => 'press_release', 'release_type'=>'media-coverage' , 'showposts'=>2);
    $loop = new WP_Query( $mypost );
    ?>
		<div class='post-list'>
			
				<div class='post-type'><a href="/mediacoverage">Media Coverage</a></div>
			 <?php while ( $loop->have_posts() ) : $loop->the_post();?>
<div class="post-item" >

				<a href='<?php the_permalink(); ?>'>
				<div class='post-media'>
					<?php the_post_thumbnail() ?>
				</div>
				<div class='post-date'> <?php echo esc_html( get_post_meta( get_the_ID(), 'media_coverage_date', true ) ); ?></div>
				<div class='post-title'><?php the_title(); ?></div>
				<!-- <div class='post-author'>- <?php // the_author(); ?> </div> -->
				<div class='post-description'><?php the_excerpt() ?></div>
				<div class='link-button bottom-right'>
					
						<span class="arrow-button icon-home_yellowband_arrow"></span>
			
				</div>
					</a>
		
</div>
		

	<?php endwhile; ?>
		</div>
		</div>

</div>

<?php 
get_footer(); // Loads the footer.php file 
?>

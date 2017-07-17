<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package verve
 */

get_header(); ?>
<?php get_template_part( 'template-parts/content', 'hero' ); ?>
<section class="single-post-title large-padding">
    <div class="container">
        <h1><?php echo get_field('subtitle'); ?></h1>
    </div>
</section>
<section class="grey-panel">
    <div class="container large-padding single-news-info">
        <div class="row">
            <div class="columns eight">
                <h2><?php the_title(); ?></h2>
            </div>
            <?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						echo '
							<div class="columns four single-post-author">
		                        '.get_avatar( get_the_author_meta( 'ID' ), 32 ).'
		                        <div>
		                            <p>'.get_the_author().'</p>
		                            <p>'.get_the_author_meta('description').'</p>
		                        </div>
		                    </div>
		                </div>
						';
						the_content();
						
					endwhile;
				endif; 
			?>
            
            <?php 
            	if (have_rows('add_social_icon')) {
            		while (have_rows('add_social_icon')) {
            			the_row();
            			echo '<a href="'.get_sub_field('link').'" class="social" style="background-image: url('.get_sub_field('icon').');"></a>';
            		}
            	}
            ?>
    </div>
</section>
        
        <section class="related">
            <div class="container">
                <h2>See also</h2>
                <div class="row">
                    <div class="columns four single-post-author">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/author.png" alt="">
                        <div>
                            <p>Clive Caseley</p>
                            <p>Director</p>
                        </div>
                    </div>
                    <div class="columns four single-post-author">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/author.png" alt="">
                        <div>
                            <p>Clive Caseley</p>
                            <p>Director</p>
                        </div>
                    </div>
                    <div class="columns four single-post-author">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/author.png" alt="">
                        <div>
                            <p>Clive Caseley</p>
                            <p>Director</p>
                        </div>
                    </div>  
                </div>
                <div class="container services-boxes">
                    <div class="row">
                    	<?php 
		                if (have_rows('rel_services')) {
		                	while (have_rows('rel_services')) {
		                		the_row();
		                		$post_object = get_sub_field('select_service');

		                		// override $post
								$post = $post_object;
								setup_postdata( $post ); 

								?>
							    
							    <div class="six columns">
		                            <div class="header">
		                                <h3><?php the_title(); ?></h3>
		                            </div>
		                            <div>
		                                <p><?php the_field('subtitle'); ?></p>
		                                <a href="<?php the_permalink(); ?>">Find out more</a>
		                            </div>
		                        </div>
							    <?php wp_reset_postdata();
		                	}
		                }
		                ?>
                    </div>
                </div>
            </div>
        </section>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

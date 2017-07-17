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
<?php get_template_part( 'template-parts/content', 'flexible-content' ); ?>

<section class="case-studies grey-panel">
	<div class="container">
        <h2>Related case studies</h2>
    </div>
    <div class="row">
        <?php 
            $args = array( 'post_type' => 'case_studies', 'posts_per_page' => 4 );
            $c_s_increm = 1;
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
                echo '
                    <div class="three columns" style="background-image: url('.$thumbnail[0].');">
                        <a href="'.get_the_permalink().'" class="">
                            <div class="inner">
                                <p>'.get_the_title().'</p>
                                <button>View Case Study</button>
                            </div>
                        </a>
                    </div>
                ';
              if($c_s_increm%4 == 0){
                    echo '</div><div class="row">';
                }
            endwhile;
        ?>
        </div>
</section>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

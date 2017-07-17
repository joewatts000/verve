<?php
/* Template Name: Case studies Page */
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package verve
 */
?>

<?php get_header(); ?>
<?php get_template_part( 'template-parts/content', 'hero' ); ?>
<?php 
    if(get_field('top_callout')){
        echo '
            <section>
                <div class="container text-center callout large-padding">
                    '.get_field('top_callout').'
                </div>
            </section>
        ';
    }
?>
<section class="case-studies">
    <h2 class="section-title text-center">Case studies</h2>
        <div class="row">
        <?php 
            $args = array( 'post_type' => 'case_studies', 'posts_per_page' => 12 );
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
            wp_reset_postdata();
        ?>
        </div>
</section>
<?php get_template_part( 'template-parts/content', 'flexible-content' ); 
wp_reset_postdata();
?>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

<?php
/* Template Name: Services Page */
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
<?php get_template_part( 'template-parts/content', 'flexible-content' ); ?>
<section class="services grey-panel large-padding">
    <div class="container services-boxes">
        <div class="row">
            <?php
                $args = array(
                    'post_parent' => $post->ID,
                    'post_type' => 'page',
                    'orderby' => 'menu_order'
                );

                $child_query = new WP_Query( $args );
                $i = 1;

                while ( $child_query->have_posts() ) : $child_query->the_post(); 
                        echo '
                            <div class="six columns">
                                <div class="header" style="background-color: '.get_field('service_colour').';">
                                    <h3>'.get_the_title().'</h3>
                                </div>
                                <div>
                                    <p>'.get_field('subtitle').'</p>
                                    <a href="'.get_the_permalink().'" class="button">Find out more</a>
                                </div>
                            </div>
                        ';

                    if($i%2 == 0){
                        echo '</div><div class="row">';
                    }
                    $i++;

                endwhile; 
                wp_reset_postdata(); 

            ?>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

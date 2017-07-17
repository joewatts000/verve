<?php
/* Template Name: Vacancies Page */
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
<section class="vacancies grey-panel">
    <div class="container">
        <h2>Vacancies</h2>
        <div class="row">
            <?php 
                if (have_rows('vacancies')) {
                    $i = 1;
                    while (have_rows('vacancies')) {
                        the_row();
                        echo '
                            <div class="six columns" style="background-color:'.get_sub_field('bg_colour').';">
                                '.get_sub_field('content').'
                            </div>
                        ';
                        if($i%2 == 0){
                            echo '</div><div class="row">';
                        }
                        $i++;
                    }
                }
            ?>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

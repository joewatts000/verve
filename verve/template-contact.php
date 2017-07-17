<?php
/* Template Name: Contact Page */
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
<div class="hero">
    <div id="photos" class="contact-slider active" style="background-image: url('<?php echo get_field('photo_image'); ?>');"></div>
    <div id="map" class="contact-slider" style="background-image: url('<?php echo get_field('map_image'); ?>');"></div>
    <div id="transport" class="contact-slider" style="background-image: url('<?php echo get_field('transport_image'); ?>');"></div>
    <div class="hero-inner alpha">
        <div class="captions default">
            <h1>Get in touch</h1>
        </div>
        <div class="map-filter">
            <div class="container">
                <div class="row">
                    <button class="columns four active" data-target="photos">Photos</button>
                    <button class="columns four" data-target="map">Map</button>
                    <button class="columns four" data-target="transport">Transport</button>
                </div>
            </div>
        </div>
    </div>
</div>  
<?php get_template_part( 'template-parts/content', 'flexible-content' ); ?>
<section class="contact">
    <div class="container callout text-center">
        <?php echo get_field('contact_address'); ?>
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

<?php 
    if (get_field('contact_form')) {
        echo '
            <section class="blue-panel text-center large-padding contact">
                <div class="container">
        ';
                echo get_field('contact_form');
    
        echo '
                </div>
            </section>
        ';
    }
?>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

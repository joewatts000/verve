<?php
/* Template Name: About us Page */
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
<?php 
    if(have_rows('team_members')){
        $i = 1;
        echo '
            <section class="team row" style="background-color: #f9f9f9;">
                <div class="container">
                    <h2>Meet our team</h2>
                    <div class="row">
        ';
        while (have_rows('team_members')) {
            the_row();
            $name = get_sub_field('name');
            $job = get_sub_field('job');
            $image = get_sub_field('image');
            $info = get_sub_field('info');
            echo '
                <div class="three columns">
                    <img src="'.$image.'" alt="">
                    <div class="captions">
                        <p>'.$name.'</p>
                        <p>'.$job.'</p>
                    </div>
                    <div class="info">
                        <button class="close-team">X</button>
                        <div class="header">
                            <p>'.$name.'</p>
                            <p>'.$job.'</p>
                        </div>
                        <div class="inner">
                            '.$info.'
                        </div>
                        <div class="container">
                            <a href="javascript:void(0);" class="social" style="background-image: url("img/facebook.png");"></a>
                            <a href="javascript:void(0);" class="social" style="background-image: url("img/twitter.png");"></a>
                            <a href="javascript:void(0);" class="social" style="background-image: url("img/linkedin.png");"></a>
                        </div>
                    </div>
                </div>
            ';
            if($i%4 == 0){
                echo '</div><div class="row">';
            }
            $i++;
        }
        echo '      </div>
                </div>
            </section>
        ';
    }
?>
<?php get_template_part( 'template-parts/content', 'flexible-content' ); ?>
<?php 
    if(have_rows('clients')){
        $j = 1;
        echo '
            <section class="clients">
                <div class="container">
                    <h2>Our clients</h2>
                    <div class="row">
        ';
        while (have_rows('clients')) {
            the_row();
            $image = get_sub_field('image');
            echo '
                <div class="two columns">
                    <img src="'.$image.'" alt="">
                </div>
            ';

            if($j%6 == 0){
                echo '</div><div class="row">';
            }
            $j++;
        }
        echo '      </div>
                </div>
            </section>
        ';
    }
?>

<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>

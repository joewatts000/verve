<?php
/* Template Name: News Page */
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
<section class="news-filter">
    <div class="container">
        <ul>
            <li><a href="javascript:void(0);" id="insight">Insight</a></li>
            <li><a href="javascript:void(0);" id="opinion">Opinion</a></li>
            <li><a href="javascript:void(0);" id="news">News</a></li>
            <li><a href="javascript:void(0);" id="ideas">Ideas</a></li>
            <li><a href="javascript:void(0);" id="newest">Newest</a></li>
            <li><a href="javascript:void(0);" id="all">All</a></li>
        </ul>
    </div>
</section>
<section class="grey-panel large-padding">
    <div class="container">
        <div class="posts">
            <div class="posts-row">


                <?php 
                    $args = array( 'post_type' => 'post', 'posts_per_page' => 12 );
                    $news_increm = 1;
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                        $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );

                        echo '
                            <a class="post one-thirds" href="'.get_the_permalink().'">
                                <div class="half-post">
                                    <p class="category">Design</p>
                                    <p class="title">'.get_the_title().'</p>
                                </div>
                                <div class="half-post">
                                    <img src="'.$thumbnail[0].'" />
                                </div>
                            </a>
                        ';

                        if($news_increm%3 == 0){
                            echo '</div><div class="posts-row">';
                        }
                        $news_increm++;
                    endwhile;
                ?>

               
            </div>
        </div>
    </div>
</section>
<?php get_template_part( 'template-parts/content', 'contact-callout' ); ?>
<?php get_footer(); ?>
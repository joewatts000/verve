<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package verve
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
            <div class="container">
                <div class="row">
                    <div class="two columns">
                        <a href="index.html" class="logo">
                            <img src="<?php the_field('logo', 'options'); ?>" alt="">
                        </a>
                    </div>
                    <div class="ten columns">
                        <div class="menu-toggle">
                            <div class="inner"></div>
                            <div class="inner"></div>
                            <div class="inner"></div>
                        </div>
                        <nav>
                            <?php
								wp_nav_menu( array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								) );
							?>
                        </nav>  
                    </div>  
                </div>
            </div>
        </header>
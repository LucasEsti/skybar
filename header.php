<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package sparkling
 */
?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title(''); ?></title>
<?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://use.typekit.net/mym6gdz.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<?php wp_head(); ?>
<link rel="shortcut icon" href="<?php bloginfo("template_url");  ?>/images/logo.png" type="image/x-icon">
</head>

<body <?php body_class(); ?>>

          <!--Upline-->
    <div id="upline">
        <div class="container">
            <ul>
                <li>
                    <div class="horaires">
                        <ul>
                            <li>
                                <i class="fas fa-clock"></i>
                            </li>
                            <?php if( get_field('horaire_header', 'option') ): ?>
                                <li><?php the_field('horaire_header', 'option'); ?></li>
                            <?php endif; ?>
                            <?php if( get_field('horaire2_header', 'option') ): ?>
                                <li><?php the_field('horaire2_header', 'option'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
                <li>
                <div class="dropdown">
                    <a href="#" class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-map-marker-alt"></i>Antananarivo</a>
                    <div id="tip-first" class="tip-content dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="box">
                            <ul class="infos">
                                <?php if( have_rows('antananarivo_header', 'option') ): ?>
                                    <?php while( have_rows('antananarivo_header', 'option') ): the_row(); ?>
                                        <li><i class="fas <?php the_sub_field('icon'); ?>"></i><?php the_sub_field('texte'); ?></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                            <iframe style="border: 0;" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7547.860554910893!2d47.52410809117495!3d-18.9344800274862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f07e7b8b511371%3A0x2ba79672eb399f11!2sBatpro!5e0!3m2!1sfr!2smg!4v1603421799544!5m2!1sfr!2smg" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe>
                        </div>
                    </div>
                </div>
                </li>
                <li>
                <div class="dropdown toamasina">
                    <a href="#" id="dropdownMenuButton2" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-map-marker-alt"></i>Toamasina</a>
                    <div id="tip-first" class="tip-content dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <div class="box">
                                <ul class="infos">
                                    <?php if( have_rows('toamasina_header', 'option') ): ?>
                                        <?php while( have_rows('toamasina_header', 'option') ): the_row(); ?>
                                            <li><i class="fas <?php the_sub_field('icone'); ?>"></i><?php the_sub_field('texte'); ?></li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            <iframe style="border: 0;" tabindex="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2898.1661297026794!2d49.41089646286673!3d-18.15647866697904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21f501b64665865f%3A0x6a8892ff7ceb5d29!2s23%20Boulevard%20Augagneur%2C%20Toamasina!5e0!3m2!1sfr!2smg!4v1603421928834!5m2!1sfr!2smg" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe>
                        </div>
                    </div>
                </div>
                </li>
                <?php if( get_field('email_header', 'option') ): ?>
                    <li class="email"><a href="mailto:<?php the_field('email_header', 'option'); ?>"><img src="<?php the_field('icone_email', 'option'); ?>" class="img-fluid" width="14" alt="Mail"></a></li>
                <?php endif; ?>
                <?php if( get_field('linkedin_header', 'option') ): ?>
                    <li class="linked linkeds"><a href="<?php the_field('linkedin_header', 'option'); ?>" target="_blank"><img src="<?php the_field('icone_linkedin', 'option'); ?>" class="img-fluid" width="14" alt="facebook"></a></li>
                <?php endif; ?>
                <?php if( get_field('facebook_header', 'option') ): ?>
                    <li class="linked"><a href="<?php the_field('facebook_header', 'option'); ?>" target="_blank"><img src="<?php the_field('icone_facebook', 'option'); ?>" class="img-fluid" width="14" alt="facebook"></a></li>
                <?php endif; ?>

                <li class="users"><a href="/batpro/contact"><i class="fas fa-user-alt"></i>Contactez-nous</a></li>
            </ul>
        </div>
    </div>

    <!--Header-->
    <header>
        <div class="container head">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <?php if( get_field('logo_header', 'option') ): ?>
                        <img src="<?php the_field('logo_header', 'option'); ?>" class="img-fluid" alt="BatPro Madagascar">
                        <span>depuis 1960</span>
                    <?php endif; ?>
                </a>
            </div>

            <div class="search">
                <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
            </div>

            <div id="cartTop">
                <a href="<?php echo get_permalink(33416) ?>" class="cartIcon"><img src="<?php echo get_template_directory_uri() ?>/images/cart-icon.png" alt="Panier" width="50"></a>
                <span class="cartItemCount"><?php echo get_cart_total_count() ?></span>
            </div>
        </div>

        <!-- Navigation produit -->
        <nav id="navigation">
            <div id="btnnavs">
                <div class="titlenav">Nos produits</div>
                <div class="btninter">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <ul class="listnav">
                <?php wp_list_categories(array(
                     'show_option_all'    => '',
                     'orderby'            => 'name',
                     'order'              => 'ASC',
                     'style'              => 'list',
                     'show_count'         => 0,
                     'hide_empty'         => 1,
                    'use_desc_for_title' => 1,
                     'child_of'           => 0,
                     'feed'               => '',
                     'feed_type'          => '',
                     'feed_image'         => '',
                     'exclude'            => '',
                     'exclude_tree'       => '',
                     'include'            => '',
                     'hierarchical'       => 1,
                     'title_li'           => __(''),
                    'show_option_none'   => __( 'No categories' ),
                    'number'             => null,
                   'echo'               => 1,
                    'depth'              => 2,
                   'current_category'   => 0,
                    'pad_counts'         => 0,
                    'taxonomy'           => 'nos-produits',
                    'walker'             => null
                 )); ?>
            </ul>

        </nav>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-xl">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="container">
                <div id="btnnav">
                    <div class="btninter">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="titlenav">Nos produits</div>
                </div>
                <?php wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbarSupportedContent',
                    'menu_class'        => 'navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                ); ?>
            </div>
        </nav>
    </header>

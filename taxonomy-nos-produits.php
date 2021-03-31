<?php get_header(); ?>

    <!-- Banniere -->
    <section id="banniere" class="container">
 
        <?php

            // Display the artist image
            $queried_object = get_queried_object();
            $taxonomy = $queried_object->taxonomy;
            $term_id = $queried_object->term_id;
            $terms = get_field( 'taxonomy_banniere', $taxonomy.'_'.$term_id);
            $termsipad = get_field( 'taxonomy_banniere_ipad', $taxonomy.'_'.term_id);
            $termsmobile = get_field( 'taxonomy_banniere_mobile', $taxonomy.'_'.term_id);

            if($queried_object->parent != 0)
                $terms = get_field( 'taxonomy_banniere', $taxonomy.'_'.$queried_object->parent);
            if($queried_object->parent != 0)
                $termsipad = get_field( 'taxonomy_banniere_ipad', $taxonomy.'_'.$queried_object->parent);
            if($queried_object->parent != 0)
                $termsmobile = get_field( 'taxonomy_banniere_mobile', $taxonomy.'_'.$queried_object->parent);

            echo '<img src="'. $terms['url'] .'" class="img-fluid desktop">';
            echo '<img src="'. $termsipad['url'] .'" class="img-fluid ipad">';
            echo '<img src="'. $termsmobile['url'] .'" class="img-fluid mobile">';

        ?>
        <div class="content">
            <div class="titres"><?php //single_cat_title(); ?><?php echo get_queried_object()->name; ?></div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Nos produits</a></li>
          <?php if($queried_object->parent != 0) { ?>
          <li class="breadcrumb-item"><a href="<?php echo get_term_link(get_term($queried_object->parent)->term_id) ?>"><?php echo get_term($queried_object->parent)->name; ?></a></li>
          <?php } ?>
          <li class="breadcrumb-item active" aria-current="page"><?php single_cat_title(); ?></li>
        </ol>
    </nav>

    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1><?php single_cat_title(); ?></h1>
                        </div>
                        <div class="col-sm-12">
                            <div class="wrapper">
                                <div class="header">
                                  <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
                                  <i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
                                </div>
                                <div class="products grid group">
                                <?php // $catlist = new WP_Query(array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '20', 'cat_id' => $term_id )); ?>
	                                <?php // if( $catlist->have_posts() ) : while( $catlist->have_posts() ) : $catlist->the_post(); ?>
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <div class="product">
                                            <div class="content-product-imagin"></div>
                                            <div class="content-product-list"></div>
                                            <div class="product__inner">
                                                <a href="<?php the_permalink(); ?>" class="link">
                                                    <div class="product__image">
                                                        <?php
                                                        $images = get_field('galerie_produit');
                                                        $image  = $images[0];
                                                        if( $image ) : ?>
                                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid"/>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                                <div class="product__details">
                                                    <div class="product__name"><?php the_title(); ?></div>
                                                    <div class="ref"><?php if( get_field('marques') ): ?><strong>Marque:</strong> <?php the_field('marques'); ?> - <?php endif; ?>  <?php if( get_field('references') ): ?><strong>Ref:</strong> <?php the_field('references'); ?><?php endif; ?></div>
                                                    <div class="content-product">
                                                        <div class="product__short-description">
                                                            <?php //the_field("extrait_description"); ?>
                                                            <?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
                                                        </div>
                                                        <a href="<?php the_permalink(); ?>" class="btns">En savoir plus</a>
                                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <?php wp_pagenavi();?>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>

                <!--Prestation-->
                <section id="prestation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="listing-prestation">
                                    <li><a href="<?php echo site_url(); ?>/conditions">
                                        <i class="fas fa-truck"></i>
                                        <div class="titre">Livraison à domicile</div>
                                        </a>
                                    </li>
                                    <li><a href="<?php echo site_url(); ?>/sav/">
                                        <i class="fas fa-info-circle"></i>
                                        <div class="titre">SAV</div>
                                        <p>Services client<br>du lundi au samedi</p></a>
                                    </li>
                                    <li><a href="<?php echo site_url(); ?>/contact">
                                            <i class="fas fa-clipboard-list"></i>
                                            <div class="titre">Devis gratuit</div>
                                            <!-- <p>Préparez en ligne<br>votre visite en magasin</p> -->
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                 <!--Publicité-->
                 <section id="pub">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="listing-pub">
                                    <li>
                                        <img src="<?php bloginfo("template_url");  ?>/images/promo/cable.jpg" class="img-fluid" alt="CABLE INDUSTRIEL">>
                                        <div class="caption">
                                            <div class="titre">
                                                <!-- <span class="promo">-35%</span> -->
                                                <div>
                                                    <strong>CABLE INDUSTRIEL<br/> H07 RN-F</strong>
                                                </div>
                                            </div>
                                            <a href="https://skybar-madagascar.com/produits/cable-h07rnf-5g-6mm%c2%b2-noir/" class="btn-custom2">Nouveaux produits</a>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="<?php bloginfo("template_url");  ?>/images/promo/tpn.jpg" class="img-fluid" alt="TÔLE PLANE NOIR">
                                        <div class="caption">
                                            <div class="titre">
                                                <div>
                                                    <strong>TÔLE PLANE NOIR<br/> S235 JR</strong>
                                                </div>
                                            </div>
                                            <a href="https://skybar-madagascar.com/produits/tpn-2x1m-ep08mm-laf-1280kg-u/" class="btn-custom2">Nouveaux produits</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Partenaires -->
                <section id="partenaire">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p>Découvrez les plus <strong>grandes marques</strong> de Fournitures Industrielles et d'Outillage</p>
                            <ul class="liste-partenaires">
                                <li>
                                    <a href="/?s=schneider+electric">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire1.png" class="img-fluid" alt="schneider">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=milwaukee">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire2.png" class="img-fluid" alt="milwaukee">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=facom">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire3.png" class="img-fluid" alt="facom">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=karcher">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire4.png" class="img-fluid" alt="karcher">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=sdmo">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire5.png" class="img-fluid" alt="sdmo">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=denair">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire6.png" class="img-fluid" alt="denair">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=soudal">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire7.png" class="img-fluid" alt="soudal">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=taliaplast">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire8.png" class="img-fluid" alt="taliaplast">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=chauvin+arnoux">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire9.png" class="img-fluid" alt="chauvin">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=graco">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire10.png" class="img-fluid" alt="graco">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=chicago+pneumatic">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire11.png" class="img-fluid" alt="chicago">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=YALE">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire12.png" class="img-fluid" alt="YALE">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=TEXSA">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire13.png" class="img-fluid" alt="TEXSA">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=SIPLAST">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire14.png" class="img-fluid" alt="SIPLAST">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=DELTA+PLUS">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire15.png" class="img-fluid" alt="DELTA">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=DESAUTEL">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire16.png" class="img-fluid" alt="DESAUTEL">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=ENARCO">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire17.png" class="img-fluid" alt="ENARCO">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=IMER">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire18.png" class="img-fluid" alt="IMER">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=LINCOLN+ELECTRIC">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire19.png" class="img-fluid" alt="LINCOLN">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=SIDAMO">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire20.png" class="img-fluid" alt="SIDAMO">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=VIRAX">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire21.png" class="img-fluid" alt="VIRAX">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=BASF">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire22.png" class="img-fluid" alt="BASF">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=zolpan">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire23.png" class="img-fluid" alt="zolpan">
                                    </a>
                                </li><li>
                                    <a href="/?s=ALTRAD">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire24.png" class="img-fluid" alt="ALTRAD">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=GOLZ">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire25.png" class="img-fluid" alt="GOLZ">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=HIMEL">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire26.png" class="img-fluid" alt="HIMEL">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=CONMIX">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire27.png" class="img-fluid" alt="CONMIX">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=pentax">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire28.png" class="img-fluid" alt="pentax">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<?php get_footer();

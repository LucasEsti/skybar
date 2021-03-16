<?php

/**
 * Template Name: Accueil
 */

get_header(); ?>

    <!-- Slider -->
    <section id="slider" class="container">
        <div class="row">
            <div class="col-sm-7">
                <ul class="liste-slider">
                    <?php if( have_rows('slider_section1') ): ?>
                        <?php while( have_rows('slider_section1') ): the_row(); ?>
                            <li>
                                <?php if( get_sub_field('type_video') ): ?>
                                    <div class="item video">
                                        <video class="slide-video slide-media" loop muted preload="metadata" poster="<?php the_sub_field('image'); ?>">
                                            <source src="<?php the_sub_field('video'); ?>" type="video/mp4" />
                                        </video>
                                    </div>  
                                <?php else : ?>
                                    <img src="<?php the_sub_field('image'); ?>" class="img-fluid">
                                <?php endif; ?>       
                                <div class="caption"> 
                                    <a href="<?php the_sub_field('lien'); ?>" class="btn-custom2"><?php the_sub_field('bouton'); ?></a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-sm-5">
                <?php if( get_field('image_promo_section2') ): ?>
                    <div class="block-images">
                        <a href="<?php the_field('lien_promo_section2'); ?>" class="lien"></a>
                        <img src="<?php the_field('image_promo2_mobile_section2'); ?>" class="img-fluid mobile" alt="himel">
                        <img src="<?php the_field('image_promo_section2'); ?>" class="img-fluid" alt="himel">
                    </div>
                <?php endif; ?>
                <?php if( get_field('image_promo2_section2') ): ?>
                    <div class="block-images">
                        <a href="<?php the_field('lien_promo2_section2'); ?>" class="lien"></a>
                        <img src="<?php the_field('image_promo2_mobile2_section2'); ?>" class="img-fluid mobile" alt="Delta">
                        <img src="<?php the_field('image_promo2_section2'); ?>" class="img-fluid" alt="Delta">
                    </div>
                <?php endif; ?>
            </div>
            <?php if( get_field('image_promo_full') ): ?>
                <div class="col-sm-12">
                    <div class="block-images promo">
                        <a href="<?php the_field('lien_bandeau_section2'); ?>" class="lien"></a>
                        <img src="<?php the_field('image_promo_full2'); ?>" class="img-fluid mobile" alt="nouvel an">
                        <img src="<?php the_field('image_promo_full3'); ?>" class="img-fluid ipad" alt="nouvel an">
                        <img src="<?php the_field('image_promo_full'); ?>" class="img-fluid desktop" alt="nouvel an">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Nos <strong>nouveautés</strong> du moment</h1>
                        </div>
                        <div class="col-sm-12">
                            <div class="wrapper">
                                <div class="header">
                                  <i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
                                  <i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
                                </div>
                                <div class="products grid group">
                                <?php //, 'post__in'=> array(39559)
                                $ref = new WP_Query(array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '15')); ?>
	                                <?php  if( $ref->have_posts() ) : while( $ref->have_posts() ) : $ref->the_post(); ?>
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
                                                            <img src="<?php echo $image['url']; ?>" alt="<?php the_title();?>" class="img-fluid" />
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
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
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
                                    <?php if( have_rows('publicite', 'option') ): $i = 0;?>
                                        <?php while( have_rows('publicite', 'option') ): the_row(); 
                                        $i++;
			
                                        if( $i > 2 )
                                        {
                                            break;
                                        }
                                        ?>
                                            <li>
                                                <img src="<?php the_sub_field('fond'); ?>" class="img-fluid" alt="CABLE INDUSTRIEL">>
                                                <div class="caption">
                                                    <div class="titre">
                                                        <!-- <span class="promo">-35%</span> -->
                                                        <div>
                                                            <strong><?php the_sub_field('titre'); ?></strong>
                                                        </div>
                                                    </div>
                                                    <a href="<?php the_sub_field('lien'); ?>" class="btn-custom2"><?php the_sub_field('bouton'); ?></a>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Partenaires -->
                <section id="partenaire">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <?php if( get_field('titre_nos_partenaire', 'option') ): ?>
                                <p><?php the_field('titre_nos_partenaire', 'option'); ?></p>
                            <?php endif; ?>
                            <ul class="liste-partenaires">
                                <?php if( have_rows('liste_partenaires', 'option') ): ?>
                                    <?php while( have_rows('liste_partenaires', 'option') ): the_row(); ?>
                                        <li>
                                            <a href="<?php the_sub_field('lien'); ?>">
                                                <img src="<?php the_sub_field('logo'); ?>" class="img-fluid" alt="schneider">
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Newsletter -->
                <section id="newsletter">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="news">
                                    <?php if( get_field('fond_newsletter', 'option') ): ?>
                                        <img src="<?php the_field('fond_newsletter', 'option'); ?>" class="img-fluid" alt="newsletter">
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if( get_field('titre_newsletter', 'option') ): ?>
                                            <div class="titre">
                                                <i class="fas fa-paper-plane"></i> <?php the_field('titre_newsletter', 'option'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <ul class="input">
                                            <?php if( get_field('description_newsletter', 'option') ): ?>
                                                <li><?php the_field('description_newsletter', 'option'); ?></li>
                                            <?php endif; ?>
                                            <li>
                                                <!-- Begin Mailchimp Signup Form -->
                                                <form action="https://batpro-madagscar.us18.list-manage.com/subscribe/post?u=4b73f06c0dc5f5e68295c3f35&amp;id=bd990ba08d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter__form" target="_blank" novalidate>
                                                    <input type="email" value="" name="EMAIL" class="required email newsletter__form-input" id="mce-EMAIL" placeholder="Saisissez votre adresse email*">
                                                    <div id="mce-responses" class="clear">
                                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_4b73f06c0dc5f5e68295c3f35_bd990ba08d" tabindex="-1" value=""></div>
                                                    <button class="newsletter__form-submit" name="subscribe" id="mc-embedded-subscribe">S'inscrire <i class="fas fa-envelope"></i></button>
                                                </form>
                                                <!--End mc_embed_signup-->
                                            </li>
                                        </ul>
                                        <?php if( get_field('footer_texte_newsletter', 'option') ): ?>
                                            <?php the_field('footer_texte_newsletter', 'option'); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

<?php get_footer(); ?>

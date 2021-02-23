<?php

/**
 * Template Name: PAGE FLEXIBLE
 */

get_header(); ?>

<?php
if( have_rows('page_dynamique') ): ?>
	<?php while ( have_rows('page_dynamique') ) : the_row(); ?>
    <?php if( get_row_layout() == 'banniere_page' ): ?>
        <section id="banniere" class="container">
            <?php if( get_sub_field('image_banniere_page') ): ?>
                <img src="<?php the_sub_field('image_banniere_page'); ?>" class="img-fluid desktop">
            <?php endif; ?>
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid ipad" src="<?php the_field("images_ipad"); ?>" alt="Banniere">

            <div class="content">
                <div class="titres"><?php the_title(); ?></div>
            </div>
        </section>
         <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
        </nav>
    <?php elseif( get_row_layout() == 'texte_gauche_image_droite' ):  ?>
        <section id="text-image" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php if( get_sub_field('contenu_texte_gauche_image_droite') ): ?>
                        <div><?php the_sub_field('contenu_texte_gauche_image_droite'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                    <?php 
                    $imagess = get_sub_field('image_texte_gauche_image_droite');
                    $images1  = $imagess[0]; 
                    if( $images1 < 1 ) : ?> 
                        <div class="box-image"><img src="<?php echo $images1['url']; ?>" class="img-fluid" alt="<?php echo $images1['alt']; ?>"></div>
                    <?php else : ?>
                        <div class="slider-page">
                            <?php foreach( $imagess as $images ): ?>
                                <div class="box-image"><img src="<?php echo $images['url']; ?>" class="img-fluid" alt="<?php echo $images['alt']; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12">
                    <?php if( get_sub_field('description_texte_gauche_image_droite') ): ?>
                        <div><?php the_sub_field('description_texte_gauche_image_droite'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'image_gauche_texte_droite' ):  ?>
        <section id="text-image" class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php 
                    $images = get_sub_field('image_image_gauche_texte_droite');
                    $image1  = $images[0]; 
                    if( $image1 < 1 ) : ?> 
                        <div class="box-image"><img src="<?php echo $image1['url']; ?>" class="img-fluid" alt="<?php echo $image1['alt']; ?>"></div>
                    <?php else : ?>
                        <div class="slider-page">
                            <?php foreach( $images as $image ): ?>
                                <div class="box-image"><img src="<?php echo $image['url']; ?>" class="img-fluid" alt="<?php echo $image['alt']; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6 d-flex align-items-center">
                    <?php if( get_sub_field('contenu_image_gauche_texte_droite') ): ?>
                        <div><?php the_sub_field('contenu_image_gauche_texte_droite'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'zone_de_texte' ):  ?>
        <section id="zone-texte" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if( get_sub_field('contenu_zone_de_texte') ): ?>
                        <?php the_sub_field('contenu_zone_de_texte'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'zone_de_texte_bleu' ):  ?>
        <section id="zone-texte" class="bleu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if( get_sub_field('contenu_zone_de_texte_bleu1') ): ?>
                            <?php the_sub_field('contenu_zone_de_texte_bleu1'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'texte_video' ):  ?>
        <section id="texte-video">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( get_sub_field('logo_texte_video') ): ?>
                            <a href="<?php the_sub_field('lien_texte_video'); ?>"><div class="logo"><img src="<?php the_sub_field('logo_texte_video'); ?>" class="img-fluid"></div></a>
                        <?php endif; ?>
                        <?php if( get_sub_field('contenu_texte_video') ): ?>
                            <?php the_sub_field('contenu_texte_video'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( get_sub_field('video_texte_video') ): ?>
                            <iframe width="100%" height="350" src="<?php the_sub_field('video_texte_video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'titre_section' ):  ?>
        <section id="titre-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if( get_sub_field('titre_titre_section') ): ?>
                            <div class="titre"><?php the_sub_field('titre_titre_section'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'video_texte' ):  ?>
        <section id="texte-video" class="mobile-rtl">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( get_sub_field('video_video_texte') ): ?>
                            <iframe width="100%" height="350" src="<?php the_sub_field('video_video_texte'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( get_sub_field('logo_video_texte') ): ?>
                            <a href="<?php the_sub_field('lien_video_texte'); ?>"><div class="logo"><img src="<?php the_sub_field('logo_video_texte'); ?>" class="img-fluid"></div></a>
                        <?php endif; ?>
                        <?php if( get_sub_field('contenu_video_texte') ): ?>
                            <?php the_sub_field('contenu_video_texte'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'clients_batpro' ):  ?>
        <section id="clients" class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                    $imagesc = get_sub_field('logo_clients_batpro');
                    if( $imagesc ): ?>
                    <ul>
                        <?php foreach( $imagesc as $imagec ): ?>
                            <li>
                                <a href="<?php echo esc_attr($imagec['alt']); ?>">
                                    <img src="<?php echo esc_url($imagec['url']); ?>" alt="<?php echo esc_attr($imagec['alt']); ?>" class="img-fluid"/>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'faq' ):  ?>
        <div id="wrapperIntern">
            <div class="cntboxTxt">
                <div class="container">
                    <div class="cntAccordion">
                        <?php if(get_sub_field('liste_faq')): ?>
                            <?php while(has_sub_field('liste_faq')): ?>
                                <div class="itemAccordion">
                                    <h3><?php the_sub_field('titre'); ?>
                                        <span class="icnbox"></span>
                                    </h3>
                                    <div class="bodyAccordion">
                                        <?php the_sub_field('contenu'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    <?php elseif( get_row_layout() == 'statistique_batpro' ):  ?>
        <div id="statistics">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="titre"><span>BATPRO</span> en chiffre c’est aussi plus de </div>   
                        </div>
                        <div class="col-sm-6 text-center">
                            <span class="statvalue" numx="100">0</span>
                            <p>fournisseurs de renommée<br>
                            internationale distribués à Madagascar</p>
                        </div>
                        <div class="col-sm-6 text-center">
                            <span class="statvalue" numx="1000">0</span>
                            <p>clients professionnels<br>
                            satisfaits
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
	<?php endif; ?>
    <?php endwhile;  ?>
<?php else : endif; ?>

<!-- Partenaires -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
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

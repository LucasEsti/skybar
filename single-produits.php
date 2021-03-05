<?php

get_header(); ?>
  <!-- Banniere -->
  <section id="banniere" class="container">
        <?php
            $terms = get_the_terms( $post->ID , 'nos-produits');
            
            if( $terms[0]->parent != 0 ) {
                $terms = array_reverse($terms, false);
            }
            
            $lengthTerms = count($terms) - 1 ;
            $images = get_field( 'taxonomy_banniere', 'nos-produits_'.$terms[$lengthTerms]->parent);
            $imagesipad = get_field( 'taxonomy_banniere_ipad', 'nos-produits_'.$terms[$lengthTerms]->parent);
            $imagesmobile = get_field( 'taxonomy_banniere_mobile', 'nos-produits_'.$terms[$lengthTerms]->parent);

            echo '<img src="'. $images['url'] .'" class="img-fluid desktop">';
            echo '<img src="'. $imagesipad['url'] .'" class="img-fluid ipad">';
            echo '<img src="'. $imagesmobile['url'] .'" class="img-fluid mobile">';
        ?>
        <div class="content">
            <div class="titres">

                <ul class="taxonomy">
                <li><?php echo $terms[$lengthTerms]->name; ?></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Nos produits</a></li>
            <li class="breadcrumb-item">
                <ul class="taxonomy">
                    
                    
                    <?php foreach ( $terms as $term ) {  ?>
                    <li><a href="<?php echo get_term_link($term->term_id); ?>">
                            <?php echo  $term->name ;  }  ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>

    <!-- Contenu Page -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!--Détail-->
                <section id="detail-produit">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="liste-detail1">
                                <?php
                                $images = get_field('galerie_produit');
                                if( $images ): ?>
                                    <?php foreach( $images as $image ): ?>
                                        <li>
                                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <ul class="liste-detail2">
                                <?php
                                $images = get_field('galerie_produit');
                                if( $images ): ?>
                                    <?php foreach( $images as $image ): ?>
                                        <li>
                                            <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid">
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <div class="btncartmobile mobile">
                                <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                    <?php if( $featured_posts ): ?>
                                        <?php foreach( $featured_posts as $post ): ?>
                                    <a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>
                                        <?php endforeach;  wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                <span class="custompanier">
                                    <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                </span>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <h4 class="reference-produit"><?php if( get_field('marques') ): ?><strong>Marque:</strong> <?php the_field('marques'); ?> - <?php endif; ?>  <?php if( get_field('references') ): ?><strong>Ref:</strong> <?php the_field('references'); ?><?php endif; ?></h4>
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <div class="scroll-desc">
                                        <?php if( get_field('extrait_description') ): ?>
                                            <div class="extrait-description">
                                                <p><?php the_field('extrait_description'); ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ( !empty( get_the_content() ) ){  ?>
                                            <div class="more">
                                                <?php the_content(); ?>
                                            </div>
                                            <a href="javascript:void(0)" class="read"></a>
                                        <?php } ?>
                                    </div>
                                <?php endwhile; endif; ?>
                                
                                <?php $colors = get_field( 'color' );?>
                                
                                <?php if( $colors ): ?>
                                    Color:
                                       <select>
                                            <?php foreach( $colors as $color ): ?>
                                                <option id="<?php echo $color ?>"><?php echo $color ?></option>
                                            <?php endforeach;  wp_reset_postdata(); ?>

                                        </select>
                                <?php endif; ?>
                                    
                                    
                                <div class="ipad">
                                    <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                        <?php if( $featured_posts ): ?>
                                            <?php foreach( $featured_posts as $post ): ?>
                                        <a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>
                                            <?php endforeach;  wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    <span class="custompanier">
                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                    </span>
                                </div>
                                    
                                <div class="desktop">
                                    <?php $featured_posts = get_field('departement_ou_equipe'); ?>
                                        <?php if( $featured_posts ): ?>
                                            <?php foreach( $featured_posts as $post ): ?>
                                        <a href="mailto:<?php the_field( 'email' ); ?>" class="btns outline contactexpert">Contacter l'expert</a>
                                            <?php endforeach;  wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    <span class="custompanier">
                                        <?php echo do_shortcode('[bpcart_button product="'.get_the_ID().'"]')?>
                                    </span>
                                </div>

                                <ul class="marque">
                                    <?php if( $featured_posts ): ?>
                                        <?php foreach( $featured_posts as $post ): ?>
                                            <li>
                                                <div class="phone"><i class="fas fa-user"></i><?php the_field( 'nom-du-responsable' ); ?></div>
                                                <div class="phone"><i class="fas fa-mobile"></i><?php the_field( 'mobile' ); ?></div>
                                                <div class="phone"><i class="fas fa-phone-square-alt"></i><?php the_field( 'telephone' ); ?></div>
                                                <div class="mail"><a href="mailto:<?php the_field( 'email' ); ?>"><i class="fas fa-envelope"></i><?php the_field( 'email' ); ?></a></div>
                                            </li>
                                            <?php endforeach;  wp_reset_postdata(); ?>
                                    <?php endif; ?>
                                    <?php if( get_field('fiche_produit') ): ?>
                                        <li class="down">
                                            Fiche produit<br>
                                            <a href="<?php the_field('fiche_produit'); ?>" class="btn-down" target="_blank">Télécharger <i class="fas fa-file-download"></i></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
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

                <!-- Nouveautes -->
                <section id="nouveaux">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Ces articles peuvent vous intéresser !</h2>
                            <ul class="liste-articles">
                                <?php

                                $ref = new WP_Query(array('post_type' => 'produits', 'orderby' => 'rand', 'posts_per_page' => '10' ,
                                    'tax_query' => array(
                                        array(
                                          'taxonomy' => 'nos-produits',
                                          'field' => 'id',
                                          'terms' => $terms[0]->term_id
                                        )
                                    )
                                )); ?>
	                                <?php  if( $ref->have_posts() ) : while( $ref->have_posts() ) : $ref->the_post(); ?>
                                        <li>
                                            <div class="product">
                                                <div class="content-product-imagin"></div>
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
                                                                <?php echo wp_trim_words( get_field("extrait_description"), 23, '...' ); ?>
                                                            </div>
                                                            <a href="<?php the_permalink(); ?>" class="btns">En savoir plus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </ul>
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
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire1.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=milwaukee">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire2.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=facom">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire3.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=karcher">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire4.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=sdmo">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire5.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=denair">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire6.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=soudal">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire7.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=taliaplast">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire8.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=chauvin+arnoux">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire9.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=graco">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire10.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=chicago+pneumatic">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire11.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=YALE">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire12.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=TEXSA">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire13.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=SIPLAST">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire14.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=DELTA+PLUS">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire15.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=DESAUTEL">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire16.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=ENARCO">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire17.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=IMER">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire18.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=LINCOLN+ELECTRIC">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire19.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=SIDAMO">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire20.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=VIRAX">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire21.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=BASF">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire22.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=zolpan">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire23.png" class="img-fluid">
                                    </a>
                                </li><li>
                                    <a href="/?s=ALTRAD">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire24.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=GOLZ">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire25.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=HIMEL">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire26.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=CONMIX">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire27.png" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="/?s=pentax">
                                        <img src="<?php bloginfo("template_url");  ?>/images/partenaire28.png" class="img-fluid">
                                    </a>
                                </li>
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
                                    <img src="<?php bloginfo("template_url"); ?>/images/slider.jpg" class="img-fluid">
                                    <div class="content">
                                        <div class="titre">
                                            <i class="fas fa-paper-plane"></i> Restez informés
                                        </div>
                                        <ul class="input">
                                        <li>
                                                Abonnez-vous à notre newsletter et soyez les premiers informés<br>
                                                de nos actualités, de nos promotions, de nos nouveautés. <br>
                                            </li>
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
                                        <p>Votre adresse email sera uniquement utilisée pour vous envoyer nos newsletter (offres commerciales, promotions, etc.). Vous pouvez à tout<br>
                                        moment utiliser le lien de désabonnement intégré dans la newsletter. <a href="<?php site_url(); ?>/politique-de-confidentialite/">En savoir plus sur la gestion de vos donnés et vos droits</a>
                                        </p>
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

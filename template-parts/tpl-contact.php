<?php

/**
 * Template Name: Contact
 */

get_header(); ?>

<section id="sectwrapper">
    <div id="banniere" class="container">
        <div class="banniereimg" >
            <img class="img-fluid mobile" src="<?php the_field("images_mobile"); ?>" alt="Banniere">
            <img class="img-fluid desktop" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>" alt="Banniere">
        </div>
        <div class="content">
            <div class="titres"><?php the_title(); ?></div>
        </div>
    </div>
    <div id="wrapperIntern">
        <div id="sectContact" class="boxbg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bannieretxt">
                            <div class="container">
                                <h1 class="titleborder"><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 colForm">
                        <?php if( get_field('contenu_contact') ): ?>
                            <?php the_field('contenu_contact'); ?>
                        <?php endif; ?>
                        <div id="boxcontact">     
                            <?php echo do_shortcode('[contact-form-7 id="31138" title="Contact"]'); ?>              
                        </div>
                    </div>
                    <div class="col-lg-5 coordAside">
                        <h3>Nos experts</h3>
                        <div class="listCoord">
                            <div class="listing-contact" style="background: url(<?php the_field('nos_expert_fond_contact'); ?>)">
                                <div class="txtCoord">
                                    <?php if( get_field('antananarivo') ): ?>
                                        <div class="cntNumb"><?php the_field('antananarivo'); ?></div>
                                    <?php endif; ?>
                                    <?php if( get_field('antananarivo_adressez') ): ?>
                                        <address>
                                            <?php the_field('antananarivo_adressez'); ?>
                                        </address>
                                    <?php endif; ?>
                                    <?php if( get_field('antananarivo_tel') ): ?>
                                        <a href="tel:<?php the_field('antananarivo_tel'); ?>" class="boxtel"><?php the_field('antananarivo_tel'); ?></a>
                                    <?php endif; ?>
                                    <?php if( get_field('antananarivo_email') ): ?>
                                        <a href="mailto:<?php the_field('antananarivo_email'); ?>" class="boxtel"><?php the_field('antananarivo_email'); ?></a>
                                    <?php endif; ?>
                                </div>
                                <?php if( have_rows('liste_expert_contact') ): ?>
                                    <?php while( have_rows('liste_expert_contact') ): the_row(); ?>
                                        <div class="txtCoord">
                                            <div class="cntNumb"><?php the_sub_field('nom'); ?></div>
                                            <address><?php the_sub_field('profil'); ?></address>
                                            <a href="tel:<?php the_sub_field('tel'); ?>" class="boxtel"><?php the_sub_field('tel'); ?></a>
                                            <a href="tel:<?php the_sub_field('phone'); ?>" class="boxtel"><?php the_sub_field('phone'); ?></a>
                                            <a href="mailto:<?php the_sub_field('email'); ?>" class="boxtel"><?php the_sub_field('email'); ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="itemCoord">
                                <div class="cntimg">
                                    <img class="img-fluid" src="<?php //bloginfo("template_url"); ?>/images/background_1.jpg" alt="">
                                </div>
                                <div class="txtCoord">
                                    <div class="cntNumb">Antananarivo</div>
                                    <address>
                                        Bd,  Ratsimandrava<br>BP 757<br>Soanierana
                                    </address>
                                    <a href="#" class="boxtel">+ 261 (20) 22 620 13 / 14 / 15</a>
                                    <a href="mailto:commercial@batpro.mg" class="boxtel">commercial@batpro.mg</a>
                                </div>
                            </div> -->
                            <div class="itemCoord">
                                <?php if( get_field('fond_toamasina') ): ?>
                                    <div class="cntimg">
                                        <img class="img-fluid" src="<?php the_field('fond_toamasina'); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="txtCoord">
                                    <?php if( get_field('toamasina') ): ?>
                                        <div class="cntNumb"><?php the_field('toamasina'); ?></div>
                                    <?php endif; ?>
                                    <?php if( get_field('toamasina_adresse') ): ?>
                                        <address>
                                            <?php the_field('toamasina_adresse'); ?>
                                        </address>
                                    <?php endif; ?>
                                    <?php if( get_field('toamasina_tel') ): ?>
                                        <a href="tel:<?php the_field('toamasina_tel'); ?>" class="boxtel"><?php the_field('toamasina_tel'); ?></a><br>
                                    <?php endif; ?>
                                    <?php if( get_field('toamasina_phone') ): ?>
                                        <a href="tel:<?php the_field('toamasina_phone'); ?>" class="boxtel"><?php the_field('toamasina_phone'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

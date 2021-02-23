
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-2 d-flex align-items-center">
                    <div>
                        <a href="<?php echo get_home_url(); ?>" class="logo-footer">
                            <?php if( get_field('logo_footer', 'option') ): ?>
                                <img src="<?php the_field('logo_footer', 'option'); ?>" class="img-fluid" width="200" alt="Logo">
                            <?php endif; ?>
                        </a>
                        <?php if( get_field('logo_footer2', 'option') ): ?>
                            <div class="logos">
                                <img src="<?php the_field('logo_footer2', 'option'); ?>" class="img-fluid" alt="Logo">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-2 menus">
                    <div class="titres">Informations</div>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu-footer', 'menu_id' => 'menu-footer' ) ); ?>
                </div>
                <div class="col-sm-6 noustrouver">
                    <div class="titres">Nous trouver</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Antananarivo</strong></p>
                            <ul class="infos">
                                <?php if( get_field('antananarivo_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('antananarivo_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_antananarivo', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_antananarivo', 'option'); ?>"><i class="fas fa-envelope"></i><?php the_field('email_antananarivo', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_antananarivo', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_antananarivo', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Toamasina</strong></p>
                            <ul class="infos">
                                <?php if( get_field('toamasina_adresse', 'option') ): ?>
                                    <li><i class="fas fa-map-marker-alt"></i><?php the_field('toamasina_adresse', 'option'); ?></li>
                                <?php endif; ?>
                                <?php if( get_field('email_toamasina', 'option') ): ?>
                                    <li><a href="mailto:<?php the_field('email_toamasina', 'option'); ?>"><i class="fas fa-envelope"></i><?php the_field('email_toamasina', 'option'); ?></a></li>
                                <?php endif; ?>
                                <?php if( get_field('tel_toamasina', 'option') ): ?>
                                    <li><i class="fas fa-phone-alt"></i><?php the_field('tel_toamasina', 'option'); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 partenaires">
                    <div class="titres">Nos partenaires</div>
                    <ul class="logo2">
                        <?php if( have_rows('partenair_footer', 'option') ): ?>
                            <?php while( have_rows('partenair_footer', 'option') ): the_row(); ?>
                                <li>
                                    <a href="<?php the_sub_field('lien'); ?>" target="_blank">
                                        <img src="<?php the_sub_field('logo'); ?>" class="img-fluid" alt="scb madagascar">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->
    <div id="copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <?php if( get_field('copyright', 'option') ): ?>
                        <div>
                            <?php the_field('copyright', 'option'); ?> 
                        ‎</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    


</body>
<script src="<?php bloginfo("template_url");  ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/popper.min.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/slick.min.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/jquery.waypoints.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/count.js"></script>
<script src="<?php bloginfo("template_url");  ?>/js/aos.js"></script>
<?php wp_footer(); ?>
<script src="<?php bloginfo("template_url");  ?>/js/script.js"></script> 

</body>
</html>
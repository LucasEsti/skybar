<?php

/**
 * Template Name: Promo page
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
	<!-- Breadcrumb -->
	<nav aria-label="breadcrumb" class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Accueil</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
		</ol>
	</nav>
	<section id="pub">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<ul class="listing-pub">
						<?php if( have_rows('publicite', 'option') ): ?>
							<?php while( have_rows('publicite', 'option') ): the_row(); ?>
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
</section>



<?php get_footer(); ?>

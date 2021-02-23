<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>
<!-- Banniere -->
<section id="banniere" class="container">
	<img src="<?php echo site_url(); ?>/wp-content/uploads/2020/12/Recherche-01.jpg" class="img-fluid">
	<div class="content">
		<div class="titres">
			<?php _e( 'Resultat de recherche pour :  ', 'twentynineteen' ); ?>&nbsp;<span class="page-description"><?php  echo get_search_query(); ?></span>
		</div>
	</div>
</section>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="container">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>">Accueil</a></li>
		<li class="breadcrumb-item active" aria-current="page">
			<?php _e( 'Resultat de recherche pour :  ', 'twentynineteen' ); ?> <span class="page-description"> <?php echo get_search_query(); ?></span>
		</li>
	</ol>
</nav>
<?php if (have_posts()) : ?>
<section id="nouveaux" class="container" style="margin-top: 3rem;">
	<div class="row">
		<div class="col-sm-12">
			<h1><span class="page-description"><?php echo get_search_query(); ?></span></h1>
		</div>
		<div class="col-sm-12">
			<div class="wrapper">
				<div class="header">
					<i class="[ icon  icon--grid ]  [ fa  fa-th ]  [ icon ]  active"></i>
					<i class="[ icon  icon--list ]  [ fa  fa-list ]  [ icon ]"></i>
				</div>
				<div class="products grid group">
					<?php while (have_posts()) : the_post(); ?>
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
	</div>
</section>
	<?php
		else : ?>
		<section id="nouveaux" class="container" style="margin: 7% auto;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1>0 resultat pour : <?php echo get_search_query(); ?></h1>
				</div>
			</div>
		</section>
	<?php
		endif;
	?>
<?php
get_footer();

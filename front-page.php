<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package whitespace
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>
			<section class="hero-section" id="hero-section">
				<?php
				if ( have_rows( 'hero_section' ) ) :
					while ( have_rows( 'hero_section' ) ) : the_row(); ?>
						
						<h2 class="tagline"><?php echo get_sub_field( 'tagline' ); ?></h2>
						<p class="description"><?php echo get_sub_field( 'description' ); ?></p>	

						<?php 
						$image = get_sub_field('image');
						echo wp_get_attachment_image( $image, 'full', "", array( 'class' => "hero-image", ) ); 
						?>

					<?php
					endwhile;
				endif; ?>
			</section>

			<section class="service-section" id="service-section">
				<h2>Our Services</h2>
				<?php 
				if ( have_rows( 'service_section' ) ) : 
					while ( have_rows( 'service_section' ) ) : the_row(); ?>
						<p><?php echo get_sub_field( 'description' ); ?></p>
						<?php 
						if ( have_rows( 'pricing_type' ) ) : ?>
							<div class="service-header">
								<?php
								while( have_rows( 'pricing_type' ) ) : the_row(); ?>
									<section class="service-card">
										<?php echo get_sub_field( 'pricing_title' ); ?>
										<?php 
										$image = get_sub_field( 'pricing_icon' ); 
										echo wp_get_attachment_image( $image, array( '50', '50' ), "", array( 'class' => "pricing-icon header", ) );
										?>
									</section>
								<?php
								endwhile; ?>
							</div>
							<div class="service-detail">
								<?php
								while( have_rows( 'pricing_type') ) : the_row(); ?>
									<p class="pricing-tag"><?php echo get_sub_field( 'pricing_tag' ); ?></p>
									<p class="suitable-for"><?php echo get_sub_field( 'suitable_for' ); ?></p>
									<p class="details"><?php echo get_sub_field( 'details' ); ?></p>
									<?php 
									$image = get_sub_field( 'pricing_icon' ); 
									echo wp_get_attachment_image( $image, array( '50', '50' ), "", array( 'class' => "pricing-icon detail", ) ); 
									?>			
								<?php
								endwhile; ?>
							</div>
						<?php
						endif;
					endwhile;
				endif;
				?>
			</section>

			<section class="work-section" id="work-section">
				<h2>Our Work</h2>	
				<?php echo do_shortcode( '[carousel_slide id="131"]' ); ?>

			</section>

			<section class="testimonial-section" id="testimonial-section">
				<h2>Testimonials</h2>
				<?php require get_template_directory() . '/inc/custom-testimonial.php'; ?>
			</section>

			<section class="contact-section" id="contact-section">
				<div class="left-column">
				<h2>Let's Work Together</h2>
				<?php 
				if ( have_rows( 'contact_section' ) ) :
					while ( have_rows( 'contact_section' ) ) : the_row(); ?>

						<p class="description 1"><?php echo get_sub_field( 'description-1' ); ?></p>
						<p class="description 2"><?php echo get_sub_field( 'description-2' ); ?></p>
						<span class="contant-email">
							<?php
							$image = get_sub_field( 'email_logo' );
							echo wp_get_attachment_image( $image, array( '32', '32' ), "", array( 'class' => "email-logo" ) );
							?>
							<?php 
							$email = get_sub_field( 'email' ); ?>
							<a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
						</span>

					
					<?php
					endwhile;
				endif;
				?>
				</div>
				<div class="right-column">
					<?php echo do_shortcode( '[wpforms id="34"]' ); ?>
				</div>
			</section>

		<?php
		endwhile; // End of the loop.
		?>

</main><!-- #main -->
<?php
get_footer();

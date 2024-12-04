<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whitespace
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="legal-stuff">
				<ul>
					<li><a href="<?php echo get_permalink( get_page_by_path('privacy-policy') ); ?>">Privacy Policy</a></li>
					<p class="footer-separator">|</p>
					<li><a href="<?php echo get_permalink( get_page_by_path('sample-page') ); ?>">Sample Page</a></li>
				</ul>
			</div>
			<a href="<?php echo get_home_url(); ?>" class="footer-site-logo">Whitespace Studio</a>
			<p class="copyright">Copyright &copy; <?php echo date('Y'); ?> Whitespace Studio</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/** 
 * get logo
 * <img src="<?php echo esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) ); ?>" alt="site logo" class="footer-site-logo">
 *
 */
?>
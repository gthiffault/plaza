<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hôtel_Plaza
 */

?>

	</main><!-- #content -->

	<footer class="c-footer">
		<section class="o-section c-footer_line">
			<div class="o-wrapper">
				<div class="c-line_wrap">
					<div class=c-line></div>
				</div>
			</div>			
		</section>
		<section class="o-section c-footer_content">
			<div class="o-wrapper">
				<div class="o-layout">
					<div class="o-layout__item u-1/3@landscape-small-tablet u-1/2@portrait-small-tablet"><p class="c-footer_title"><?php echo __('Visit us','plaza');?></p>
						<p><?php echo get_field('optAddressFooter','option');?></p>
					</div>
					<div class="o-layout__item u-1/3@landscape-small-tablet u-1/2@portrait-small-tablet"><p class="c-footer_title"><?php echo __('Follow us','plaza');?></p>
					<ul class="c-footer_social-network">
						<li class="-facebook"><a href="<?php echo get_field('optFacebook','option')['url'];?>" target="_blank">FA</a></li>
						<li class="-instagram"><a href="<?php echo get_field('optInstagram','option')['url'];?>" target="_blank">IN</a></li>
						<li class="-trip-advisor"><a href="<?php echo get_field('optTripAdvisor','option')['url'];?>" target="_blank">TA</a></li>
					</ul>
					</div>
					<div class="o-layout__item c-coordonates u-1/3@landscape-small-tablet u-1/2@portrait-small-tablet">
						<div class="c-coordonates_content">
						<p class="c-footer_title"><?php echo __('Contact us','plaza');?></p>
						<p><?php echo get_field('optPhone','option');?>
						<br><?php echo get_field('optTollFree','option');?>
						<br><a href="mailto:<?php echo get_field('optEmail','option');?>"><?php echo get_field('optEmail','option');?></a>
						</p>
						</div>
					</div>				
				</div>
			</div>
		</section>
		<section class="o-section c-footer_copyright">
			<div class="o-wrapper">
<small>© <?php echo date('Y');?> <?php echo __('All rights reserved','plaza');?> - Hôtel plaza - <?php echo __('Project signed ','plaza');?><a href="http://agencezel.com" target="_blank">Zel</a></small>
			</div>			
		</section>		
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>

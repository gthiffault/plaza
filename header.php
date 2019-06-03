<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hôtel_Plaza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Playfair+Display|Open+Sans:300,600,700" rel="stylesheet">
		<script type='text/javascript' src='<?php echo get_template_directory_uri();?>/js/app.js'></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="c-header">
			<div class="c-header_navigation">
				<div class="o-wrapper">
					<div class="c-header_menu">
						<div class="c-header_icon"></div>
						<a class="c-header-logo_device" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logos/hotel-plaza_logo.svg" alt=""></a>
						<button class="hamburger hamburger--spring" type="button">
  							<span class="hamburger-box">
    							<span class="hamburger-inner"></span>
  							</span>
						</button>
						<ul class="o-list-bare c-language-switcher">
<?php echo myselector(); ?>	
</ul>					
					</div>					
					<div class="c-header_logo">
						<a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/images/logos/hotel-plaza_logo.svg" alt=""></a>
					</div>
					<div class="c-header_right"></div>
					<div class="c-header_book-online"><a href="<?php echo get_field('bookingLink','option')['url'];?>" target="_blank" class="c-btn c-btn--secondary"><?php echo __('Reserve now','plaza');?></a></div>
				</div>
			</div>
			<div class="c-header-menu">
				<div class="o-wrapper">
					<div class="o-layout layout--equal-height o-layout--flush">
						<div class="o-layout__item c-header-menu_item u-1/2@landscape-medium-tablet">
							<div class="c-header-menu_item_content">
								<?php wp_nav_menu( array('theme_location' => 'menu-1','menu_id' => 'menu-main',) );?>
								<a href="<?php echo get_field('bookingLink','option')['url'];?>" target="_blank" class="c-btn c-btn--secondary -menu">Réservez maintenant</a>
								<ul class="c-footer_social-network">
									<li class="-facebook"><a href="<?php echo get_field('optFacebook','option')['url'];?>" target="_blank">FA</a></li>
									<li class="-instagram"><a href="<?php echo get_field('optInstagram','option')['url'];?>" target="_blank">IN</a></li>
									<li class="-trip-advisor"><a href="<?php echo get_field('optTripAdvisor','option')['url'];?>" target="_blank">TA</a></li>
								</ul>		
							</div>			
						</div>
						<div class="o-layout__item c-header-menu_image u-1/2">
							<?php $image = get_field('menuImage','option');
							if( !empty($image) ): ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="c-header_banner">
				<?php if ( is_front_page() ) {	?>
					<div class="c-banner-home">
						<?php $images = get_field('bannerGallery');
						if( $images ) { ?>
	    					<ul class="o-list-bare c-home-gallery">
	        					<?php foreach( $images as $image ): ?>
	            					<li style="background: url(<?php echo $image['sizes']['banner-home']; ?>);">
	            					</li>
	        					<?php endforeach; ?>
	    					</ul>
						<?php }?>
						<div class="c-banner-home_text">
							<p class="c-banner-home_main-title"><?php echo get_field('bannerTitle');?></p>
							<p class="c-banner-home_subtitle"><?php echo get_field('bannerSubtitle');?></p>
						</div>
						<div class="o-wrapper -dots">
							<div class="c-dots"></div>
						</div>
					</div>
	 			<?php } elseif ( is_page() ) { ?>	
					<div class="c-banner-page" style="background: url(<?php echo get_field('bannerImage')['sizes']['banner-page']; ?>);">
						<div class="c-banner-home_text">
							<h1><?php echo get_the_title();?></h1>
						</div>
					</div>
	 			<?php } ?>	
 			</div>		
		</header>
		<main class="c-main">
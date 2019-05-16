<?php
/**
 * Template Name: Nous joindre
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Hôtel_Plaza
 */

// Declaration
	// Bloc Txt
		$blocTxtTitle 		= "";
		$blocTxtContent 	= "";
	// Contact information
		$address = "";
		$phone 		="";
		$email 		="";
	// Social network and Google Maps
		$facebook = "";
		$instagram = "";
		$tripadvisor ="";	
	// Background
		$bgImagrOne = "";	

// Initialisation 
	// Bloc Txt
		$blocTxtTitle 		= get_field('blocTxtTitle');
		$blocTxtContent 	= get_field('blocTxtContent');
	// Contact information		
		$address = get_field('optAddress','option');
		$phone = get_field('optPhone','option');
		$email = get_field('optEmail','option');
	// Social network and Google Maps
		$facebook = get_field('optFacebook','option')['url'];
		$instagram = get_field('optInstagram','option')['url'];
		$tripadvisor = get_field('optTripAdvisor','option')['url'];
	// Background
		$bgImagrOne = get_field('bgImageOne')['url'];

get_header();

/* Text block */ ?>
	<section class="o-section c-block-txt -contact-us">
		<div class="o-wrapper -two">
			<h2><?php echo $blocTxtTitle;?></h2>
			<?php echo $blocTxtContent;?>
		</div>
	</section>	

<?php /* Contact us / Form */ ?>
	<section class="o-section c-form -contact-us">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge o-layout--middle o-layout--reverse">
				<div class="o-layout__item u-2/5@landscape-medium-tablet">
					<ul class="o-list-bare c-contact-us_info">
						<li><?php echo $address; ?></li>
						<li><?php echo $phone; ?></li>
						<li><?php echo $email; ?></li>
					</ul>
				</div>					
				<div class="o-layout__item u-3/5@landscape-medium-tablet">
					<div class="c-form_wrap">
						<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');?>
					</div>
				</div>		
			</div>
		</div>
	</section>

<?php /* Social network and Google Maps */ ?>
	<section class="o-section c-social-network-n-google-maps">
		<div class="o-wrapper">
			<div class="c-social-network">
				<h2><?php echo __('Follow us');?></h2>
				<ul class="c-social-network_ul">
					<li class="-facebook"><a href="<?php echo $facebook;?>" target="_blank">FA</a></li>
					<li class="-instagram"><a href="<?php echo $instagram;?>" target="_blank">IN</a></li>
					<li class="-trip-advisor"><a href="<?php echo $tripadvisor;?>" target="_blank">TA</a></li>
				</ul>				
			</div>
			<div id="google-map" class="c-google-maps">

			</div>			
		</div>
		<div class="c-block-background">
			<div class="c-bg" style="background: url(<?php echo $bgImagrOne; ?>"></div>
		</div>			
	</section>	

<?php get_footer();
<?php 
/**
 * Template Name: Services
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Hôtel_Plaza
 */

// Declaration
	// Bloc Txt
		$blocTxtTitle 		= "";
		$blocTxtContent 	= "";
	// Restaurant and bar
		$rbImage 			= "";
		$rbImageTwo 		= "";
		$rbTitle 			= "";
		$rbContent 			= "";
		$rbAccordion 		= "";		
	// Dooly's
		$doolysTitle 		= "";
		$doolysContent		= "";
		$doolysImage 		= "";
		$doolysAccordion 	= "";
	// Background 
		$bgImage 			= "";		
	// Congresses and meetings
		$cmTitle 			= "";
		$cmContent 			= "";
		$cmImage 			= "";
		$cmAccordion 		= "";
	// Wedding
		$weddingTitle 		= "";
		$weddingContent 	= "";
		$weddingImage 		= "";
		$weddingImageTwo 	= "";		
		$weddingAccordion 	= "";	

// Initialisation 
	// Bloc Txt
		$blocTxtTitle 				= get_field('blocTxtTitle');
		$blocTxtContent 			= get_field('blocTxtContent');
	// Restaurant and bar
		$rbImage 					= get_field('RestaurantBarImageOne');
		$rbImageTwo 				= get_field('RestaurantBarImageTwo');	
		$rbTitle 					= get_field('RestaurantBarTitle');	
		$rbContent 					= get_field('RestaurantBarContent');
		$rbAccordion 				= 'RestaurantBarAccordion';
		$rbAccordionTitle 			= 'RestaurantBarAccordionTitle';
		$rbAccordionContent 		= 'RestaurantBarAccordionContent';
	// Dooly's
		$doolysTitle 				= get_field('doolysTitle');
		$doolysContent				= get_field('doolysContent');
		$doolysImage 				= "";
		$doolysAccordion 			= 'doolysAccordion';
		$doolysAccordionTitle 		= 'doolysAccordionTitle';
		$doolysAccordionContent 	= 'doolysAccordionContent';
	// Background 
		$bgImage 					= get_field('bgImageOne')['url'];		
	// Congresses and meetings
		$cmTitle 					= get_field('congressesMeetingsTitle');
		$cmContent 					= get_field('congressesMeetingsContent');
		$cmImage 					= "";
		$cmAccordion 				= 'congressesMeetingsAccordion';
		$cmAccordionTitle 			= 'congressesMeetingsAccordionTitle';
		$cmAccordionContent 		= 'congressesMeetingsAccordionContent';
	// Wedding
		$weddingTitle 				= get_field('weddingTitle');
		$weddingContent 			= get_field('weddingContent');
		$weddingImage 				= get_field('weddingImageOne');
		$weddingImageTwo 			= get_field('weddingImageTwo');		
		$weddingAccordion 			= 'weddingAccordion';
		$weddingAccordionTitle 		= 'weddingAccordionTitle';
		$weddingAccordionContent 	= 'weddingAccordionContent';	

		$seTitle					= 'servicesEquipmentsTitle';
		$seContent 					= 'servicesEquipmentsContent';
		$seAccordion 				= 'servicesEquipmentsAccordion';
		$seAccordionTitle			= 'servicesEquipmentsTitle';
		$seAccordionContent			= 'servicesEquipmentsContent';

get_header();

/* Text block */ ?>
	<section class="o-section c-block-txt -services">
		<div class="o-wrapper -two">
			<h2><?php echo $blocTxtTitle;?></h2>
			<?php echo $blocTxtContent;?>
		</div>
	</section>

<?php /* Restaurant and bar */ ?>
	<section class="o-section c-block-img-txt -type-0 -v0 -restaurant-n-bar">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge -zero">
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_images">
						<?php 
						if( !empty($rbImage) ): ?>
							<img src="<?php echo $rbImage['sizes']['img-type-one']; ?>" alt="<?php echo $rbImage['alt']; ?>" />
						<?php endif; ?>	
						<?php if( !empty($rbImageTwo) ): ?>
							<img class="c-float-image" src="<?php echo $rbImageTwo['url']; ?>" alt="<?php echo $rbImageTwo['alt']; ?>" />
						<?php endif; ?>	
					</div>
				</div>
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_content">
						<h2><?php echo $rbTitle;?></h2>		
						<div class="c-block-img-txt_content_text">
						<?php echo $rbContent;?>
						</div>
						<?php echo do_shortcode('[accordion pagetype="-services" title="none" content="none" accordion="'.$rbAccordion.'" accordiontitle="'.$rbAccordionTitle.'" accordioncontent="'.$rbAccordionContent.'" divtype="div"]');?>
					</div>
				</div>	
			</div>		
		</div>
	</section>

<?php /* Dooly's */ ?>
	<section class="o-section c-block-txt-img -type-2 -v0 -doolys">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge o-layout--reverse">
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-txt-img_images">
						<div class="c-block-txt-img_images_wrap">
						<?php $image = get_field('doolysImageOne');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>	
					</div>
					</div>
				</div>			
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-txt-img_content">
						<h2><?php echo $doolysTitle; ?></h2>
						<div class="c-block-img-txt_content_text">
							<?php echo $doolysContent;?>
						</div>
						<?php echo do_shortcode('[accordion pagetype="-services" title="none" content="none" accordion="' . $doolysAccordion . '" accordiontitle="'.$doolysAccordionTitle.'" accordioncontent="'.$doolysAccordionContent.'" divtype="div"]');?>							
					</div>					
				</div>						
			</div>	
		</div>
	</section>

<?php /* Background image */ ?>
	<section class="o-section c-block-background">
		<div class="c-bg" style="background: url(<?php echo $bgImage;?>"></div>
	</section>	

<?php /* Congresses and meetings*/ ?>
	<section class="o-section c-block-img-txt -type-2 -v1 -congresses-n-meetings">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge o-layout--reverse">
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_content">
						<h2><?php echo $cmTitle; ?></h2>
						<div class="c-block-img-txt_content_text">
							<?php echo $cmContent;?>
						</div>
						<?php echo do_shortcode('[accordion pagetype="-services" title="none" content="none" accordion="'.$cmAccordion.'" accordiontitle="'.$cmAccordionTitle.'" accordioncontent="'.$cmAccordionContent.'" divtype="div"]');?>							
					</div>					
				</div>		
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_images">
						<div class="c-block-img-txt_images_wrap">
						<?php $image = get_field('congressesMeetingsImageOne');
						if( !empty($image) ): ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>	
					</div>
					</div>
				</div>			
			</div>	
		</div>
	</section>

<?php /* Wedding */ ?>

	<section class="o-section c-block-img-txt -type-0 -v1 -wedding">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge -zero">
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_content">
						<h2><?php echo $weddingTitle; ?></h2>		
						<div class="c-block-img-txt_content_text">
						<?php echo $weddingContent;?>
						</div>
						<?php echo do_shortcode('[accordion pagetype="-services" title="none" content="none" accordion="' . $weddingAccordion . '" accordiontitle="'.$weddingAccordionTitle.'" accordioncontent="'.$weddingAccordionContent.'" divtype="div"]');?>												 	
					</div>
				</div>	
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_images">
						<?php $weddingImage = get_field('weddingImageOne');
						$weddingImageTwo = get_field('weddingImageTwo');
						if( !empty($weddingImage) ): ?>
							<img src="<?php echo $weddingImage['url']; ?>" alt="<?php echo $weddingImage['alt']; ?>" />
						<?php endif; ?>	
						<?php if( !empty($weddingImageTwo) ): ?>
							<img class="c-float-image" src="<?php echo $weddingImageTwo['url']; ?>" alt="<?php echo $weddingImageTwo['alt']; ?>" />
						<?php endif; ?>	
					</div>
				</div>			
			</div>		
		</div>
	</section>

<?php /* Servives and equipment */ ?>
	<?php echo do_shortcode('[accordion pagetype="-services-n-equipment" contentvisible="true" title="'.$seTitle.'"
	content="'.$seContent.'" accordion="'.$seAccordion.'" accordiontitle="'.$seAccordionTitle.'" accordioncontent="'.$seAccordionContent.'"
	divtype="section" wrapper="true"]');?>		

<?php /* Background image */ ?>
	<section class="o-section c-block-background -services">
		<div class="c-bg" style="background: url(<?php echo $bgImage;?>"></div>
	</section>		

<?php get_footer();
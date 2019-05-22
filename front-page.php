<?php
/**
 * Template Name: Accueil
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Hôtel_Plaza
 */

// Declaration
	// Bloc Txt
		$blocTxtTitle 		= "";
		$blocTxtContent 	= "";
	// Images and text 
		$itOneImage 		= "";
		$itOneImageTwo 		= "";
		$itOneTitle 		= "";
		$itOneContent 		= "";
		$itOneLink		 	= "";
		$itOneLinkDesc		= "";
	// Image and Image
		$iiImg 				= "";
		$iiImgTwo 			= "";
	// Background 
		$bgImage 			= "";		
	// Congresses and meetings
		$servicesTitle 		= "";
		$servicesRepeater 	= "";
	// Background 
		$bgImageTwo 		= "";		

// Initialisation 
	// Bloc Txt
		$blocTxtTitle 		= get_field('blocTxtTitle');
		$blocTxtContent 	= get_field('blocTxtContent');
	// Images and text 
		$itOneImage 		= get_field('blocImgTxtImageOne');
		$itOneImageTwo 		= get_field('blocImgTxtImageTwo');
		$itOneTitle 		= get_field('blocImgTxtTitle');
		$itOneContent 		= get_field('blocImgTxtContent');
		$itOneLink		 	= get_field('blocImgTxtLink');
		$itOneLinkDesc		= get_field('blocImgTxtLinkDescription');
	// Image and Image
		$iiImg 				= get_field('blocImgTxtImageThree');
		$iiImgTwo 			= get_field('blocImgTxtImageFour');
	// Background 
		$bgImage 			= get_field('servicesImgBefore')['sizes']['img-bg-one']	;
	// Services
		$servicesTitle 		= get_field('servicesTitle');
		$servicesRepeater 	= 'servicesList';
	// Background 
		$bgImageTwo 		= get_field('servicesImgAfter')['sizes']['img-bg-one'];

get_header();

/* Text block */ ?>
	<section class="o-section c-block-txt">
		<div class="o-wrapper -two">
			<h2><?php echo $blocTxtTitle;?></h2>
			<?php echo $blocTxtContent;?>
		</div>
	</section>

<?php /* Images and text */ ?>
	<section class="o-section c-block-img-txt -type-0 -v0 -home">
		<div class="o-wrapper">
			<div class="o-layout o-layout--huge">
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_images">
						<?php if( !empty($itOneImage) ): ?>
							<img src="<?php echo $itOneImage['sizes']['img-type-one']; ?>" alt="<?php echo $itOneImage['alt']; ?>" />
						<?php endif; ?>	
						<?php if( !empty($itOneImageTwo) ): ?>
							<img class="c-float-image" src="<?php echo $itOneImageTwo['sizes']['img-type-thr']; ?>" alt="<?php echo $itOneImageTwo['alt']; ?>" />
						<?php endif; ?>	
					</div>
				</div>
				<div class="o-layout__item u-1/2@portrait-large-tablet">
					<div class="c-block-img-txt_content">
						<h2><?php echo $itOneTitle; ?></h2>				
						<?php echo $itOneContent; ?>
					</div>
					<a class="c-btn c-btn--primary" href="<?php echo $itOneLink; ?>"><?php echo $itOneLinkDesc; ?></a>
				</div>	
			</div>	
		</div>
	</section>

<?php /* Image and image */ ?>
	<section class="o-section c-block-img-img -type-1 -v0">
		<div class="o-wrapper">
			<div class="o-layout o-layout--flush o-layout--reverse">
				<?php if( !empty($iiImg) ): ?>
					<img class="c-float-image" src="<?php echo $iiImg['sizes']['img-type-for']; ?>" alt="<?php echo $iiImg['alt']; ?>" />
				<?php endif; ?>				
				<div class="o-layout__item u-1/2@landscape-medium-tablet u-14/20@portrait-large-tablet">
					<?php if( !empty($iiImgTwo) ): ?>
						<img src="<?php echo $iiImgTwo['sizes']['img-type-fiv']; ?>" alt="<?php echo $iiImgTwo['alt']; ?>" />
					<?php endif; ?>					
				</div>
			</div>		
		</div>	
	</section>

<?php /* Background */ ?>
	<section class="o-section c-block-background">
		<div class="c-bg" style="background: url(<?php echo $bgImage; ?>"></div>
	</section>

<?php /* Services - Home */ ?>
	<section class="o-section c-block-services -home">
		<div class="o-wrapper">
			<h2><?php echo get_field('servicesTitle');?></h2>
			<?php if( have_rows($servicesRepeater)):
				echo '<div class="c-services_first-ul"><ul class="o-layout o-layout--middle c-first-ul">';
			 	// loop through the rows of data
			    while ( have_rows($servicesRepeater)) : the_row();
					// Declaration
					$field = "";
					$value = "";
					$label = "";
					// Initialisation 
					$field = get_sub_field_object('servicesListItem');
					$value = $field['value'];
					$label = $field['choices'][ $value ];

					if($value == 4) {
						echo '</div></ul>';
						echo '<ul class="o-layout o-layout--middle c-second_ul">';
					}

					if($value < 4 ) {?>
						<li class="o-layout__item c-services-<?php echo $value;?> u-1/4"><div class="c-services_icons"></div><p><?php echo $label;?></p></li>
					<?php } else {?>
						<li class="o-layout__item c-services-<?php echo $value;?> u-1/5"><div class="c-services_icons"></div><p><?php echo $label;?></p></li>
			    	<?php } 
			    endwhile;
				echo '</ul>';
			endif;?>

			<?php if( have_rows($servicesRepeater)):
				echo '<div class=""><ul class="o-layout c-services_device o-layout--middle c-services_third-ul">';
			 	// loop through the rows of data
			    while ( have_rows($servicesRepeater)) : the_row();
					// Declaration
					$field = "";
					$value = "";
					$label = "";
					// Initialisation 
					$field = get_sub_field_object('servicesListItem');
					$value = $field['value'];
					$label = $field['choices'][ $value ];?>
						<li class="o-layout__item c-services-<?php echo $value;?>"><div class="c-services_icons"></div><p><?php echo $label;?></p></li>



					<?php endwhile;
				echo '</ul>';
			endif;?>			
			<div class="c-arrows"></div>
			<div class="c-services_link">
				<a href="<?php echo get_field('servicesLink');?>" class="c-btn c-btn--primary"><?php echo get_field('servicesLinkDescription');?></a>	
			</div>
		</div>
	</section>	

<?php /* Background #2 */ ?>
	<section class="o-section c-block-background">
		<div class="c-bg" style="background: url(<?php echo $bgImageTwo; ?>"></div>
	</section>	

<?php get_footer();
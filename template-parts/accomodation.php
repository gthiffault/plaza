<?php
/**
 * Template Name: Hébergement
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Hôtel_Plaza
 */

// Declaration
	// Bloc Txt
		$blocTxtTitle 		= "";
		$blocTxtContent 	= "";
	// Services
		$listTitle 			= "";
		$listDetailed 		= "";
	// List
		$listPostType 				= "";
		$iiImgTwo 			= "";
	// Accordion 
		$charmTitle 			= "";		


	// Congresses and meetings
		$servicesTitle 		= "";
		$servicesRepeater 	= "";
	// Background 
		$bgImageTwo 		= "";		

// Initialisation 
	// Bloc Txt
		$blocTxtTitle 		= get_field('blocTxtTitle');
		$blocTxtContent 	= get_field('blocTxtContent');
	// Services 
		$listTitle 			= get_field('servicesIncludedTitle');
		$listDetailed 		= 'servicesIncludedRepeater';
	// List
		$listPostType 		= 'accommodation';
	// Accordion 
		$charmTitle 			= 'charmsTitle';		
		$chamContent 		= 'charmsContent'; 
		$charmAccordion 	= 'charmsAccordion';
		$charmAccordionTitle = 'charmsAccordionTitle';
		$charmAccordionContent = "charmsAccordionContent";

	// Region
		$regionTitle 		= get_field('regionTitle');
		$regionImages 	=  get_field('gallery');
	// Background 
		$bgImageTwo 		= get_field('servicesImgAfter')['url'];	

get_header();

/* Text block */ ?>
	<section class="o-section c-block-txt">
		<div class="o-wrapper -two">
			<h2><?php echo $blocTxtTitle;?></h2>
			<?php echo $blocTxtContent;?>
		</div>
	</section>

<?php /* Services - Accommodation */ 

if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
  echo ICL_LANGUAGE_CODE;
}
?>
	<section class="o-section c-block-services -accommodation">
		<div class="o-wrapper">
			<h2><?php echo $listTitle; ?></h2>
			<?php if( have_rows($listDetailed) ):
				echo '<ul class="o-layout o-layout--middle c-services -hotel">';
				    while ( have_rows($listDetailed) ) : the_row();
						// Declaration
						$field = "";
						$value = "";
						$label = "";
						// Initialisation 
						$field = get_sub_field_object('servicesIncludedService');
						$value = $field['value'];
						$label = $field['choices'][ $value ];?>

						<li class="o-layout__item c-services-<?php echo $value;?>"><div class="c-services_icons"></div><p><?php echo $label;?></p></li>
				    <?php endwhile;
				echo '</ul>';?>
				<div class="c-arrows -accommodation"></div>
			<?php endif; ?>
		</div>
	</section>

<?php /* List - Accommodation */ ?>
	<section class="o-section c-block-list -accommodation">
		<div class="o-wrapper">
			<?php $args = array('post_type' => $listPostType);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {?>
				<div class="o-layout o-layout--medium">
					<div class="o-layout__item c-column-first u-1/2">
						<ul class="o-list-bare">
			    			<?php 
			$count = 0;
			    			while ( $query->have_posts() ) {
			    				$query->the_post(); 
			    				if ($query->current_post % 2 == 0) {
									echo do_shortcode('[list_accommodation count="' . $count .'"]');
									$count = $count + 2;
			    				}
							} 
							wp_reset_postdata();?>
						</ul>
					</div>

					<?php if($query->post_count > 1) { ?>
						<div class="o-layout__item c-column-second u-1/2">
							<ul class="o-list-bare">
				    			<?php 
			$countEven = 1;
				    			while ( $query->have_posts() ) {
				    				$query->the_post(); 
				    				if ($query->current_post % 2 == 1) {
										echo do_shortcode('[list_accommodation count="' . $countEven .'"]');
										$countEven = $countEven + 2;
				    				}
				    				
								}
								wp_reset_postdata();?>
							</ul>
						</div>
					<?php } ?>
					<div class="o-layout__item c-column-third u-1/1">
						<ul class="o-list-bare">
			    			<?php 
			$countResponsive = 0;
			    			while ( $query->have_posts() ) {
			    				$query->the_post(); 
									echo do_shortcode('[list_accommodation count="' . $countResponsive .'"]');
										$countResponsive = $countResponsive + 1;
							}
							wp_reset_postdata();?>
						</ul>
					</div>					
				</div>
						
			<?php } ?>
		</div>
	</section> 

<?php /* Tourist attractions - Accommodaton*/ ?>
	<?php echo do_shortcode('[accordion pagetype="-accommodation" id="packages" contentvisible="true" title="'.$charmTitle.'" content="'.$chamContent.'"
	accordion="'.$charmAccordion.'" accordiontitle="'.$charmAccordionTitle.'" accordioncontent='.$charmAccordionContent.'" divtype="section" wrapper="true"]');?>

<?php /* Region - Accommodations */ ?>
	<section class="o-section c-block-region">
		<div class="o-wrapper">
			<h2><?php echo $regionTitle;?></h2>
			<?php if( $regionImages ): ?>
	    		<ul class="o-layout o-layout--large o-layout--middle c-block-region_ul">
	        		<?php foreach( $regionImages as $image ): ?>
	            		<li class="o-layout__item">
			            	<?php $link = get_field('link_media', $image['ID']);
							if($link) {
								echo '<a href="' . $link . '" target="_blank">';
							}?>
	            	 		 <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php if($link) {
								echo '</a>';
							}?>
	            		</li>
	        		<?php endforeach; ?>
	    		</ul>
			<?php endif; ?>
			<div class="c-arrows -region"></div>
		</div>
	</section>

<?php get_footer();
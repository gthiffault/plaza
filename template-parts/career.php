<?php
/**
 * Template Name: Carrière
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Hôtel_Plaza
 */

// Declaration
	// Bloc Txt
		$blocTxtTitle 		= "";
		$blocTxtContent 	= "";
	// List
		$listPostType 		= "";
	// Form
		$formTitle 			= "";
		$formContent 		= "";
	// Background
		$bgImagrOne 		= "";	
		
// Initialisation 
	// Bloc Txt
		$blocTxtTitle 		= get_field('blocTxtTitle');
		$blocTxtContent 	= get_field('blocTxtContent');
	// List
		$listPostType 		= 'career';
	// Form
		$formTitle 			= get_field('formTitle');
		$formContent 		= get_field('formContent');
	// Background
		$bgImageOne = get_field('bgForm')['sizes']['img-bg-two'];


get_header();
/* Text block */ ?>
	<section class="o-section c-block-txt -career">
		<div class="o-wrapper -two">
			<h2><?php echo $blocTxtTitle;?></h2>
			<?php echo $blocTxtContent;?>
		</div>
	</section>	

<?php /* List - Career */ ?>
	<section class="o-section c-block-list -career">
		<div class="o-wrapper">
			<?php $args = array('post_type' => $listPostType);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {?>
				<div class="o-layout o-layout--medium">
					<div class="o-layout__item c-column-first u-1/2">
						<ul class="o-list-bare">
			    			<?php while ( $query->have_posts() ) {
			    				$query->the_post(); 
			    				if ($query->current_post % 2 == 0) {
									$image_id = get_post_thumbnail_id();
									$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);?>
			        				<li>
			        					<figure>
			        						<?php if (($image_id)) {?>
			        						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'list-img');?>" alt="<?php echo $image_alt;?>">
			        					<?php } else { ?>
			        						<img src="<?php echo get_template_directory_uri();?>/images/logos/hotel-plaza_logo.svg" alt="">
			        					<?php }?>
			        						<figcaption>
			        							<h3><?php echo get_the_title();?></h3>
			        							<div class="c-career_item_content">
			        								<div class="c-career_item_description">
			        									<?php echo get_field('careerContent');?>
			        								</div>
			        								<a href="#c-career_form" class="c-btn c-btn--primary"><?php echo __('Apply now','plaza');?></a>
			        							</div>
			        							<div class="c-icon"></div>
			        						</figcaption>
			        					</figure>
			        				</li>
			    				<?php }
							} 
							wp_reset_postdata();?>
						</ul>
					</div>

					<?php if($query->post_count > 1) { ?>
						<div class="o-layout__item c-column-second u-1/2">
							<ul class="o-list-bare">
				    			<?php while ( $query->have_posts() ) {
				    				$query->the_post(); 
				    				if ($query->current_post % 2 == 1) {
				    					$image_id = get_post_thumbnail_id();
				    					$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);?>
				        				<li>
				        					<figure>
				        						<?php if (($image_id)) {?>
			        						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'list-img');?>" alt="<?php echo $image_alt;?>">
			        					<?php } else { ?>
			        						<img src="<?php echo get_template_directory_uri();?>/images/logos/hotel-plaza_logo.svg" alt="">
			        					<?php }?>
				        						<figcaption>
				        							<h3><?php echo get_the_title();?></h3>
				        							<div class="c-career_item_content">
				        								<div class="c-career_item_description">
				        									<?php echo get_field('careerContent');?>
				        								</div>
				        								<a href="#c-career_form" class="c-btn c-btn--primary"><?php echo __('Apply now','plaza');?></a>
				        							</div>
				        							<div class="c-icon"></div>
				        						</figcaption>
				        					</figure>
				        				</li>
				    				<?php }
								}
								wp_reset_postdata();?>
							</ul>
						</div>						
					<?php } ?>
<div class="o-layout__item c-column-third u-1/1">
							<ul class="o-list-bare">
				    			<?php while ( $query->have_posts() ) {
				    				$query->the_post(); 
				    					$image_id = get_post_thumbnail_id();
				    					$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);?>
				        				<li>
				        					<figure>
				        						<?php if (($image_id)) {?>
			        						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'list-img');?>" alt="<?php echo $image_alt;?>">
			        					<?php } else { ?>
			        						<img src="<?php echo get_template_directory_uri();?>/images/logos/hotel-plaza_logo.svg" alt="">
			        					<?php }?>
				        						<figcaption>
				        							<h3><?php echo get_the_title();?></h3>
				        							<div class="c-career_item_content">
				        								<div class="c-career_item_description">
				        									<?php echo get_field('careerContent');?>
				        								</div>
				        								<a href="#c-career_form" class="c-btn c-btn--primary"><?php echo __('Apply now','plaza');?></a>
				        							</div>
				        							<div class="c-icon"></div>
				        						</figcaption>
				        					</figure>
				        				</li>
				    				<?php
								}
								wp_reset_postdata();?>
							</ul>
						</div>					
				</div>
			<?php } ?>
		</div>
	</section> 

<?php /* Form - Career */ ?>
	<section id="c-career_form" class="o-section c-form -career">
		<div class="o-wrapper">
			<div class="c-form_content">
				<h2><?php echo $formTitle;?></h2>
				<?php echo $formContent;?>	
			</div>	
			<div class="c-form_wrap">
				<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');?>
			</div>
		</div>
		<div class="c-block-background">
			<div class="c-bg" style="background: url(<?php echo $bgImageOne; ?>"></div>
		</div>		
	</section>

<?php get_footer();
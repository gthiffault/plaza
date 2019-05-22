<?php
/**
 * Template Name: L'Hôtel
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hôtel_Plaza
 */

get_header();
?>
<section class="o-section c-block-txt">
	<div class="o-wrapper -two">
	<h2><?php echo get_field('blocTxtTitle');?></h2>
	<?php echo get_field('blocTxtContent');?>
	</div>
</section>
<section class="o-section c-block-img-txt -type-3 -v0">
	<div class="o-wrapper">
		<div class="o-layout o-layout--huge">
			<div class="o-layout__item u-3/5@portrait-large-tablet">
				<div class="c-block-img-txt_images">
					<?php $image = get_field('blocImgTxtImageOne');
					$imageTwo = get_field('blocImgTxtImageTwo');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['sizes']['img-type-one']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>	
					<?php if( !empty($imageTwo) ): ?>
						<img class="c-float-image" src="<?php echo $imageTwo['sizes']['img-type-one']; ?>" alt="<?php echo $imageTwo['alt']; ?>" />
					<?php endif; ?>	
				</div>
			</div>
			<div class="o-layout__item u-2/5@portrait-large-tablet">
				<div class="c-block-img-txt_content">
					<?php echo get_field('blocImgTxtContent');?>
				</div>
			</div>	
		</div>	
	</div>
</section>

<section class="o-section c-block-gallery">
<?php 

$images = get_field('gallery');

if( $images ): ?>

    <ul class="o-list-bare c-gallery_device">
        <?php foreach( $images as $image ): ?>
        	 <?php $width = get_field('width_media', $image['ID']);?>
             <li><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" /></li>
        <?php endforeach; ?>
    </ul>

    <div class="c-gallery -desktop">
    		    			<div class="grid-sizer"></div>
        <?php foreach( $images as $image ): ?>
        	 <?php $width = get_field('width_media', $image['ID']);?>
            <div class="grid-item <?php echo $width;?>">
                <a href="<?php echo $image['url']; ?>">
                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
	            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</section>

<section class="o-section c-block-txt-img -type-4 -v0">
	<div class="o-wrapper">
		<div class="o-layout o-layout--huge">
			<div class="o-layout__item u-9/20@portrait-large-tablet">
				<div class="c-block-txt-img_content">
						<h2><?php echo get_field('blocTxtImgTitle');?></h2>
					<?php echo get_field('blocTxtImgContent');?>
				<div class="c-block-txt-img_content_image">
					<?php $image = get_field('blocTwoImgTxtImageOne');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['sizes']['img-type-two']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>	
				</div>					
				</div>
			</div>		
			<div class="o-layout__item u-11/20@portrait-large-tablet">
				<div class="c-block-txt-img_images">
					<div class="c-block-txt-img_images_wrap">
					<?php $image = get_field('blocTxtImgImageOne');
					$imageTwo = get_field('blocTxtImgImageTwo');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['sizes']['img-type-six']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>	
					<?php if( !empty($imageTwo) ): ?>
						<img class="c-float-image" src="<?php echo $imageTwo['sizes']['img-type-six']; ?>" alt="<?php echo $imageTwo['alt']; ?>" />
					<?php endif; ?>	
				</div>
				<div class="c-block-txt-img_images_content">
					<div class="c-block-img-txt_content_wrap">
					<?php echo get_field('blocTwoImgTxtContent');?>
					<?php if(get_field('blocTwoImgTxtLink').length) {?><a class="c-btn c-btn--primary" href="<?php echo get_field('blocTwoImgTxtLink')['url'];?>#packages"><?php echo get_field('blocTwoImgTxtLinkDescription');?></a><?php } ?>
				</div>
				</div>					
				</div>
			</div>			
		</div>	
	</div>
</section>
<section class="o-section c-block-img-txt -type-2 -v2">
	<div class="o-wrapper">
		<div class="o-layout o-layout--huge">

			<div class="o-layout__item u-11/20@portrait-large-tablet c-content">
				<div class="c-block-img-txt_content">
					<div class="c-block-img-txt_content_wrap">
					<?php echo get_field('blocTwoImgTxtContent');?>
					<?php if(get_field('blocTwoImgTxtLink').length) {?><a class="c-btn c-btn--primary" href="<?php echo get_field('blocTwoImgTxtLink')['url'];?>#packages"><?php echo get_field('blocTwoImgTxtLinkDescription');?></a><?php } ?>
				</div>
				</div>
			</div>
			<div class="o-layout__item u-9/20@portrait-large-tablet">
				<div class="c-block-img-txt_images">
					<?php $image = get_field('blocTwoImgTxtImageOne');
					if( !empty($image) ): ?>
						<img src="<?php echo $image['sizes']['img-type-two']; ?>" alt="<?php echo $image['alt']; ?>" />
					<?php endif; ?>	
				</div>	
			</div>				
		</div>	
	</div>
</section>

<?php echo do_shortcode('[accordion pagetype="-hotel" gallery="true" contentvisible="true" title="activitiesTitle" content="activitiesContent" accordion="activitiesAccordion" accordiontitle="activitiesAccordionTitle" accordioncontent="activitiesAccordionContent" divtype="section" wrapper="true"]');?>





<section class="o-section c-block-background">
	<div class="c-bg" style="background: url(<?php echo get_field('bgAfterActivities')['sizes']['img-bg-one']; ?>"></div>
</section>	


<?php get_footer();
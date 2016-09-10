<?php
/**
 * Frontpage
 *
 * @package     Sinophilia
 * @author      Thu Phan
 * @link        http://sinophilia.de
 * @copyright   Copyright (c) 2016, Sinophilia
 * @license     GPL-3.0+
 */

 //full width
add_action ('full_width_content', 'do_full_width_content');
add_filter('body_class', 'add_full_width_body_class');
function add_full_width_body_class($classes) {
	$classes[] ='full-width-template';
	return $classes; }

add_filter( 'genesis_attr_site-inner', 'sk_attributes_site_inner' );

/**
 * Add attributes for site-inner element.
 *
 * @since 2.0.0
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_attributes_site_inner( $attributes ) {
	$attributes['role']     = 'main';
	$attributes['itemprop'] = 'mainContentOfPage';
	return $attributes;
}

// Remove div.site-inner's div.wrap
add_filter( 'genesis_structural_wrap-site-inner', '__return_empty_string' );
function do_full_width_content () { 
while ( have_posts() ) : the_post();
?>
	<section id="sin-services-wrap" class="full-width-section full-width-section-1">
		<div class="wrap">
			<?php
				echo the_field('services');
				?>
		</div>
	</section>
		<section id="sin-expert-wrap" class="full-width-section full-width-section-2">
		<div class="wrap">
			<?php
				echo the_field('experten');
				?>
		</div>
	</section>
			<section id="sin-testi-wrap" class="full-width-section full-width-section-3">
		<div class="wrap">
			<?php
				echo the_field('testimonials');
				?>
		</div>
			</section>
		<section id="sin-contact-wrap" class="full-width-section full-width-section-4"><div class="wrap">
	<?php the_content(); ?>
	</div>
		</section>
	<?php
	endwhile;
}
// Display header
get_header();
// Content

/*genesis_widget_area( 'home-welcome',
   array(
	   'before' => '<div class="home-welcome">',
	   'after' => '</div>',
   ));

genesis_widget_area( 'call-to-action',
   array(
	   'before' => '<div class="call-to-action">',
	   'after' => '</div>',
   ));
*/
do_action('full_width_content');
get_footer();
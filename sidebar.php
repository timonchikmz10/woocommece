<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autozone
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="aside" class='col-md-3'>
<div class="aside">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="checkbox-filter">
		<?php if (is_active_sidebar('sidebar-2')) : ?>
			<?php dynamic_sidebar('sidebar-2'); ?>
		<?php endif; ?>
	</div>
</aside><!-- #secondary -->
</div>
</div>
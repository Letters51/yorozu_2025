<?php

/**
 * The sidebar containing the main widget area
 * 
 * @package scratch
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="container">
		<div class="container__inner"> <?php dynamic_sidebar('sidebar-1'); ?> </div>
	</div>
</aside> <!-- #secondary -->
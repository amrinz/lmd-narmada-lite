<?php
	$lmd_sidebar = cmb2_get_option('lmd_main', 'layout', 'rightsidebar');

		switch ($lmd_sidebar) {
			case "leftsidebar":
				$lmd_sidebar_class = 'col-lg-3 order-1';
				break;
			case "onecolumn":
				$lmd_sidebar_class = 'd-none';
				break;
			default:
				$lmd_sidebar_class = 'col-lg-3 order-2';
		}
?>

<div id="lmd-sidebar" class="col-match-height <?php echo $lmd_sidebar_class; ?>">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) : ?>
		<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php">Add New Widget</a></p>
	<?php endif; ?>
</div><!--/lmd-sidebar-->
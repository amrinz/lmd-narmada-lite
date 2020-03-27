<?php get_header(); 
	$lmd_sidebar = cmb2_get_option('lmd_main', 'layout', 'rightsidebar');

		switch ($lmd_sidebar) {
			case "leftsidebar":
				$lmd_content_class = 'col-lg-9 order-2';
				break;
			case "onecolumn":
				$lmd_content_class = 'col-lg-12';
				break;
			default:
				$lmd_content_class = 'col-lg-9 order-1';
		}
?>
	
	<div class="section section-blog">
		<div class="container">
			<div class="row match-height">
				<div id="lmd-content" class="col-match-height <?php echo $lmd_content_class; ?>">

				<?php
					
					if (have_posts()) : ?>

						<div class="row match-height">
						
						<?php $i = 0; while (have_posts()) : the_post();
			
							get_template_part( 'lmd-excerpt');
						
							$i++;

							if ($i == 3) {
								echo '</div><div class="row match-height">';
								$i = 0;
							}

						endwhile; 
						
						echo '</div><!--last-row-->';
						get_template_part('lmd-nav-site');
					
					else:

						get_template_part('lmd-nothing');
					
					endif; ?>

				</div><!--/lmd-content-->

				<?php get_sidebar(); ?>

		</div><!--/container-->
	</div><!--/section-->

<?php get_footer(); ?>
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
			<div class="row">
				<div id="lmd-content" class="<?php echo $lmd_content_class; ?>">
			
					<?php $i = 0; if (have_posts()) : ?>

						<div class="page-header">

                            <h1 class="pageTitle"><?php _e( 'Search Result for', 'lombokmedia' ); ?> <i><?php echo get_search_query() ?></i></h1>

							<?php echo get_the_archive_description(); ?>

                        </div>

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

							get_template_part('lmd-nosearch');
					
						endif; ?>

				</div><!--/lmd-content-->

				<?php get_sidebar(); ?>

		</div><!--/container-->
	</div><!--/section-->

<?php get_footer(); ?>
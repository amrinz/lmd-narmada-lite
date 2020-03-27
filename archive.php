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
			
					<?php
						
						if (have_posts()) : ?>

						<div class="page-header">

						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                            <?php /* If this is a category archive */ if (is_category()) { ?>
                                <h1 class="pageTitle"><?php _e('Archive |', 'lombokmedia') ?> <?php single_cat_title(); ?></h1>

                            <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                                <h1 class="pageTitle"><?php _e('Archive |', 'lombokmedia') ?> <?php single_tag_title(); ?></h1>

                            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                                <h1 class="pageTitle"><?php _e('Archive |', 'lombokmedia') ?> <?php the_time( get_option( 'date_format' ) ); ?></h1>

                            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                                <h1 class="pageTitle"><?php _e('Archive |', 'lombokmedia') ?> <?php the_time('F, Y'); ?></h1>

                            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                                <h1 class="pageTitle"><?php _e('Archive |', 'lombokmedia') ?> <?php the_time('Y'); ?></h1>

                            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                                <h1 class="pageTitle"><?php _e('All Posts by ', 'lombokmedia'); the_author(); ?></h1>

                            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                                <h1 class="pageTitle"><?php _e('Archive | Blog', 'lombokmedia') ?></h1>

                        <?php } ?>

							<?php echo get_the_archive_description(); ?>

                        </div>

						<div class="row match-height">
						
						<?php $i = 0; while (have_posts()) : the_post();
			
							get_template_part( 'lmd-excerpt');

							$i++;

							if ($i == 2) {
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
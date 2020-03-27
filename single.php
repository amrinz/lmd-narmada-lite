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
	
	<div class="section section-single">
		<div class="container">
			<div class="row">
				<div id="lmd-content" class="<?php echo $lmd_content_class; ?>">
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
						<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> role="article">

							<?php if ( has_post_thumbnail() ) {
									echo '<div class="post-thumbnail">';					
									the_post_thumbnail('posthumb', array('class' => 'post-img img-fluid') );
									echo '</div>';
							} ?>

							<div class="post-content">
								<header class="post-header">
									<h1 class="post-title"><?php the_title(); ?></h1>
									<ul class="post-meta post-date list-inline">
										<li class="list-inline-item"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php the_time( get_option( 'date_format' ) ); ?></li>
										<li class="list-inline-item"><i class="fa fa-folder"></i>&nbsp;&nbsp;<?php the_category(', '); ?></li>
										<li class="list-inline-item"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></li>
										<?php echo '<li class="list-inline-item"><i class="fa fa-comments"></i> '; comments_popup_link('0', '1', '%'); echo '</li>'; ?>
										<?php edit_post_link( 'Edit', '<li class="list-inline-item"><i class="fa fa-edit"></i>&nbsp;&nbsp;', '</li>'); ?>
									</ul>
								</header>

								<section class="post-body">
									<?php the_content(); ?>
								</section>
							</div>

						</article>
									
					<?php endwhile; comments_template(); ?>
							
						<div class="navigation-single">
							<div class="prev-posts"><?php previous_post_link() ?></div>
							<div class="next-posts"><?php next_post_link() ?></div>
						</div>

					<?php endif; ?>
				</div><!--/lmd-content-->

				<?php get_sidebar(); ?>

		</div><!--/container-->
	</div><!--/section-->

<?php get_footer(); ?>
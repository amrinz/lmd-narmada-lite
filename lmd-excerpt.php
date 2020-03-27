<?php 
	$lmd_blog_style = cmb2_get_option('lmd_main', 'blog_style', 1); 
?>
					
				<div class="col-match-height <?php if($lmd_blog_style == 2) { echo 'col-lg-6'; } else { echo 'col-lg-12'; } ?>">


					<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> role="article">

						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>">
						<?php

							if ( has_post_thumbnail() ) {
					
									the_post_thumbnail('posthumb', array('class' => 'post-img img-fluid') );
								
								} else {

									echo '<img src="'.get_template_directory_uri().'/img/default-thumbnail.jpg" class="post-img img-fluid" />';
								   
								}

							echo '</a></div>';
						?>

						<div class="post-content">
							<header class="post-header">
								<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>"><?php the_title(); ?></a></h2>
									
									<ul class="post-meta post-date list-inline">
										<li class="list-inline-item"><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php the_time( get_option( 'date_format' ) ); ?></li>
										<li class="list-inline-item"><i class="fa fa-folder"></i>&nbsp;&nbsp;<?php the_category(', '); ?></li>
										<li class="list-inline-item"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?></li>
										<?php echo '<li class="list-inline-item"><i class="fa fa-comments"></i> '; comments_popup_link('0', '1', '%'); echo '</li>'; ?>
										<?php edit_post_link( 'Edit', '<li class="list-inline-item"><i class="fa fa-edit"></i>&nbsp;&nbsp;', '</li>'); ?>
									</ul>

							</header>							

								<section class="post-body">
									<?php the_excerpt(); ?>
								</section>
							
						</div>
					</article>
				</div>		

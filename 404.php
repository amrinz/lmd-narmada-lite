<?php get_header(); ?>
	
	<div class="section section-page">
		<div class="container">
			<div class="row">
				<div id="lmd-content" class="col-lg-12">
									
						<div id="post-404" class="post" role="article">
							<header class="post-header">
								<p>Error 404</p>
								<h1 class="post-title">Page not found</h1>
							</header>

							<div class="post-body">
								<p>The page you requested not found.</p> 
								<p>You can start from <a href="<?php echo home_url(); ?>">Home</a> or try search form.</p>
								<p>&nbsp;</p>
									<div class="row">
										<div class="offset-lg-2 col-lg-8"><?php get_search_form(); ?></div>
									</div>
								<p>&nbsp;</p>
							</div>
						</div><!--/post-->

				</div><!--/lmd-content-->

				<?php //get_sidebar(); ?>

		</div><!--/container-->
	</div><!--/section-->

<?php get_footer(); ?>
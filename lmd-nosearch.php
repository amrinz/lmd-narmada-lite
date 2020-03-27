<div id="post-404" class="post" role="article">
	<header class="post-header">
		<p><?php _e('Nothing Found for', 'lombokmedia') ?></p>
		<h1 class="post-title"><i><?php echo get_search_query() ?></i></h1>
	</header>

	<div class="post-body">
		<p><?php _e('Your search keyword(s)', 'lombokmedia') ?> <strong><em><?php echo get_search_query() ?></em></strong> <?php _e('return no matched result.', 'lombokmedia') ?></p>
		<p><?php _e('Please try another search keyword.', 'lombokmedia') ?></p>
		<p>&nbsp;</p>
			<div class="row">
				<div class="col-lg-12"><?php get_search_form(); ?></div>
			</div>
		<p>&nbsp;</p>
	</div>
</div><!--/post-->
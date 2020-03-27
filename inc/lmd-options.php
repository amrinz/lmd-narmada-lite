<?php
/* LombokMedia Functions 
Contents:
- Disable Frontend Bar
- Limit Words
- Add info to dashboard footer
- Remove dashboard widget
- lmd_head_cleanup()
- lmd_related_posts()
- lmd_page_navi()
- Miscelaneous Class
*/

/******************** add some info into admin footer ********************/
function lmd_admin_footer() {
  echo 'Created by <a href="https://lombokmedia.web.id">LombokMedia</a>';
  echo ' & <a href="https://WordPress.org">WordPress</a>. ';
}

add_filter('admin_footer_text', 'lmd_admin_footer');

/******************* Login Logo ***********************/
function lmd_custom_login_logo() {
echo '<style type="text/css">h1 a { background-image:url('.get_template_directory_uri().'/login.png) !important; }</style>';
}
add_action('login_head', 'lmd_custom_login_logo');

/******************** changing the wp-admin login link and title ********************/
function lmd_login_url() {  return 'https://lombokmedia.web.id'; }
function lmd_login_title() { return 'LombokMedia - Professional Web Desain in Mataram Lombok'; }

// calling it only on the login page
add_filter( 'login_headerurl', 'lmd_login_url' );
add_filter( 'login_headertext', 'lmd_login_title' );

/******************** remove WP version from scripts ********************/
	function lmd_remove_wp_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	// remove WP version from css
	add_filter( 'style_loader_src', 'lmd_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'lmd_remove_wp_ver_css_js', 9999 );

/******************** Numeric Page Navi (built into the theme by default) ********************/
function lmd_page_navi() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	//add class to prev-next-link
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');

	function posts_link_attributes() {
		return 'class="page-link"';
	}

	echo '<nav aria-label="Page navigation" class="navigation"><ul class="pagination justify-content-center">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link('&laquo;') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="page-item active"' : '';

		printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="page-item"><a>...</a></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="page-item active"' : '';
		printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="page-item"><a class="page-link">...</a></li>' . "\n";

		$class = $paged == $max ? ' class="page-item active"' : '';
		printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link('&raquo;') );

	echo '</ul></nav>' . "\n";

} /* end page navi */

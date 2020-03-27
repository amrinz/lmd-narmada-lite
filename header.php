<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta <?php bloginfo( 'charset' ); ?>>
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

	<link rel="icon" type="image/x-icon" href="<?php echo cmb2_get_option( 'lmd_main', 'favicon', get_template_directory_uri().'/favicon.ico' ); ?>" />

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>

<div class="navbar lmd-navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">

		<a class="navbar-brand" href="<?php echo home_url(); ?>">
			<?php $var = cmb2_get_option( 'lmd_main', 'logo' ); if(!empty($var)) { echo '<img src="'.$var.'" alt="logo"/>'; } else { echo get_bloginfo('name'); } ?>
		</a>
		  
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		<?php
			wp_nav_menu( array(
					'menu'              => 'main-menu',
					'theme_location'    => 'main-menu',
					'depth'             => 2,
					'container'         => 'div',
					'container_id'      => 'navbarNav',
					'container_class'   => 'collapse navbar-collapse',
					'menu_id'      			=> 'lmd-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker())
			);
		?>

	</div><!--/container-->
</div><!--/navbar-->

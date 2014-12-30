<header class="header">
	<div class="wrapper">
		<div class="header__branding">
			<h1 class="header__branding__logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory');?>/images/logo.png" alt="Arizana District Council"></a></h1>
		</div><!-- .header__branding -->

		<nav id="header__menu" class="header__menu navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'arizona-district' ); ?></button>
			<?php arizona_district_custom_menu(); ?>
		</nav><!-- #site-navigation -->
	</div><!-- .header-wrapper -->
</header><!-- #masthead -->

<div class="menu_panels">
	<?php arizona_district_custom_menu_panels(); ?>
</div><!-- .menu_panels -->
<header role="banner" id="top-navbar">

	<div class="container">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12 header-magzee">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
				<?php
					if(has_custom_logo())
					{	
						the_custom_logo();
					}
					else { 
				?> 
					<span class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></span>
				<?php	
					}
				?>
				
				<?php
					$magzee_site_desc = get_bloginfo( 'description');
					if ($magzee_site_desc) : ?>
						<p class="site-description"><?php echo esc_html($magzee_site_desc); ?></p>
				<?php endif; ?>
			</a>
		</div>
		
		<?php 
			$magzee_hs_contact_infos	= get_theme_mod('hide_show_contact_infos','1'); 
			$magzee_header_email		= get_theme_mod('header_email'); 
			$magzee_header_contact		= get_theme_mod('header_contact_num'); 
		?>

		<div class="col-md-8 col-sm-8 col-xs-12 header-contact">
			<?php if($magzee_hs_contact_infos == '1') { ?>
				<!-- Start Contact Info -->
				<ul class="pull-right">
					<?php if($magzee_header_email) { ?> 
						<li class="header-email"><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html($magzee_header_email); ?>"> <?php echo esc_html($magzee_header_email); ?> </a></li>
					<?php } ?>
					
					<?php if($magzee_header_contact) { ?> 
						<li class="header-contact"><i class="fa fa-phone-square"></i><a href="tel:<?php echo esc_html($magzee_header_contact); ?>"> <?php echo esc_html($magzee_header_contact); ?></a></li>
					<?php } ?>
				</ul>
				<!-- /End Contact Info -->
			<?php } ?>
		</div>
	</div>
</div>
</header>

<nav class='navbar navbar-default nav-magzee <?php echo esc_attr(specia_sticky_menu()); ?>' role='navigation'>
	
	<div class="container">

		<!-- Mobile Display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php _e('Toggle navigation','magzee');?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- /Mobile Display -->

		<!-- Menu Toggle -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		<?php 
			wp_nav_menu( 
				array(  
					'theme_location' => 'primary_menu',
					'container'  => '',
					'menu_class' => 'nav navbar-nav navbar-right',
					'fallback_cb' => 'specia_fallback_page_menu',
					'walker' => new specia_nav_walker()
					 ) 
				);
		?>
		</div>
		<!-- Menu Toggle -->
		
	</div>
</nav>

<div class="clearfix"></div>
<?php 
if ( !is_page_template( 'templates/template-homepage-one.php' )) {
		specia_breadcrumbs_style(); 
	}
?>
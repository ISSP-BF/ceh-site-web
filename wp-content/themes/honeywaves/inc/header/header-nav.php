<div class="header-rgt index5">
	<?php the_custom_logo();?>
		<div class="custom-logo-link-url">
    	<h1 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" ><?php bloginfo( 'name' ); ?></a>
    	</h1>
    	<?php
		$honeywaves_description = get_bloginfo( 'description', 'display' );
		if ( $honeywaves_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $honeywaves_description; ?></p>
		<?php endif; ?>
		</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light navbar5">
	<div class="container">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'honeywaves'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<div class="ml-auto">
		<?php
		 $honeywaves_shop_button = '<ul class="nav navbar-nav mr-auto">%3$s';
		 if ( class_exists( 'WooCommerce' ) ) {
			$honeywaves_shop_button .= '<li class="nav-item"><div class="cart-header">';
					global $woocommerce;
					$honeywaves_cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
					$honeywaves_shop_button .= '<a class="cart-icon" href="'.esc_url($honeywaves_cart_link).'" >';

					if ($woocommerce->cart->cart_contents_count == 0){
							$honeywaves_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
						}
						else
						{
							$honeywaves_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
						}

						$honeywaves_shop_button .= '</a>';

						$honeywaves_shop_button .= '<a href="'.esc_url($honeywaves_cart_link).'" ><span class="cart-total">
							'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'honeywaves'), $woocommerce->cart->cart_contents_count).'</span></a>';
						}
			$honeywaves_shop_button .= '</ul>';

			$honeywaves_menu_class='';
			 wp_nav_menu( array
	            (
	            'theme_location'=> 'honeypress-primary',
	            'menu_class'    => 'nav navbar-nav mr-auto '.$honeywaves_menu_class.'',
	            'items_wrap'  => $honeywaves_shop_button,
	            'fallback_cb'   => 'honeypress_fallback_page_menu',
	            'walker'        => new Honeypress_nav_walker()
	            ));
	        ?>
		</div>
		</div>
	</div>
</nav>

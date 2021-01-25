<section id="specia-header" class="header-top-info-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-5">
                <!-- Start Social Media Icons -->
				<?php 
					
					$magzee_hs_social			= get_theme_mod('hide_show_social','1'); 
					$magzee_facebook_link		= get_theme_mod('facebook_link',''); 
					$magzee_linkedin_link		= get_theme_mod('linkedin_link',''); 
					$magzee_twitter_link		= get_theme_mod('twitter_link',''); 
					$magzee_googleplus_link		= get_theme_mod('googleplus_link',''); 
					$magzee_instagram_link		= get_theme_mod('instagram_link',''); 
					$magzee_dribble_link		= get_theme_mod('dribble_link',''); 
					$magzee_github_link			= get_theme_mod('github_link',''); 
					$magzee_bitbucket_link		= get_theme_mod('bitbucket_link',''); 
					$magzee_email_link			= get_theme_mod('email_link',''); 
					$magzee_skype_link			= get_theme_mod('skype_link',''); 
					$magzee_skype_action_link	= get_theme_mod('skype_action_link',''); 
					$magzee_vk_link				= get_theme_mod('vk_link','');
					$magzee_pinterest_link		= get_theme_mod('pinterest_link','');	
									
				?>
				
				
					<?php if($magzee_hs_social == '1') { ?>
						<ul class="social pull-left">
							<?php if($magzee_facebook_link) { ?> 
								<li><a href="<?php echo esc_url($magzee_facebook_link); ?>"><i class="fa fa-facebook"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_linkedin_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_linkedin_link); ?>"><i class="fa fa-linkedin"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_twitter_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_twitter_link); ?>"><i class="fa fa-twitter"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_googleplus_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_googleplus_link); ?>"><i class="fa fa-google-plus"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_instagram_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_instagram_link); ?>"><i class="fa fa-instagram"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_dribble_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_dribble_link); ?>"><i class="fa fa-dribbble"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_github_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_github_link); ?>"><i class="fa fa-github-alt"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_bitbucket_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_bitbucket_link); ?>"><i class="fa fa-bitbucket"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_email_link) { ?> 
							<li><a href="mailto:<?php echo esc_attr($magzee_email_link); ?>"><i class="fa fa-envelope-o"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_skype_link) { ?> 
							<li><a href="<?php echo esc_attr($magzee_skype_link); ?>?<?php echo esc_attr($magzee_skype_action_link); ?>"><i class="fa fa-skype"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_vk_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_vk_link); ?>"><i class="fa fa-vk"></i></a></li>
							<?php } ?>
							
							<?php if($magzee_pinterest_link) { ?> 
							<li><a href="<?php echo esc_url($magzee_pinterest_link); ?>"><i class="fa fa-pinterest-square"></i></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
                <!-- /End Social Media Icons-->
            </div>
			
			<?php
				$magzee_button_label	= get_theme_mod('button_label','Book Now');
				$magzee_button_url		= get_theme_mod('button_url');
				$magzee_button_icon		= get_theme_mod('button_icon','fa-clock-o'); 			
				$magzee_header_cart		= get_theme_mod('header_cart','1');
			?>

            <div class="col-md-6 col-sm-7">
				<!-- Start Contact Info -->
				<ul class="info pull-right">
						<?php if($magzee_header_cart== '1') :?>
						<li>
							<a href="" class="cart-icon"><i class="fa fa-cart-plus"></i>
								<span class="count">0</span>
							</a>
						</li>
						<?php endif; ?>
						
						<?php if($magzee_button_label) :?>
						<li>
							<a href="<?php echo esc_url($magzee_button_url); ?>" class="magzee-button"><i class="fa <?php echo esc_attr($magzee_button_icon); ?>"></i> <?php echo esc_html($magzee_button_label); ?></a>
						</li>
						<?php endif; ?>
				</ul>
				<!-- /End Contact Info -->
			</div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
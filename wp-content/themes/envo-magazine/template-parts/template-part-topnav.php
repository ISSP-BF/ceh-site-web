<?php if (has_nav_menu('top_menu_left') || has_nav_menu('top_menu_right')) : ?>
    <div class="top-menu" >
        <nav id="top-navigation" class="navbar navbar-inverse bg-dark">     
            <div class="container">   
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-2-collapse">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation', 'envo-magazine'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-2-collapse">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top_menu_left',
                        'depth' => 5,
                        'menu_class' => 'nav navbar-nav navbar-left',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker(),
                    ));

                    wp_nav_menu(array(
                        'theme_location' => 'top_menu_right',
                        'depth' => 5,
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker(),
                    ));
                    ?>
                </div>
            </div>    
        </nav> 
    </div>
<?php endif; ?>
<div class="site-header container-fluid">
    <div class="container" >
        <div class="row" >
            <div class="site-heading <?php
            if (is_active_sidebar('envo-magazine-header-area')) {
                echo 'col-md-4';
            }
            ?>" >
                <div class="site-branding-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="site-branding-text">
                    <?php if (is_front_page()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php endif; ?>

                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description">
                            <?php echo esc_html($description); ?>
                        </p>
                    <?php endif; ?>
                </div><!-- .site-branding-text -->
                <style>
                    
                    @media (min-width: 768px) {
                        marquee>img{
                            height:60px!important;
                        }
                        .site-branding-logo1{
                            width:50%!important;
                        }
                    }
                    @media (max-width: 768px) {
                        marquee>img{
                            height:50px!important;
                        }
                    }
                </style>
                <div class="site-branding-logo site-branding-logo1" style="float:right;">
                    <a href="#" class="custom-logo-link" rel="home" aria-current="page">
                        <marquee direction=right behavior=alternate scrollamount=1>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Benin.svg?uselang=fr" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Benin.svg?uselang=fr 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/31/Flag_of_Burkina_Faso.svg" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/3/31/Flag_of_Burkina_Faso.svg 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_C%C3%B4te_d%27Ivoire.svg/1024px-Flag_of_C%C3%B4te_d%27Ivoire.svg.png" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_C%C3%B4te_d%27Ivoire.svg/1024px-Flag_of_C%C3%B4te_d%27Ivoire.svg.png 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/01/Flag_of_Guinea-Bissau.svg" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/0/01/Flag_of_Guinea-Bissau.svg 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Mali.svg/1024px-Flag_of_Mali.svg.png" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Mali.svg/1024px-Flag_of_Mali.svg.png 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Flag_of_Niger.svg/800px-Flag_of_Niger.svg.png" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Flag_of_Niger.svg/800px-Flag_of_Niger.svg.png 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Flag_of_Senegal.svg/1024px-Flag_of_Senegal.svg.png" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Flag_of_Senegal.svg/1024px-Flag_of_Senegal.svg.png 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/Flag_of_Togo.svg" class="custom-logo" alt="Centre d'Excellence de l'Habitat" srcset="https://upload.wikimedia.org/wikipedia/commons/6/68/Flag_of_Togo.svg 300w" sizes="(max-width: 10px) 100vw, 100px" style="height: 100px;">
                    </marquee>   
                </a>                
                </div>
            </div>
            <?php if (is_active_sidebar('envo-magazine-header-area')) { ?>
                <div class="site-heading-sidebar col-md-8" >
                    <div id="content-header-section" class="text-right">
                        <?php
                        dynamic_sidebar('envo-magazine-header-area');
                        ?>	
                    </div>
                </div>
            <?php } ?>	
        </div>
    </div>
</div>
<style>
    .hidden2{
        display:none;
    }
</style>
<?php do_action('envo_magazine_before_menu'); ?> 
<div class="main-menu">
    <nav id="site-navigation" class="navbar navbar-default">   
        <div class="container"> 
              
            <div class="navbar-header">
            <img id="logo2" class="hidden" src="http://localhost/ceh/wp-content/uploads/2021/02/ceh-v18-e1612900484760.png" alt="" style="height:50px">  

                <?php if (function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('main_menu')) : ?>
                <?php elseif (has_nav_menu('main_menu')) : ?>
                <button id="main-menu-panel" class="open-panel visible-xs" data-panel="main-menu-panel">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                <?php endif; ?>
            </div> 
            <?php
            if (is_front_page()) {
                $home_icon_class = 'home-icon front_page_on';
            } else {
                $home_icon_class = 'home-icon';
            }
            ?>
            <ul class="nav navbar-nav search-icon navbar-left hidden-xs">
                <li class="<?php echo esc_attr($home_icon_class); ?>">
                    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
            </ul>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'depth' => 5,
                'container' => 'div',
                'container_class' => 'menu-container',
                'menu_class' => 'nav navbar-nav navbar-left',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker(),
            ));
            ?>
            <ul class="nav navbar-nav search-icon navbar-right hidden-xs">
                <li class="top-search-icon">
                    <a href="#">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <div class="top-search-box">
                    <?php get_search_form(); ?>
                </div>
            </ul>
        </div>
        <?php do_action('envo_magazine_menu'); ?>
    </nav> 
</div>
<?php do_action('envo_magazine_after_menu'); ?>

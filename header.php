<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                <?php endif; ?>
            </div>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                    'fallback_cb' => 'wp_page_menu',
                ));
                ?>
            </nav>
            
            <div class="header-contact">
                <?php
                $phone = get_theme_mod('phone');
                $email = get_theme_mod('email');
                
                if ($phone) :
                ?>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                    </div>
                <?php endif; ?>
                
                <?php if ($email) : ?>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</header>
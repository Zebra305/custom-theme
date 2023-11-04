<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container-xxl">
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">MIND MAGNET MEDIA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0 px-3',
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2,
                    ) );
                    ?>
                </div>
            </div>
        </nav>
    </header>

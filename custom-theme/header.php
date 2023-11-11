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
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 px-5">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo esc_url(home_url('/services/')); ?>" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/services/seo/')); ?>">SEO</a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/services/webdevelopment/')); ?>">Web Development</a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/services/social-media/')); ?>">Social Media</a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/services/copywriting/')); ?>">Copywriting</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

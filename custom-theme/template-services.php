<?php
/*
Template Name: Services Page
*/
?>

<!-- Services Page Template: services.php -->

<?php get_header(); ?>

<section class="container my-5">
    <div class="row gx-5">
        <!-- Service 1 Text -->
        <div class="col-md-6">
            <h2>Service 1</h2>
            <p>Description of Service 1...</p>
            <a href="<?php echo get_permalink( get_page_by_path( 'services/seo' ) ); ?>" class="btn btn-primary">Learn More</a>

        </div>
        <!-- Service 1 Image -->
        <div class="col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/images/service1.jpg" class="img-fluid" alt="Service 1 Image">
        </div>
    </div>
</section>
<section class="container my-5">
    <div class="row gx-5">
        <!-- Service 2 Image -->
        <div class="col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/images/service2.jpg" class="img-fluid" alt="Service 2 Image">
        </div>
        <!-- Service 2 Text -->
        <div class="col-md-6">
            <h2>Service 2</h2>
            <p>Description of Service 2...</p>
            <a href="<?php echo get_permalink( get_page_by_path( 'services/copywriting' ) ); ?>" class="btn btn-primary">Learn More</a>

        </div>
    </div>
</section>
<section class="container my-5">
    <div class="row gx-5">
        <!-- Service 3 Text -->
        <div class="col-md-6">
            <h2>Service 3</h2>
            <p>Description of Service 3...</p>
            <a href="<?php echo get_permalink( get_page_by_path( 'services/social-media' ) ); ?>" class="btn btn-primary">Learn More</a>

        </div>
        <!-- Service 3 Image -->
        <div class="col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/images/service3.jpg" class="img-fluid" alt="Service 3 Image">
        </div>
    </div>
</section>
<section class="container my-5">
    <div class="row gx-5">
        <!-- Service 4 Image -->
        <div class="col-md-6 order-md-1">
            <img src="<?php echo get_template_directory_uri(); ?>/images/service4.jpg" class="img-fluid" alt="Service 4 Image">
        </div>
        <!-- Service 4 Text -->
        <div class="col-md-6 order-md-2">
            <h2>Service 4</h2>
            <p>Description of Service 4...</p>
            <a href="<?php echo get_permalink( get_page_by_path( 'services/webdevelopment' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

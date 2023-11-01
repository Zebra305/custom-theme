<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<section class="container my-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h1>Your Marketing Solution</h1>
            <p>Discover how we can help grow your business. Fill out the form to learn more.</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ctaForm">
                Get Started
            </button>
        </div>
    </div>
</section>

<div class="modal fade" id="ctaForm" tabindex="-1" aria-labelledby="ctaFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ctaFormLabel">Inquiry Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form goes here -->
                <form id="cta-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website Link</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="http://www.example.com" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<section class="container my-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>Our Services</h2>
            <p>Discover the wide range of services we offer to help grow your business.</p>
        </div>
    </div>
    <div class="row">
        <!-- First Row of Services -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service1.jpg" class="card-img-top" alt="Service 1">
                <div class="card-body">
                    <h5 class="card-title">Service 1</h5>
                    <p class="card-text">Description of Service 1.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service2.jpg" class="card-img-top" alt="Service 2">
                <div class="card-body">
                    <h5 class="card-title">Service 2</h5>
                    <p class="card-text">Description of Service 2.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service3.jpg" class="card-img-top" alt="Service 3">
                <div class="card-body">
                    <h5 class="card-title">Service 3</h5>
                    <p class="card-text">Description of Service 3.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Second Row for Fourth Service -->
    <div class="row justify-content-center">
         <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service4.jpg" class="card-img-top" alt="Service 4">
                <div class="card-body">
                    <h5 class="card-title">Service 4</h5>
                    <p class="card-text">Description of Service 4.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container my-5">
    <div class="row text-center">
        <div class="col-12">
            <h2>Blog & Insights</h2>
            <p>Stay updated with our latest insights and discover new strategies to grow your business.</p>
        </div>
    </div>
    <div class="row">
        <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true,
            ));

            while($recent_posts->have_posts()) : $recent_posts->the_post();
        ?>
        <div class="col-12 mb-4">
            <div class="row align-items-start">
                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid mb-3 mb-md-0')); ?>
                    </a>
                </div>
                <div class="col-md-8">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <p class="text-muted"><small><?php the_time('F j, Y'); ?></small></p>
                    <p><?php the_excerpt(); ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary">View All Posts</a>
        </div>
    </div>
</section>
<section class="container my-5 text-center">
    <div class="row">
        <div class="col-12">
            <h2>About Us</h2>
            <p class="lead">"If you make money, we make money. And if you don't make money, we don't make money."</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about-us-image.jpg" class="img-fluid" alt="About Us Image">
        </div>
    </div>
</section>
<!-- Add this code to template-home.php file where the contact section should be -->
<section class="container my-5">
    <div class="row">
        <div id="success-message" class="alert alert-success" role="alert" style="display:none;">
        </div>

        <!-- Free Analysis Form -->
        <div class="col-md-6">
            <h2>Free Analysis</h2>
            <form id="free-analysis-form">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="business_name" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" required>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Website Link</label>
                    <input type="url" class="form-control" id="website" name="website" placeholder="http://www.example.com" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="col-md-6">
            <h2>Contact Us</h2>
            <p>Email: info@example.com</p>
            <p>Phone: +1 234 567 8900</p>
            <h3>Social Media DMs</h3>
            <p>
                Facebook: <a href="https://facebook.com/yourpage" target="_blank">facebook.com/yourpage</a><br>
                Twitter: <a href="https://twitter.com/yourpage" target="_blank">twitter.com/yourpage</a><br>
                LinkedIn: <a href="https://linkedin.com/company/yourpage" target="_blank">linkedin.com/company/yourpage</a>
            </p>
        </div>
    </div>
</section>


<?php get_footer(); ?>
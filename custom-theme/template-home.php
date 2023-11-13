<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<section class="container my-5" data-aos="slide-up">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h1 id="typed-target"></h1>
                <p class="lead" id="typed-about-us-content"></p>
            </div>
        </div>
    </div>
</section>


<section class="container my-5" data-aos="slide-up">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center text-center">
                <div class="col-md-8">
                    <h1>Marketing analysis</h1>
                    <p>Discover how we can help grow your business. Fill out the form to learn more.</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ctaForm">
                        Get Started
                    </button>
                </div>
            </div>
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

<section class="container my-5" data-aos="slide-up">
    <div class="card custom-parent-card"> <!-- Add this wrapper with a custom class -->
        <div class="card-body"> <!-- Card body for padding and content alignment -->
            <div class="row text-center">
                <div class="col-12">
                    <h1>Our Services</h1>
                    <p>Discover the wide range of services we offer to help grow your business.</p>
                </div>
            </div>
            <div class="row" >
                <!-- First Row of Services -->
                <div class="col-md-6 mb-4" data-aos="slide-up" >
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/service1.jpg" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">Service 1</h5>
                            <p class="card-text">Description of Service 1.</p>
                            <!-- Learn More button -->
                            <a href="/services/copywriting" class="btn btn-primary float-end">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="slide-up">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/service2.jpg" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">Service 2</h5>
                            <p class="card-text">Description of Service 2.</p>
                            <!-- Learn More button -->
                            <a href="/services/service2" class="btn btn-primary float-end">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Row of Services -->
            <div class="row">
                <div class="col-md-6 mb-4" data-aos="slide-up">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/service3.jpg" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">Service 3</h5>
                            <p class="card-text">Description of Service 3.</p>
                            <!-- Learn More button -->
                            <a href="/services/service3" class="btn btn-primary float-end">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="slide-up">
                    <div class="card">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/service4.jpg" class="card-img-top" alt="Service 4">
                        <div class="card-body">
                            <h5 class="card-title">Service 4</h5>
                            <p class="card-text">Description of Service 4.</p>
                            <!-- Learn More button -->
                            <a href="/services/service4" class="btn btn-primary float-end">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('website').addEventListener('blur', function(event) {
        var input = event.target;
        if (input.value && !input.value.startsWith('http://') && !input.value.startsWith('https://')) {
            input.value = 'http://' + input.value;
        }
    });
</script>


<?php get_footer(); ?>
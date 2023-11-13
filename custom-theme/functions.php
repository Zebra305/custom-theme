<?php
// Your existing code (if any) goes here

function enqueue_custom_scripts_and_styles() {

    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null );
    
    // Enqueue Bootstrap JavaScript
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, true );

    // Enqueue Google Fonts first
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Numans&family=Assistant:wght@400;600&family=Scope+One&display=swap', false );

    // Enqueue custom AJAX script
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/ajax.js', array('jquery'), null, true );

    // Enqueue AOS CSS
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css', array(), null);

    // Enqueue AOS JavaScript
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js', array(), null, true);

    // Enqueue Typed.js library
    wp_enqueue_script('typed-js', 'https://cdn.jsdelivr.net/npm/typed.js@2.0.12', array(), null, true);

    // Localize script for AJAX URL
    wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    // Enque style.css file
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css', array(), null );

}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles' );

// Your existing code (if any) goes here

function register_custom_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
        )
    );
}
add_action( 'init', 'register_custom_menus' );

// Function to handle CTA form submission
function handle_cta_form_submission() {
    // Check if the required values are set
    if ( isset( $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['business_name'], $_POST['website'] ) ) {
        $name = sanitize_text_field( $_POST['name'] );
        $email = sanitize_email( $_POST['email'] );
        $phone = sanitize_text_field( $_POST['phone'] );
        $business_name = sanitize_text_field( $_POST['business_name'] );
        $website = esc_url_raw( $_POST['website'] );

        // Prepare email
        $to = 'recipient@example.com';  // Replace with your email address
        $subject = 'CTA Form Submission';
        $message = "Name: $name\nEmail: $email\nPhone: $phone\nBusiness Name: $business_name\nWebsite: $website";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Send email
        wp_mail($to, $subject, $message, $headers);

        $response = array(
            'status' => 'success',
            'message' => 'Your inquiry has been submitted successfully. We will contact you within 3 business days.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Form submission failed. Please try again.'
        );
    }

    echo json_encode( $response );
    wp_die();  // This is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_nopriv_submit_cta_form', 'handle_cta_form_submission' );
add_action( 'wp_ajax_submit_cta_form', 'handle_cta_form_submission' );

// Function to handle Free Analysis form submission via AJAX
function handle_free_analysis_form_submission() {
    // Check if the required values are set
    if ( isset( $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['business_name'], $_POST['website'] ) ) {
        $name = sanitize_text_field( $_POST['name'] );
        $email = sanitize_email( $_POST['email'] );
        $phone = sanitize_text_field( $_POST['phone'] );
        $business_name = sanitize_text_field( $_POST['business_name'] );
        $website = esc_url_raw( $_POST['website'] );

        // Prepare email
        $to = 'recipient@example.com';  // Replace with your email address
        $subject = 'Free Analysis Form Submission';
        $message = "Name: $name\nEmail: $email\nPhone: $phone\nBusiness Name: $business_name\nWebsite: $website";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Send email
        wp_mail($to, $subject, $message, $headers);

        $response = array(
            'status' => 'success',
            'message' => 'Your request has been submitted successfully. We will contact you within 3 business days.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Form submission failed. Please try again.'
        );
    }

    echo json_encode( $response );
    wp_die();  // This is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_nopriv_submit_free_analysis_form', 'handle_free_analysis_form_submission' );
add_action( 'wp_ajax_submit_free_analysis_form', 'handle_free_analysis_form_submission' );

// Your existing code (if any) goes here

// Your existing code

function load_more_posts() {
    $paged = $_POST['page'] + 1;  // Get the next page number
    $args = array(
        'posts_per_page' => 8,
        'paged' => $paged,
    );
    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) : 
        while ($recent_posts->have_posts()) : 
            $recent_posts->the_post();
            // Output post markup
            echo '<div class="col-md-3 mb-4">';
            echo '<div class="card">';
            if (has_post_thumbnail()) :
                echo '<img src="' . get_the_post_thumbnail_url() . '" class="card-img-top" alt="' . get_the_title() . '">';
            endif;
            echo '<div class="card-body">';
            echo '<h5 class="card-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
            echo '<p class="card-text">' . wp_trim_words( get_the_excerpt(), 25, '...' ) . '</p>';
            echo '<p class="text-muted"><small>By ' . get_the_author() . ' on ' . get_the_time('F j, Y') . '</small></p>';
            echo '<a href="' . get_the_permalink() . '" class="btn btn-primary float-end mt-auto">Read More</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No more posts to load.</p>';
    endif;
    wp_die();
}
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');  // For non-logged in users
add_action('wp_ajax_load_more_posts', 'load_more_posts');  // For logged in users

// Your existing code

function custom_excerpt_length($length) {
    if (is_page_template('template-blog.php')) {
        return 25;  // Sets excerpt length to 25 words for the blog page template
    }
    return $length;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more) {
    if (is_page_template('template-blog.php')) {
        return '...';  // Sets the continuation indicator to ellipsis for the blog page template
    }
    return $more;
}
add_filter('excerpt_more', 'custom_excerpt_more');

function load_more_child_category_posts() {
    $paged = $_POST['page'] + 1;  // Get the next page number
    $category_id = $_POST['category'];  // Get the category ID from the AJAX request

    $args = array(
        'post_type' => 'post',
        'cat' => $category_id,
        'paged' => $paged,
        'posts_per_page' => 5,  // Adjust this value to control the number of posts loaded
    );
    $child_category_posts = new WP_Query($args);

    if ($child_category_posts->have_posts()) : 
        while ($child_category_posts->have_posts()) : 
            $child_category_posts->the_post();
            // Output post markup
            echo '<div class="col-md-3 mb-4">';
            echo '<div class="card">';
            if (has_post_thumbnail()) :
                echo '<img src="' . get_the_post_thumbnail_url() . '" class="card-img-top" alt="' . get_the_title() . '">';
            endif;
            echo '<div class="card-body">';
            echo '<h5 class="card-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
            echo '<p class="card-text">' . wp_trim_words( get_the_excerpt(), 25, '...' ) . '</p>';
            echo '<p class="text-muted"><small>By ' . get_the_author() . ' on ' . get_the_time('F j, Y') . '</small></p>';
            echo '<a href="' . get_the_permalink() . '" class="btn btn-primary float-end mt-auto">Read More</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No more posts to load.</p>';
    endif;
    wp_die();
}
add_action('wp_ajax_nopriv_load_more_child_category_posts', 'load_more_child_category_posts');  // For non-logged in users
add_action('wp_ajax_load_more_child_category_posts', 'load_more_child_category_posts');  // For logged in users


?>

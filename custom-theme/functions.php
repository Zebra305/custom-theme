<?php
// Your existing code (if any) goes here

function enqueue_custom_scripts_and_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null );

    // Enqueue Bootstrap JavaScript
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, true );

    // Enqueue custom AJAX script
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/ajax.js', array('jquery'), null, true );

    // Localize script for AJAX URL
    wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
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

?>

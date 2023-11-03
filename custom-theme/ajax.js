jQuery(document).ready(function($) {

    // Function for Free Analysis Form
    $('#free-analysis-form').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize() + '&action=submit_free_analysis_form';

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                $('#success-message').html(jsonResponse.message);
                $('#success-message').show();
            }
        });
    });

    // Function for CTA Form
    $('#cta-form').submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize() + '&action=submit_cta_form';

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                // Display the success message and a close button within the modal
                $('.modal-body').html('<p>' + jsonResponse.message + '</p><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
            }
        });
    });
});

// ... your existing code ...

// Function for Load More Button
jQuery(document).on('click', '.btn-load-more', function(event) {
    event.preventDefault();
    var button = jQuery(this);
    var page = button.data('page');  // Get the current page number from the button's data attribute

    console.log('Load More Button clicked');  // Log statement
    console.log('Current page:', page);  // Log statement

    jQuery.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: {
            action: 'load_more_posts',
            page: page,
        },
        success: function(response) {
            console.log('AJAX response:', response);  // Log statement

            // Check if the response contains the message "No more posts to load."
            if (response.trim() !== '<p>No more posts to load.</p>') {
                console.log('Response contains posts');  // Log statement
                button.data('page', page + 1);  // Increment the page number for the next request
                jQuery('.recent-posts-container').append(response);  // Append the new posts to the existing posts
            } else {
                console.log('No more posts to load');  // Log statement
                button.html('No more posts to load');  // Update button text
                button.prop('disabled', true);  // Disable the button
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX error:', textStatus, errorThrown);  // Log statement
        }
    });
});

// Function for Load More Button on Child Category Pages
jQuery(document).on('click', '.btn-load-more-child-category', function(event) {
    event.preventDefault();
    var button = jQuery(this);
    var page = button.data('page');  // Get the current page number from the button's data attribute
    var category = button.data('category');  // Get the current category ID from the button's data attribute

    console.log('Load More Child Category Button clicked');  // Log statement
    console.log('Current page:', page);  // Log statement
    console.log('Current category:', category);  // Log statement

    jQuery.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: {
            action: 'load_more_child_category_posts',
            page: page,
            category: category
        },
        success: function(response) {
            console.log('AJAX response:', response);  // Log statement

            // Check if the response contains the message "No more posts to load."
            if (response.trim() !== '<p>No more posts to load.</p>') {
                console.log('Response contains posts');  // Log statement
                button.data('page', page + 1);  // Increment the page number for the next request
                jQuery('#recent-posts-grid').append(response);  // Append the new posts to the existing posts
            } else {
                console.log('No more posts to load');  // Log statement
                button.html('No more posts to load');  // Update button text
                button.prop('disabled', true);  // Disable the button
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX error:', textStatus, errorThrown);  // Log statement
        }
    });
});
// ... your existing code ...

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

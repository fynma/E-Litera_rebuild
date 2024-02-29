$(document).ready(function () {
    $('#form-contact').submit(function (e) {
        e.preventDefault();

        // Serialize form data
        var formData = $(this).serialize();

        // Make AJAX request
        $.ajax({
            url: appUrl + '/api/contact-admin', // Replace with the actual route of your controller
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                // Handle success response
                console.log(response);
                alert('Report sent successfully');
            },
            error: function (error) {
                // Handle error response
                console.log(error);
                alert('Something went wrong');
            }
        });
    });
});
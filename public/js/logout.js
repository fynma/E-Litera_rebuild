function logout() {
    // Use jQuery AJAX to send a POST request to the logout endpoint
    $.ajax({
        url: 'http://127.0.0.1:8000/api/logout',
        type: 'POST',
        success: function(response) {
            // Handle the success response
            console.log(response);
            location.reload(true);
        },
        error: function(error) {
            // Handle the error response
            console.error('Logout failed:', error);
        }
    });
}

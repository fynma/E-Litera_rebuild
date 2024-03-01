function logout() {
    // Ambil token CSRF dari meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: appUrl + '/hapussession',
        type: 'POST',
        data: {
            _token: csrfToken // Sertakan token CSRF dalam data permintaan
        },
        success: function(response) {
            console.log(response);
            location.reload()
        },
        error: function(error) {
            console.error('Logout failed:', error);
        }
    });
}
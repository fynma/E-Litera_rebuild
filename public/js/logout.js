
function logout() {
    // Ambil token CSRF dari meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Kirim permintaan logout dengan menyertakan token CSRF
    $.ajax({
        url: appUrl + '/hapussession',
        type: 'POST',
        data: {
            _token: csrfToken // Sertakan token CSRF dalam data permintaan
        },
        success: function (response) {
            console.log(response);
            // Lakukan tindakan setelah berhasil logout
        },
        error: function (error) {
            console.error('Logout failed:', error);
        }
    });
}

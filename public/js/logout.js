

function logout() {
    $.ajax({
        url: appUrl + '/api/logout',
        type: 'POST',
        success: function(response) {
            console.log(response);
            location.reload(true);
            sessionStorage.removeItem('user');
            sessionStorage.removeItem('user_id');
            sessionStorage.removeItem('email');
        },
        error: function(error) {
            console.error('Logout failed:', error);
        }
    });
}

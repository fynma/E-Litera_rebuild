document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);

        // Kirim data form menggunakan AJAX
        fetch('/api/login', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Login failed');
            }
            return response.json();
        })
        .then(data => {
            // Tanggapan sukses dari server
            // Redirect ke halaman sesuai dengan peran pengguna
            switch (data.user.access) {
                case 'petugas':
                    window.location.href = '/petugas/dashboard';
                    break;
                case 'administrator':
                    window.location.href = '/admin/dashboard';
                    break;
                case 'user':
                    window.location.href = '/user';
                    break;
                default:
                    // Jika peran tidak dikenali, tampilkan pesan kesalahan
                    console.error('Unknown user access level');
            }
        })
        .catch(error => {
            console.error('Login failed:', error.message);
            // Tampilkan pesan kesalahan kepada pengguna
            // Misalnya, dengan menambahkan pesan di antara tag HTML dengan ID tertentu
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = 'Login gagal. Silakan coba lagi.';
        });
    });
});

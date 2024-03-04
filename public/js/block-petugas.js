document.addEventListener('DOMContentLoaded', function () {
    var access = document.querySelector('meta[name="access"]').content;
    console.log(access);

    //administrator tidak bisa membuka halaman ini
    if (access === 'petugas') {
        document.body.innerHTML = '<div style="text-align: center; padding: 20px;">Anda tidak memiliki akses untuk halaman ini. <a href="#" id="goBack">Kembali ke halaman sebelumnya</a></div>';

        document.getElementById('goBack').addEventListener('click', function (event) {
            event.preventDefault();
            history.back();
        });
    } 
});
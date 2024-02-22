// Panggil fungsi tampilkanUsers saat halaman dimuat
$(document).ready(function () {
    tampilkanUsers();
    getData();
});

function getData() {
    $.ajax({
        url: "http://127.0.0.1:8000/profile",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.success) {
                var data = response.data;
                $("#user").text(data.username);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

function tampilkanUsers() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/ambil-user", // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Hapus semua baris yang ada di tabel
            $("#dataTable tbody").empty();

            // Tambahkan data user ke tabel
            $.each(response.data, function (index, data) {
                var newRow =
                    "<tr><td>" +
                    (index + 1) +
                    "</td><td>" +
                    data.username +
                    "</td><td>" +
                    data.email +
                    "</td><td>" +
                    data.access +
                    "</td><td><button class='btn-view' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id=" +
                    data.user_id +
                    "><i class='bi bi-eye'></i></button><button class='btn-delete' data-id=" +
                    data.user_id +
                    "><i class='bi bi-trash'></i></button></td></tr>";
                $("#dataTable tbody").append(newRow);
            });

            // Menambahkan event listener untuk tombol delete
            $(".btn-delete").click(function () {
                var userId = $(this).data("id");
                deleteUser(userId);
            });
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data users. Silakan coba lagi.");
        },
    });
}

$("#dataTable tbody").on("click", ".btn-view", function () {
    console.log($(this).data("id"));
    // Dapatkan ID pengguna dari atribut data
    var userId = $(this).data("id");

    // Lakukan panggilan AJAX untuk mendapatkan data pengguna berdasarkan ID
    $.ajax({
        url: "http://127.0.0.1:8000/api/detail-user/" + userId, // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi pengguna dalam modal
            $("#modalUsername").val(response.data.username);
            $("#modalEmail").val(response.data.email);
            $("#modalLevel").val(response.data.access);
            // Tampilkan modal
            $("#exampleModal").modal("show");
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data pengguna. Silakan coba lagi.");
        },
    });
});

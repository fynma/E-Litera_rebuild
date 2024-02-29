// Panggil fungsi tampilkanUsers saat halaman dimuat
$(document).ready(function () {
    getData();
    $("#dataTable").dataTable({
        Destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/ambil-user",
            dataSrc: "data",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "username" },
            { data: "email" },
            { data: "access" },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<div><button class="btn-view" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
                        data.user_id +
                        '"><i class="bi bi-eye"></i></button><button class="btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
                        data.user_id +
                        '"><i class="bi bi-trash"></i></button></div>'
                    );
                },
            },
        ],
        language: {
            lengthMenu: "Tampilkan _MENU_ hasil",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data",
            infoFiltered: "(filtered from _MAX_ total records)",
            emptyTable: "Tidak ada data",
            search: "Cari data :",
            paginate: {
                first: "Awal",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya",
            },
        },
    });
});

function getData() {
    $.ajax({
        url: appUrl + "/profile",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.success) {
                var data = response.data;
                $("#user").text(data.username + " | " + data.access);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

$("#dataTable tbody").on("click", ".btn-view", function () {
    console.log($(this).data("id"));
    // Dapatkan ID pengguna dari atribut data
    var userId = $(this).data("id");

    // Lakukan panggilan AJAX untuk mendapatkan data pengguna berdasarkan ID
    $.ajax({
        url: appUrl + "/api/detail-user/" + userId, // Sesuaikan dengan endpoint API Anda
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

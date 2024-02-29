$(document).ready(function () {
    getData();
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

// Mendapatkan CSRF token dari meta tag
var csrfToken = $('meta[name="csrf-token"]').attr("content");

// Fungsi untuk menambahkan kategori baru
function tambahKategori() {
    event.preventDefault(); // Mencegah perilaku default dari tombol submit

    var namaKategori = document.getElementById("nama-kategori").value;

    // Kirim data ke server menggunakan AJAX
    $.ajax({
        url: appUrl + "/api/newCategory", // Sesuaikan dengan endpoint API Anda
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // Menambahkan CSRF token ke header
            "Content-Type": "application/json", // Set header Content-Type
        },
        // Mengubah format data yang dikirim ke server menjadi JSON
        data: JSON.stringify({ name_category: namaKategori }),
        success: function (response) {
            // Jika sukses, tambahkan data kategori baru ke tabel
            var newRow =
                "<tr><td>" +
                response.data.id +
                "</td><td>" +
                response.data.name_category +
                '</td><td><button class="btn-delete" onclick="openDelete(this)"><i class="bi bi-trash"></i></button></td></tr>';
            $("#dataTable tbody").append(newRow);
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal menambahkan kategori. Silakan coba lagi.");
        },
    });
}

// Panggil fungsi tambahKategori saat form disubmit
$(document).ready(function () {
    $("#form-tambah-kategori").submit(function (event) {
        tambahKategori(); // Panggil fungsi tambahKategori saat form disubmit
    });
});

// Fungsi untuk menampilkan data kategori dari server
function tampilkanKategori() {
    $("#dataTable").dataTable({
        Destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/categoryList",
            dataSrc: "data",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "name_category" },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<div><button class="btn-delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
                        data.book_id +
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
    // $.ajax({
    //     url: appUrl + "/api/categoryList", // Sesuaikan dengan endpoint API Anda
    //     method: "GET",
    //     success: function (response) {
    //         // Hapus semua baris yang ada di tabel
    //         $("#dataTable tbody").empty();

    //         // Tambahkan data kategori ke tabel
    //         $.each(response.data, function (index, category) {
    //             var newRow =
    //                 "<tr><td>" +
    //                 (index + 1) +
    //                 "</td><td>" +
    //                 category.name_category +
    //                 '</td><td><button class="btn-delete" onclick="openDelete(this)"><i class="bi bi-trash"></i></button></td></tr>';
    //             $("#dataTable tbody").append(newRow);
    //         });
    //     },
    //     error: function (xhr, status, error) {
    //         // Jika terjadi kesalahan, tampilkan pesan kesalahan
    //         console.error(xhr.responseText);
    //         alert("Gagal mengambil data kategori. Silakan coba lagi.");
    //     },
    // });
}

// Panggil fungsi tampilkanKategori saat halaman dimuat
$(document).ready(function () {
    tampilkanKategori();
});

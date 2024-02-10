// Mendapatkan CSRF token dari meta tag
var csrfToken = $('meta[name="csrf-token"]').attr("content");

// Fungsi untuk menambahkan kategori baru
function tambahKategori() {
    event.preventDefault(); // Mencegah perilaku default dari tombol submit

    var namaKategori = document.getElementById("nama-kategori").value;

    // Kirim data ke server menggunakan AJAX
    $.ajax({
        url: "http://localhost:8000/api/newCategory", // Sesuaikan dengan endpoint API Anda
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
    $.ajax({
        url: "http://localhost:8000/api/categoryList", // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            // Hapus semua baris yang ada di tabel
            $("#dataTable tbody").empty();

            // Tambahkan data kategori ke tabel
            $.each(response.data, function (index, category) {
                var newRow =
                    "<tr><td>" +
                    (index + 1) +
                    "</td><td>" +
                    category.name_category +
                    '</td><td><button class="btn-delete" onclick="openDelete(this)"><i class="bi bi-trash"></i></button></td></tr>';
                $("#dataTable tbody").append(newRow);
            });
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data kategori. Silakan coba lagi.");
        },
    });
}

// Panggil fungsi tampilkanKategori saat halaman dimuat
$(document).ready(function () {
    tampilkanKategori();
});

// Panggil fungsi tampilkanBuku saat halaman dimuat
$(document).ready(function () {
    tampilkanBuku();
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
                $("#user").text(data.username);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

function tampilkanBuku() {
    $.ajax({
        url: appUrl + "/api/bookCover", // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Hapus semua baris yang ada di tabel
            $("#dataTable tbody").empty();

            // Tambahkan data buku ke tabel
            $.each(response.data, function (index, data) {
                var newRow =
                    "<tr><td>" +
                    (index + 1) +
                    "</td><td>" +
                    data.kode_buku +
                    "</td><td>" +
                    data.judul +
                    "</td><td>" +
                    (data.kategori ? data.kategori.join(", ") : "") + // Memastikan bahwa 'categories' tidak undefined sebelum melakukan join
                    "</td><td>" +
                    data.penulis +
                    "</td><td>" +
                    data.penerbit +
                    "</td><td><button class='btn-view' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id=" +
                    data.book_id +
                    "><i class='bi bi-eye'></i></button><button class='btn-delete' data-id=" +
                    data.book_id +
                    "><i class='bi bi-trash'></i></button></td></tr>";
                $("#dataTable tbody").append(newRow);
            });

            // Menambahkan event listener untuk tombol delete
            $(".btn-delete").click(function () {
                var bookId = $(this).data("id");
                deleteBook(bookId);
            });
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data buku. Silakan coba lagi.");
        },
    });
}

$("#dataTable tbody").on("click", ".btn-view", function () {
    console.log($(this).data("id"));
    // Dapatkan ID pengguna dari atribut data
    var bookId = $(this).data("id");

    // Lakukan panggilan AJAX untuk mendapatkan data pengguna berdasarkan ID
    $.ajax({
        url: appUrl + "/api/detail-buku/" + bookId, // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi pengguna dalam modal
            var bookData = response.displaydata[0];
            // Ubah teks gambar menjadi URL gambar
            var imageUrl = "data:image/jpeg;base64," + bookData.gambar;
            // Atur nilai src untuk elemen gambar
            $("#gambar-buku").attr("src", imageUrl);
            $("#judul-buku").text(bookData.judul);
            $("#kategori-buku").text(
                bookData.kategori ? bookData.kategori.join(", ") : ""
            );
            $("#penulis-buku").text(bookData.penulis);
            $("#penerbit-buku").text(bookData.penerbit);
            $("#terbit-buku").text(bookData.tahun_terbit);
            $("#stok-buku").text(bookData.stok);
            $("#deskripsi-buku").text(bookData.deskripsi);
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

function deleteBook(bookId) {
    $.ajax({
        url: appUrl + "/api/deleteBook",
        method: "POST",
        data: { book_id: bookId },
        success: function (response) {
            // Tampilkan pesan sukses atau gagal
            alert(response.message);
            // Panggil kembali fungsi tampilkanBuku untuk memperbarui tampilan setelah penghapusan
            tampilkanBuku();
        },
        error: function (xhr, status, error) {
            // Tampilkan pesan kesalahan jika penghapusan gagal
            alert("Gagal menghapus buku. Silakan coba lagi.");
        },
    });
}

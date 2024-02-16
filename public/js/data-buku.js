// Panggil fungsi tampilkanBuku saat halaman dimuat
$(document).ready(function () {
    tampilkanBuku();
});


function tampilkanBuku() {
    $.ajax({
        url: "http://localhost:8000/api/bookCover", // Sesuaikan dengan endpoint API Anda
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



function deleteBook(bookId) {
    $.ajax({
        url: "http://localhost:8000/api/deleteBook",
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
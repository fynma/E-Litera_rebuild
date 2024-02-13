function tampilkanBuku() {
    $.ajax({
        url: "http://localhost:8000/api/bookList", // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            // Hapus semua baris yang ada di tabel
            $("#dataTable tbody").empty();

            // Tambahkan data buku ke tabel
            $.each(response.data, function (index, book) {
                var newRow =
                    "<tr><td>" +
                    (index + 1) +
                    "</td><td>" +
                    book.kode_buku +
                    "</td><td>" +
                    book.judul +
                    "</td><td>" +
                    book.categories.join(", ") + // Menampilkan kategori sebagai satu string dipisahkan koma
                    "</td><td>" +
                    book.penulis +
                    "</td><td>" +
                    book.penerbit +
                    "</td><td><button class='btn-view' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id=" +
                    book.book_id +
                    "><i class='bi bi-eye'></i></button><button class='btn-delete'><i class='bi bi-trash'></i></button></td></tr>";
                $("#dataTable tbody").append(newRow);
            });
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data buku. Silakan coba lagi.");
        },
    });
}

// Panggil fungsi tampilkanBuku saat halaman dimuat
$(document).ready(function () {
    tampilkanBuku();
});

$("#dataTable").on("click", ".btn-view", function () {
    $.ajax({
        url: "http://localhost:8000/api/bookList",
        dataType: "json",
        type: "get",
        data: {
            book_id: $(this).data("id"),
        },
        success: function (buku) {
            if (buku.Response === "True") {
                $(".modal-body").html(
                    `
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="` +
                        buku.gambar +
                        `" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>` +
                        buku.judul +
                        `</h3></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `
                );
            }
        },
    });
});

$(document).ready(function () {
    getData();
    getCategories();
    getListBook();
    setTanggalKembali();
    setTglPinjam();
    handlePinjam();
});

function handlePinjam() {
    // Function to handle form submission
    $("form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        var formData = $(this).serialize(); // Serialize form data

        // Kirim data form menggunakan AJAX
        $.ajax({
            url: "http://127.0.0.1:8000/api/borrow", // Ganti dengan URL endpoint API Anda
            type: "POST",
            data: formData, // Menggunakan data yang telah di-serialize
            success: function (response) {
                // Handle ketika permintaan berhasil
                alert("Berhasil meminjam, tunggu konfirmasi petugas");
            },
            error: function (xhr, status, error) {
                // Handle ketika terjadi kesalahan
                alert("Gagal meminjam buku. Silakan coba lagi.");
                console.error(xhr.responseText);
            },
        });
    });
}

function getData() {
    $.ajax({
        url: "http://127.0.0.1:8000/profile",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.data) {
                var data = response.data;
                $("#user_id_val").val(data.user_id);
                $("#username").text(data.username);
                $("#username_pop").val(data.username);
                $("#username-popup").text(data.username);
                $("#prev_profile, #prev_profile_pop").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

// Fungsi untuk mengambil data kategori dari API
function getCategories() {
    $.ajax({
        url: "http://localhost:8000/api/categoryList",
        type: "GET",
        success: function (response) {
            // Panggil fungsi untuk menampilkan kategori ke dalam daftar
            displayCategories(response.data);
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

// Fungsi untuk menampilkan kategori ke dalam daftar
function displayCategories(categories) {
    const categoryList = $("#categoryList");
    // Kosongkan daftar sebelum menambahkan kategori baru
    categoryList.empty();
    // Tambahkan setiap kategori ke dalam daftar
    categories.forEach((category) => {
        const li = $("<li>");
        const link = $("<a>")
            .attr("href", "/categories/" + category.category_id)
            .text(category.name_category);
        li.append(link);
        categoryList.append(li);
    });
}

document.addEventListener("DOMContentLoaded", function () {
    // Get the book ID from the URL
    // const urlParams = new URLSearchParams(window.location.search);
    // const bookId = urlParams.get("id");
    // console.log(bookId);
    // Mendapatkan URL saat ini dari window.location
    var url = window.location.href;

    // Mem-parse URL untuk mendapatkan pathnya
    var urlParts = url.split("/");

    // Mengambil bagian terakhir dari path, yang seharusnya menjadi id
    var bookId = urlParts[urlParts.length - 1];

    console.log(bookId);

    // Fetch the book details from the database using the book ID
    $.ajax({
        url: "http://localhost:8000/api/detail-buku/" + bookId,
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi pengguna dalam modal
            var bookData = response.displaydata[0];
            // Ubah teks gambar menjadi URL gambar
            var imageUrl = "data:image/jpeg;base64," + bookData.gambar;

            var rating = $('<div class="rating"></div>');
            var fullStars = Math.floor(bookData.rating); // Bintang penuh
            var decimalPart = bookData.rating - fullStars; // Bagian desimal
            var halfStar = decimalPart >= 0.25 && decimalPart < 0.75; // Setengah bintang
            var fullStarAfterHalf = decimalPart >= 0.75; // Bintang penuh setelah setengah bintang

            for (var i = 1; i <= 5; i++) {
                if (i <= fullStars) {
                    rating.append(
                        '<i class="bi bi-star-fill" value="' + i + '"></i>'
                    );
                } else if (i === fullStars + 1 && halfStar) {
                    rating.append(
                        '<i class="bi bi-star-half" value="' + i + '"></i>'
                    );
                } else if (i === fullStars + 1 && fullStarAfterHalf) {
                    rating.append(
                        '<i class="bi bi-star-fill" value="' + i + '"></i>'
                    );
                } else {
                    rating.append(
                        '<i class="bi bi-star" value="' + i + '"></i>'
                    );
                }
            }
            // Mengambil kategori unik
            var uniqueCategories = [...new Set(bookData.kategori)];

            var judulBuku = bookData.judul;
            var fullTitle = "E-Litera | " + judulBuku;
            document.title = fullTitle;

            // Menampilkan kategori
            $("#kategori_buku").text(uniqueCategories.join(", "));
            // Menambahkan rating ke dalam elemen dengan id 'bookRating'
            $("#bookRating").html(rating);
            $("#gambar_book").attr("src", imageUrl);
            $("#judul_buku").text(bookData.judul);
            $("#penulis_buku").text(bookData.penulis);
            $("#penulis_book").text(bookData.penulis);
            $("#penerbit_buku").text(bookData.penerbit);
            $("#terbit_buku").text(bookData.tahun_terbit);
            $("#stok_buku").text(bookData.stok);
            $("#description-text").text(bookData.deskripsi);
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data buku. Silakan coba lagi.");
        },
    });
});

function getListBook() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/bookCover",
        type: "GET",
        success: function (response) {
            console.log(response);
            if (response.data) {
                var books = response.data;
                displayBooks(books);
            } else {
                console.error("Failed to retrieve categories from the API.");
            }
        },
        error: function (xhr, status, error) {
            console.error("Error while fetching book:", error);
        },
    });
}

function displayBooks(books) {
    var gridContainer = $("#grid-item");
    gridContainer.empty();

    // Memotong array buku agar hanya 4 data yang ditampilkan
    books = books.slice(0, 6);
    // Membalik urutan array sehingga data terbaru muncul pertama
    books = books.reverse();

    $.each(books, function (index, book) {
        var gridItem = $(
            '<div class="grid-item" data-rating="' + book.rating + '"></div>'
        );
        var img = $("<img>")
            .attr("src", "data:image/png;base64," + book.gambar)
            .attr("alt", book.judul);

        // var img = $('<img>').attr('src', '../img/' + book.gambar).attr('alt', book.judul);
        var details = $('<div class="details"></div>');

        var categories = $('<div id="kategori-buku"></div>');
        $.each(book.kategori, function (i, category) {
            categories.append('<a href="#">' + category + "</a>, ");
        });

        var title = $(
            '<h3 id="judul-buku"><a style="cursor:pointer;" id="book_judul" data-id="' +
                book.book_id +
                '">' +
                book.judul +
                "</a></h3>"
        );
        var author = $(
            '<a href="#" id="penulis-buku">By: ' + book.penulis + "</a>"
        );

        var rating = $('<div class="rating"></div>');
        var fullStars = Math.floor(book.rating); // Bintang penuh
        var decimalPart = book.rating - fullStars; // Bagian desimal
        var halfStar = decimalPart >= 0.25 && decimalPart < 0.75; // Setengah bintang
        var fullStarAfterHalf = decimalPart >= 0.75; // Bintang penuh setelah setengah bintang

        for (var i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && halfStar) {
                rating.append(
                    '<i class="bi bi-star-half" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && fullStarAfterHalf) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else {
                rating.append('<i class="bi bi-star" value="' + i + '"></i>');
            }
        }

        var linkPinjam = $('<div class="link-pinjam" id="disabledLink"></div>');
        var buttonPinjam = $(
            '<button style="cursor: pointer" id="btn-pinjam" onclick="openPinjam()" data-id=' +
                book.book_id +
                "><a>Pinjam</a></button>"
        );

        details.append(
            categories,
            title,
            author,
            rating,
            linkPinjam.append(buttonPinjam)
        );
        gridItem.append(img, details);
        gridContainer.append(gridItem);
    });
}

$("#grid-item").on("click", "#btn-pinjam", function () {
    console.log($(this).data("id"));
    var bookId = $(this).data("id");

    $.ajax({
        url: "http://localhost:8000/api/detail-buku/" + bookId, // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi pengguna dalam modal
            var bookData = response.displaydata[0];
            // Ubah teks gambar menjadi URL gambar
            var imageUrl = "data:image/jpeg;base64," + bookData.gambar;
            // Atur nilai src untuk elemen gambar
            $("#gambar-buku-pop").attr("src", imageUrl);
            $("#judul-buku-pop").val(bookData.judul);
            $("#kategori-buku").val(
                bookData.kategori ? bookData.kategori.join(", ") : ""
            );
            $("#penulis-buku").val(bookData.penulis);
            $("#book-id-popup").val(bookId);
            $("#penerbit-buku").val(bookData.penerbit);
            $("#terbit-buku").val(bookData.tahun_terbit);
            $("#stok-buku").val(bookData.stok);
            $("#deskripsi-buku").val(bookData.deskripsi);
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data pengguna. Silakan coba lagi.");
        },
    });
});

function setTanggalKembali() {
    // Buat objek tanggal
    var currentDate = new Date();
    // Tambahkan 7 hari ke objek tanggal
    currentDate.setDate(currentDate.getDate() + 7);

    // Dapatkan nilai tanggal, bulan, dan tahun dari objek tanggal
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Perlu ditambah 1 karena bulan dimulai dari 0
    var year = currentDate.getFullYear();

    // Format tanggal, bulan, dan tahun menjadi string dengan format 'YYYY-MM-DD'
    var formattedDate =
        year +
        "-" +
        month.toString().padStart(2, "0") +
        "-" +
        day.toString().padStart(2, "0");

    // Atur nilai input dengan id 'tgl-kembali' menjadi tanggal yang sudah diformat
    $("#tgl-kembali").val(formattedDate);
}
function setTglPinjam() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();
    var formattedDate = yyyy + "-" + mm + "-" + dd;
    $("#tanggal-pinjam").val(formattedDate); // Set nilai input tgl-kembali
}

$("#grid-item").on("click", "#book_judul", function () {
    console.log($(this).data("id"));
    var bookId = $(this).data("id");
    window.location.href = "/user/Book/" + bookId;
});

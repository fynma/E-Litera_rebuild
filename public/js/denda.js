$(document).ready(function () {
    getData();
    tampilkanDenda();
    getCategories();
    closeDetail();
});

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
                $("#username_pop").text(data.username);
                $("#prev_profile, #prev_profile_pop").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );

                userID = data.user_id;
                userName = data.username;
                console.log(userID);
                console.log(userName);
            }
        },
    });
}

function tampilkanDenda() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/list_denda",
        method: "GET",
        success: function (response) {
            console.log(response);
            $("#tabel-data tbody").empty(); // Hapus semua baris yang ada di tabel

            // Filter data berdasarkan userID
            var borrowsFiltered = response.borrows.filter(function (borrows) {
                return borrows.user_id === userID;
            });

            // Tambahkan data buku ke tabel
            $.each(borrowsFiltered, function (index, borrows) {
                var newRow =
                    "<tr><td>" +
                    (index + 1) +
                    "</td><td>" +
                    borrows.judul +
                    "</td><td>" +
                    borrows.tgl_pinjam +
                    "</td><td>" +
                    borrows.tgl_kembali +
                    "</td><td>" +
                    borrows.petugas_pinjam +
                    "</td><td>" +
                    borrows.petugas_kembali +
                    "</td><td>" +
                    borrows.jumlah_pinjam +
                    "</td><td><button class='btn-view' data-bs-toggle='modal' data-bs-target='#exampleModal' data-id=" +
                    borrows.borrow_id +
                    ">Detail</button></td></tr>";
                $("#tabel-data tbody").append(newRow);
            });

            // Menambahkan event listener untuk tombol delete
            $(".btn-delete").click(function () {
                var bookId = $(this).data("id");
                deleteBook(bookId);
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Gagal mengambil data buku. Silakan coba lagi.");
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

detail = document.getElementById("popupDenda");

$("#tabel-data tbody").on("click", ".btn-view", function () {
    console.log($(this).data("id"));
    detail.classList.add("openPopupDenda");
    var borrowID = $(this).data("id");
    // Tanggal saat ini
    var currentDate = new Date();

    $.ajax({
        url: "http://127.0.0.1:8000/api/dendaSatuan/" + borrowID, // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi keterlambatan dalam modal
            var borrowData = response.borrows[0];
            // Tanggal kembali dari respons API
            var returnDate = new Date(borrowData.tgl_kembali);
            // Hitung durasi telat dalam milidetik
            var lateDuration = currentDate.getTime() - returnDate.getTime();
            // Konversi durasi telat ke hari
            var lateDays = Math.max(
                Math.ceil(lateDuration / (1000 * 60 * 60 * 24)) - 1,
                0
            );
            var totalHarga = lateDays * 1000;
            // Tampilkan informasi pengguna dalam modal
            $("#titleBook").val(borrowData.judul);
            $("#tglPinjam").val(borrowData.tgl_pinjam);
            $("#tglKembali").val(borrowData.tgl_kembali);
            $("#petugasPinjam").val(borrowData.petugas_pinjam);
            $("#petugasKembali").val(borrowData.petugas_kembali);
            $("#jumlahPinjam").val(borrowData.jumlah_pinjam);
            // Tetapkan nilai durasi telat ke input durasiTelat
            $("#durasiTelat").val(lateDays);
            $("#totalHarga").val(totalHarga);
        },
        error: function (xhr, status, error) {
            // Jika terjadi kesalahan, tampilkan pesan kesalahan
            console.error(xhr.responseText);
            alert("Gagal mengambil data keterlambatan. Silakan coba lagi.");
        },
    });
});

function closeDetail() {
    detail.classList.remove("openPopupDenda");
}

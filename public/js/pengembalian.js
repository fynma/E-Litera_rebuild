$(document).ready(function () {
    tampilkanPinjam();
    getData();
    handleConfirm();
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

function tampilkanPinjam() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/returnList",
        method: "GET",
        success: function (response) {
            console.log(response);
            // Hapus semua baris yang ada di tabel
            $("#dataTable tbody").empty();

            // Array untuk menyimpan semua permintaan AJAX
            var ajaxRequests = [];

            // Tambahkan data user dan buku ke tabel
            $.each(response.data, function (index, data) {
                // Tambahkan permintaan AJAX untuk mendapatkan nama pengguna
                var userRequest = $.ajax({
                    url:
                        "http://127.0.0.1:8000/api/detail-user/" + data.user_id,
                    method: "GET",
                    success: function (userResponse) {
                        console.log("User Response:", userResponse); // Debugging
                    },
                    error: function (xhr, status, error) {
                        console.error("Error getting user data:", error); // Error handling
                    },
                });

                // Tambahkan permintaan AJAX untuk mendapatkan judul buku
                var bookRequest = $.ajax({
                    url:
                        "http://localhost:8000/api/detail-buku/" + data.book_id,
                    method: "GET",
                    success: function (bookResponse) {
                        console.log("Book Response:", bookResponse); // Debugging
                    },
                    error: function (xhr, status, error) {
                        console.error("Error getting book data:", error); // Error handling
                    },
                });

                // Tambahkan kedua permintaan ke dalam array
                ajaxRequests.push(userRequest, bookRequest);
            });

            // Tunggu semua permintaan selesai menggunakan Promise.all
            $.when.apply($, ajaxRequests).then(function () {
                // Ambil hasil dari semua permintaan
                var responses = arguments;

                // Loop melalui setiap pasangan respons (user dan buku)
                for (var i = 0; i < responses.length; i += 2) {
                    var userResponse = responses[i][0].data; // Akses properti data dari respons userRequest
                    var bookResponse = responses[i + 1][0].displaydata[0]; // Akses array displaydata dari respons bookRequest
                    var data = response.data[i / 2];

                    // Tambahkan data Borrow ke dalam tabel setelah mendapatkan data user dan buku
                    var confirmButtonHtml =
                        data.status !== "Dikembalikan"
                            ? "<button class='btn-confirm' data-id='" +
                              data.borrow_id +
                              "' data-tgl-pinjam='" +
                              data.tgl_pinjam +
                              "' data-tgl-kembali='" +
                              data.tgl_kembali +
                              "' data-jumlah-pinjam='" +
                              data.jumlah_pinjam +
                              "'>Kembali</button>"
                            : "<button class='btn-confirmed' disabled><i class='bi bi-check'></i></button>";

                    var btnTelat =
                        data.status !== "Terlambat"
                            ? "<button class='btn-telat' data-id='" +
                              data.borrow_id +
                              "' data-tgl-pinjam='" +
                              data.tgl_pinjam +
                              "' data-tgl-kembali='" +
                              data.tgl_kembali +
                              "' data-jumlah-pinjam='" +
                              data.jumlah_pinjam +
                              "'>Terlambat</button>"
                            : "<button class='btn-confirmed' disabled><i class='bi bi-check'></i></button>";

                    var newRow =
                        "<tr><td>" +
                        (i / 2 + 1) +
                        "</td>" +
                        "<td>" +
                        userResponse.username +
                        "</td>" +
                        "<td>" +
                        bookResponse.judul +
                        "</td>" +
                        "<td>" +
                        data.petugas_pinjam +
                        "</td>" +
                        "<td>" +
                        data.tgl_pinjam +
                        "</td>" +
                        "<td>" +
                        data.tgl_kembali +
                        "</td>" +
                        "<td>" +
                        data.jumlah_pinjam +
                        "</td>" +
                        "<td id='confirm-pinjam'>" +
                        data.status +
                        "</td>" +
                        "<td>" +
                        "<button class='btn-view' onclick='openView(this)'><i class='bi bi-eye'></i></button>" +
                        "<button class='btn-delete' onclick='openDelete(this)'><i class='bi bi-trash'></i></button>" +
                        confirmButtonHtml +
                        btnTelat +
                        "</td></tr>";

                    $("#dataTable tbody").append(newRow);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Gagal mengambil data borrow. Silakan coba lagi.");
        },
    });
}

$("#dataTable tbody").on("click", ".btn-confirm", function () {
    console.log($(this).data("id"));
    console.log($(this).data("tgl-pinjam"));
    console.log($(this).data("tgl-kembali"));
    console.log($(this).data("jumlah-pinjam"));
    var borrowID = $(this).data("id");
    var tglPinjam = $(this).data("tgl-pinjam");
    var tglKembali = $(this).data("tgl-kembali");
    var jmlPinjam = $(this).data("jumlah-pinjam");
    $("#konfirmasi-kembali").val(1);
    $("#borrow-id").val(borrowID);
    $("#tgl-pinjam").val(tglPinjam);
    $("#tgl-kembali").val(tglKembali);
    $("#jumlah-pinjam").val(jmlPinjam);
    $("#updateBorrow").submit(); // Submit form setelah mengatur nilainya
});

$("#dataTable tbody").on("click", ".btn-telat", function () {
    console.log($(this).data("id"));
    console.log($(this).data("tgl-pinjam"));
    console.log($(this).data("tgl-kembali"));
    console.log($(this).data("jumlah-pinjam"));
    var borrowID = $(this).data("id");
    var tglPinjam = $(this).data("tgl-pinjam");
    var tglKembali = $(this).data("tgl-kembali");
    var jmlPinjam = $(this).data("jumlah-pinjam");
    $("#konfirmasi-kembali").val(2);
    $("#borrow-id").val(borrowID);
    $("#tgl-pinjam").val(tglPinjam);
    $("#tgl-kembali").val(tglKembali);
    $("#jumlah-pinjam").val(jmlPinjam);
    $("#updateBorrow").submit(); // Submit form setelah mengatur nilainya
});

function handleConfirm() {
    $("#updateBorrow").on("submit", function (event) {
        event.preventDefault(); // Menghentikan perilaku default pengiriman formulir

        // Mengambil data dari formulir
        var formData = $(this).serialize();

        // Kirim data ke controller API
        $.ajax({
            url: "http://127.0.0.1:8000/api/returnBorrow",
            method: "POST",
            data: formData,
            success: function (response) {
                // Handle response jika sukses
                console.log(response);
                // Misalnya, tampilkan pesan sukses kepada pengguna
                alert("Pengembalian berhasil dikonfirmasi.");
                location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error jika permintaan gagal
                console.error(xhr.responseText);
                // Misalnya, tampilkan pesan kesalahan kepada pengguna
                alert("Terjadi kesalahan. Silakan coba lagi.");
            },
        });
    });
}

// function confirmBorrow(button) {
//     var borrowId = $(button).data("borrow_id");
//     $.ajax({
//         url: "http://127.0.0.1:8000/api/confirmBorrow",
//         method: "POST",
//         data: { borrow_id: borrowId },
//         success: function (response) {
//             alert("Peminjaman berhasil dikonfirmasi!");
//             // Nonaktifkan tombol setelah berhasil dikonfirmasi
//             $(button)
//                 .removeClass("btn-confirm")
//                 .addClass("btn-confirmed")
//                 .prop("disabled", true)
//                 .html("<i class='bi bi-check'></i>");
//             // Reload atau refresh tabel setelah konfirmasi berhasil
//             tampilkanPinjam();
//         },
//         error: function (xhr, status, error) {
//             console.error("Error confirming borrow:", error);
//             alert("Gagal mengkonfirmasi peminjaman. Silakan coba lagi.");
//         },
//     });
// }

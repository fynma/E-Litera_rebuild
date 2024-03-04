$(document).ready(function () {
    tampilkanPinjam();
    getData();
    handleConfirm();
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

function tampilkanPinjam() {
    $.ajax({
        url: appUrl + "/api/borrowList",
        method: "GET",
        success: function (response) {
            console.log(response);
            $("#dataTable tbody").empty();
            var ajaxRequests = [];
            $.each(response.data, function (index, data) {
                var userRequest = $.ajax({
                    url:
                    appUrl + "/api/detail-user/" + data.user_id,
                    method: "GET",
                    success: function (userResponse) {
                        console.log("User Response:", userResponse); 
                        var userIdFromDetailUser = userResponse.user_id;
                        handleConfirm(userIdFromDetailUser);

                    },
                    error: function (xhr, status, error) {
                        console.error("Error getting user data:", error);
                    },
                });
                var bookRequest = $.ajax({
                    url:
                    appUrl + "/api/detail-buku/" + data.book_id,
                    method: "GET",
                    success: function (bookResponse) {
                        console.log("Book Response:", bookResponse); 
                    },
                    error: function (xhr, status, error) {
                        console.error("Error getting book data:", error);
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
                        data.status !== "Dipinjam"
                            ? "<button class='btn-confirm' data-id='" +
                              data.borrow_id +
                              "' data-tgl-pinjam='" +
                              data.tgl_pinjam +
                              "' data-tgl-kembali='" +
                              data.tgl_kembali +
                              "' data-jumlah-pinjam='" +
                              data.jumlah_pinjam +
                              "'>Confirm</button>"
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
    $("#borrow-id").val(borrowID);
    $("#tgl-pinjam").val(tglPinjam);
    $("#tgl-kembali").val(tglKembali);
    $("#jumlah-pinjam").val(jmlPinjam);
    $("#updateBorrow").submit(); // Submit form setelah mengatur nilainya
});

function handleConfirm(userIdFromDetailUser) {
    console.log("User ID:", userIdFromDetailUser);
    var userId = document.querySelector('meta[name="user-id"]').content;
    var username = document.querySelector('meta[name="username"]').content;


    $("#updateBorrow").on("submit", function (event) {
        event.preventDefault(); // Menghentikan perilaku default pengiriman formulir

        // Mengambil data dari formulir
        var formData = $(this).serialize();

        // Kirim data ke controller API
        $.ajax({
            url: appUrl + "/api/confirmBorrow",
            method: "POST",
            data: formData,
            success: function (response) {
                console.log(response);
                alert("Peminjaman berhasil dikonfirmasi.");
                location.reload();


                var notifData = {
                    user_id: userId, 
                    to_user: userIdFromDetailUser,
                    title: "Peminjaman Baru",
                    message: "peminjaman telah dikonfirmasi oleh petugas " + username + " !. Buku sudah bisa diambil di perpustakaan.", 
                };

                // Kirim data form notification menggunakan AJAX
                $.ajax({
                    url: appUrl + "/api/sendNotif",
                    type: "POST",
                    data: notifData,
                    success: function (notifResponse) {
                        console.log("Notifikasi berhasil dikirim");
                    },
                    error: function (notifXhr, notifStatus, notifError) {
                        console.error("Gagal mengirim notifikasi");
                        console.error(notifXhr.responseText);
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan. Silakan coba lagi.");
            },
        });
    });
}


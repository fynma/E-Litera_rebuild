$(document).ready(function () {
    getData();
    tampilkanDenda();
    getCategories();
    closeDetail();
    // handleConfirm();
});

function getData() {
    $.ajax({
        url: appUrl + "/profile",

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

                var userID = data.user_id;
                userName = data.username;
                console.log(userID);
                console.log(userName);
                tampilkanDenda(userID);
            }
        },
    });
}

function tampilkanDenda(userID) {
    console.log(userID);
    $("#tabel-data").dataTable({
        destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/list_denda",
            data: { user_id: userID },
            dataSrc: "borrows",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "judul" },
            { data: "tgl_pinjam" },
            { data: "tgl_kembali" },
            { data: "petugas_pinjam" },
            { data: "petugas_kembali" },
            { data: "jumlah_pinjam" },
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        '<div><button class="btn-view" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
                        data.borrow_id +
                        '" data-user-id="' +
                        data.user_id +
                        '" data-book-id="' +
                        data.book_id +
                        '" data-tgl-kembali="' +
                        data.tgl_kembali +
                        '" data-username="' +
                        data.username +
                        '">Detail</button></div>'
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
}

// Fungsi untuk mengambil data kategori dari API
function getCategories() {
    $.ajax({
        url: appUrl + "/api/categoryList",
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
    console.log($(this).data("user-id"));
    console.log($(this).data("book-id"));
    console.log($(this).data("tgl-kembali"));
    console.log($(this).data("username"));
    var borrowID = $(this).data("id");
    var usernama = $(this).data("username");
    var userID = $(this).data("user-id");
    var bookID = $(this).data("book-id");
    var tglKembali = $(this).data("tgl-kembali");
    // Tanggal saat ini
    var currentDate = new Date();
    // Tanggal kembali dari respons API
    var returnDate = new Date(tglKembali);
    // Hitung durasi telat dalam milidetik
    var lateDuration = currentDate.getTime() - returnDate.getTime();
    // Konversi durasi telat ke hari
    var lateDays = Math.max(
        Math.ceil(lateDuration / (1000 * 60 * 60 * 24)) - 1,
        0
    );
    totalHarga = lateDays * 1000;

    $("#borrowID").val(borrowID);
    $("#namauser").val(usernama);
    $("#user_id").val(userID);
    $("#book_id").val(bookID);
    $("#keterlambatan").val(lateDays);
    $("#tarif_denda").val(totalHarga);
    // $("#bayarDenda").submit();

    detail.classList.add("openPopupDenda");

    $.ajax({
        url: appUrl + "/api/dendaSatuan/" + borrowID, // Sesuaikan dengan endpoint API Anda
        method: "GET",
        success: function (response) {
            console.log(response);
            // Tampilkan informasi keterlambatan dalam modal
            var borrowData = response.borrows[0];
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

// midtrans
$("#popupDenda").on("click", "#pay-button", function () {
    var borrowID = $("#borrowID").val();
    var namaUser = $("#namauser").val();
    var totalHarga = $("#totalHarga").val();

    $.ajax({
        url: "http://127.0.0.1:8000/api/bayarDenda",
        type: "POST",
        data: {
            idBorrow: borrowID,
            totalHarga: totalHarga,
            namauser: namaUser,
        },
        success: function (response) {
            console.log(response);
            window.snap.pay(response.snapToken, {
                onSuccess: function (result) {
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/bayarSukses",
                        type: "POST",
                        data: {
                            idPinjam: result.order_id,
                            transaction_status: result.transaction_status,
                        },
                        success: function (response) {
                            console.log(
                                "Status berhasil diperbarui:",
                                response
                            );
                            location.reload();
                            // Tambahkan logika atau tindakan lain setelah berhasil memperbarui status
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Gagal memperbarui status:",
                                xhr.responseText
                            );
                            // Tangani kesalahan jika terjadi
                        },
                    });
                    console.log(result);
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert("you closed the popup without finishing the payment");
                },
            });
        },
        error: function (xhr, status, error) {
            // Penanganan error jika terjadi
            console.error(xhr.responseText);
        },
    });
});
function closeDetail() {
    detail.classList.remove("openPopupDenda");
}

// $("#popupDenda").on("click", "#pay-button", function () {
//     var formData = $("#detailDenda").serialize();
//     var userName = userID;
//     console.log(userName);
//     $.ajax({
//         url: appUrl + "/api/transaction",
//         method: "POST",
//         data: formData,
//         success: function (response) {
//             console.log(response);
//         },
//         error: function (xhr, status, error) {
//             // Handle error jika permintaan gagal
//             console.error(xhr.responseText);
//         },
//     });
// });

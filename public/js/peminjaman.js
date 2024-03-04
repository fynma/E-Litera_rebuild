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
                $("#user").text(data.username + " | " + data.access);
                $("#prev-prof").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

function tampilkanPinjam() {
    $("#dataTable").dataTable({
        Destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/listPermintaanPinjam",
            dataSrc: "borrows",
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "username" },
            { data: "judul" },
            { data: "petugas_pinjam" },
            { data: "tgl_pinjam" },
            { data: "tgl_kembali" },
            { data: "jumlah_pinjam" },
            { data: "status" },
            {
                data: null,
                render: function (data, type, row) {
                    if (data.status === "Sedang diproses") {
                        return (
                            '<div><button class="btn-confirm" data-id="' +
                            data.borrow_id +
                            '" data-tgl-pinjam="' +
                            data.tgl_pinjam +
                            '" data-tgl-kembali="' +
                            data.tgl_kembali +
                            '" data-jumlah-pinjam="' +
                            data.jumlah_pinjam +
                            '">Konfirmasi</button></div>'
                        );
                    } else if (data.status === "Dipinjam") {
                        return (
                            '<div><button class="btn-confirmed" data-id="' +
                            data.borrow_id +
                            '" data-tgl-pinjam="' +
                            data.tgl_pinjam +
                            '" data-tgl-kembali="' +
                            data.tgl_kembali +
                            '" data-jumlah-pinjam="' +
                            data.jumlah_pinjam +
                            '">Selesai</button></div>'
                        );
                    } else {
                        return "";
                    }
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
                    message:
                        "peminjaman telah dikonfirmasi oleh petugas " +
                        username +
                        " !. Buku sudah bisa diambil di perpustakaan.",
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
                    },
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Terjadi kesalahan. Silakan coba lagi.");
            },
        });
    });
}

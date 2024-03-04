$(document).ready(function () {
    tampilkanPinjam();
    getData();
    $(".btn-print").on("click", function () {
        $(".dt-button.buttons-pdf.buttons-html5").click();
    });
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
        layout: {
            topStart: {
                buttons: ["pdf"],
            },
        },
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
                            '" data-user-id="' +
                            data.user_id +
                            '" data-username="' +
                            data.username +
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
    console.log($(this).data("user-id"));
    console.log($(this).data("username"));
    var borrowID = $(this).data("id");
    var tglPinjam = $(this).data("tgl-pinjam");
    var tglKembali = $(this).data("tgl-kembali");
    var jmlPinjam = $(this).data("jumlah-pinjam");
    var userId = $(this).data("user-id");
    var userygLogin = document.querySelector('meta[name="user-id"]').content;
    var usernameygLogin = document.querySelector(
        'meta[name="username"]'
    ).content;

    $.ajax({
        url: appUrl + "/api/confirmBorrow",
        method: "POST",
        data: {
            borrow_id: borrowID,
            tgl_pinjam: tglPinjam,
            tgl_kembali: tglKembali,
            jumlah_pinjam: jmlPinjam,
            user_id: userId,
        },
        success: function (response) {
            console.log(response);
            alert("Peminjaman berhasil dikonfirmasi.");
            location.reload();


            var notifData = {
                user_id: userygLogin,
                to_user: userId,
                title: "Peminjaman Baru",
                message:
                    "peminjaman telah dikonfirmasi oleh petugas " +
                    usernameygLogin +
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

$(document).ready(function () {
    tampilkanPinjam();
    getData();
    handleConfirm();
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
            url: appUrl + "/api/listPinjam",
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
                    return (
                        '<div><button class="btn-confirm" data-id="' +
                        data.borrow_id +
                        '" data-tgl-pinjam="' +
                        data.tgl_pinjam +
                        '" data-tgl-kembali="' +
                        data.tgl_kembali +
                        '" data-jumlah-pinjam="' +
                        data.jumlah_pinjam +
                        '">Konfirmasi</button><button class="btn-telat" data-id="' +
                        data.borrow_id +
                        '" data-tgl-pinjam="' +
                        data.tgl_pinjam +
                        '" data-tgl-kembali="' +
                        data.tgl_kembali +
                        '" data-jumlah-pinjam="' +
                        data.jumlah_pinjam +
                        '">Terlambat</button></div>'
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
            url: appUrl + "/api/returnBorrow",
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

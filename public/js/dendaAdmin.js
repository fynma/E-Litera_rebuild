$(document).ready(function () {
    tampilkanDenda();
    getData();
    handleConfirm();
    showNotifikasi();
});

function tampilkanDenda() {
    $("#dataTable").dataTable({
        Destroy: true,
        processing: true,
        ajax: {
            url: appUrl + "/api/list_dendaAdmin",
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
                    if (data.status === "Terlambat") {
                        return (
                            '<div><button class="btn-confirm-disabled" data-id="' +
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
                            '">Konfirmasi Pengembalian</button></div>'
                        );
                    } else if (data.status === "Telah dibayar") {
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
                            '">Konfirmasi Pengembalian</button></div>'
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

function handleConfirm() {
    $("#updateBorrow").on("submit", function (event) {
        event.preventDefault(); // Menghentikan perilaku default pengiriman formulir

        // Mengambil data dari formulir
        var formData = {
            userid: $("#updateBorrow input[name='user_id']").val(),
            borrowId: $("#updateBorrow input[name='borrow_id']").val(),
            konfirmasiKembali: $(
                "#updateBorrow input[name='konfirmasi_kembali']"
            ).val(),
            tglpinjam: $("#updateBorrow input[name='tgl_pinjam']").val(),
            tglkembali: $("#updateBorrow input[name='tgl_kembali']").val(),
            jumlahpinjam: $("#updateBorrow input[name='jumlah_pinjam']").val(),
        };

        console.log(formData);

        // Kirim data ke controller API
        $.ajax({
            url: "http://127.0.0.1:8000/api/returnBorrowAfterPayment",
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

function showNotifikasi() {
    $.ajax({
        url: "http://127.0.0.1:8000/api/notifadmin",
        type: "GET",
        success: function (response) {
            console.log(response);
            var notifs = response.data;
            const notifContainer = $("#notifAdmin");

            $.each(notifs, function (index, notif) {
                // Buat struktur HTML untuk setiap komentar
                const notifDiv = `
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">${notif.created_at}</div>
                            ${notif.message}
                        </div>
                    </a>
                `;

                // Tambahkan komentar ke dalam container
                notifContainer.append(notifDiv);
            });
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
        },
    });
}

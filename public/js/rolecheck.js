document.addEventListener("DOMContentLoaded", function () {
    var userId = document.querySelector('meta[name="user-id"]').content;
    var access = document.querySelector('meta[name="access"]').content;

    var idUser = userId;
    var idUserRole = access;

    console.log("User ID:", idUser);
    console.log("Access:", idUserRole);

    var datapenggunaLink = document.querySelector(
        'a[href="/admin/Data-Pengguna"]'
    );
    var databukuLink = document.querySelector('a[href="/admin/Data-Buku"]');
    var kategoriLink = document.querySelector('a[href="/admin/Kategori"]');

    if (idUser && idUserRole) {
        if (kategoriLink) {
            kategoriLink.addEventListener("click", function (event) {
                if (idUserRole === "administrator") {
                    console.log("Kategori Link:", kategoriLink);

                    event.preventDefault();
                    alert("Administrator tidak bisa mengakses halaman ini.");
                }
            });
        }

        if (databukuLink) {
            databukuLink.addEventListener("click", function (event) {
                if (idUserRole === "administrator") {
                    event.preventDefault();
                    alert("Administrator tidak bisa mengakses halaman ini.");
                }
            });
        }
    }
});

// document.addEventListener("DOMContentLoaded", function () {
//     var userId = document.querySelector('meta[name="user-id"]').content;
//     var access = document.querySelector('meta[name="access"]').content;

//     var idUser = userId;
//     var idUserRole = access;

//     console.log("User ID:", idUser);
//     console.log("access:", access);

//     // Ambil elemen-elemen yang diperlukan
//     var datapenggunaLink = document.querySelector('a[href="/admin/Data-Pengguna"]');
//     var tambahbukuLink = document.querySelector('a[href="/admin/Tambah-Buku"]');
//     var databukuLink = document.querySelector('a[href="/admin/Data-Buku"]');
//     var datapeminjamLink = document.querySelector('a[href="/admin/Data-Peminjaman"]');
//     var datakembaliLink = document.querySelector('a[href="/admin/Pengembalian"]');
//     var kategoriLink = document.querySelector('a[href="Kategori"]');

//     if (idUser) {
//         if (kategoriLink) {
//             kategoriLink.addEventListener("click", function (event) {
//                 if (idUserRole == administrator) {
//                     event.preventDefault();
//                     alert("Administrator tidak bisa mengakses halaman ini.");
//                 }
//             });
//         }
//     }
//     if (idUser) {
//         if (databukuLink) {
//             databukuLink.addEventListener("click", function (event) {
//                 if (idUserRole == administrator) {
//                     event.preventDefault();
//                     alert("Administrator tidak bisa mengakses halaman ini.");
//                 }
//             });
//         }
//     }
// })

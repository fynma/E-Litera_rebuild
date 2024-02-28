$(document).ready(function () {
    getData();
    getTotalBook();
    getTotalUser();
    getTotalPinjam();
    getTotalStok();
    getTotalDenda();
});



function getData() {
    $.ajax({
        url: 'http://127.0.0.1:8000/profile',
        type: 'GET',
        success: function (response) {
            console.log(response);
            if (response.success) {
                var data = response.data;
                $('#user').text(data.username, data.access) ;
                $('#prev-prof').attr('src', 'data:image/png;base64,' + data.photo)
            }
        },
    });
}
// Menggunakan AJAX untuk memanggil fungsi backend
function getTotalUser() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/total-user',
        type: 'GET',
        success: function (response) {
            if (response.success) {
                $('#total-user').text(response.data);
            } else {
                console.error('Gagal mendapatkan total user: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Terjadi kesalahan: ' + error);
        }
    });
}
function getTotalPinjam() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/total-pinjam', // Ganti dengan URL yang sesuai
        type: 'GET',
        success: function (response) {
            console.log(response);
            if (response.data) {
                // Mengupdate elemen HTML dengan data dari backend
                $('#getTotalBorrow').text(response.data);
            } else {
                console.error('Gagal mendapatkan total buku yang dipinjam: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error('Terjadi kesalahan: ' + error);
        }
    });
}



function getTotalBook() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/bookCover',
        type: 'GET',
        success: function (response) {
            console.log(response);
            if (response.data) {
                var books = response.data;
                var uniqueBookIds = []; // Array untuk menyimpan ID buku unik

                // Loop melalui setiap buku dan tambahkan ID buku ke dalam array jika belum ada
                books.forEach(function (book) {
                    var bookId = book.book_id;
                    if (!uniqueBookIds.includes(bookId)) {
                        uniqueBookIds.push(bookId);
                    }
                });

                // Hitung jumlah ID buku unik
                var totalUniqueBooks = uniqueBookIds.length;
                $('#getTotalBook').text(totalUniqueBooks);

            } else {
                console.error('Gagal mengambil data buku dari API.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error saat mengambil data buku:', error);
        }
    });
}

function getTotalStok() {
    // AJAX request to your Laravel endpoint
    $.ajax({
        url: 'http://127.0.0.1:8000/api/showStok', // Change this URL to match your Laravel route
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Update the HTML element with the total stok value
            $('#totalStok').text(response.data);
        },
        error: function (error) {
            console.error('Error fetching total book stok:', error);
            $('#totalStok').text('Failed to fetch data');
        }
    });
};

function getTotalDenda() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/list_denda',
        type: 'GET',
        success: function (response) {
            console.log(response);
            if (response.borrows) {
                var denda = response.borrows;
                var uniquedenda = []; // Array untuk menyimpan ID buku unik

                // Loop melalui setiap buku dan tambahkan ID buku ke dalam array jika belum ada
                denda.forEach(function (denda) {
                    var dendaId = denda.denda_id;
                    if (!uniquedenda.includes(dendaId)) {
                        uniquedenda.push(dendaId);
                    }
                });

                // Hitung jumlah ID buku unik
                var totalUniquedenda = uniquedenda.length;
                $('#TotalDenda').text(totalUniquedenda);

            } else {
                console.error('Gagal mengambil data buku dari API.');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error saat mengambil data buku:', error);
        }
    });
}


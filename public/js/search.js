$(document).ready(function () {
    getData();
    searchBooks();
    displayBooks();
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
                $("#username_pop").val(data.username);
                $("#username-popup").text(data.username);
                $("#prev_profile, #prev_profile_pop").attr(
                    "src",
                    "data:image/png;base64," + data.photo
                );
            }
        },
    });
}

// Function untuk memindahkan halaman
function redirectToSearchPage(keyword) {
    // Konversi keyword menjadi lowercase
    var lowercaseKeyword = keyword.toLowerCase();
    
    // Navigasi ke halaman pencarian dengan parameter keyword yang sudah diubah menjadi lowercase
    window.location.href = appUrl + '/user/search/' + encodeURIComponent(lowercaseKeyword);
    
    // Console log untuk menampilkan keyword yang sudah diubah menjadi lowercase
    console.log('Keyword untuk navigasi:', lowercaseKeyword);
}


// Function untuk melakukan pencarian dan menampilkan hasil di konsol
function searchBooks(keyword) {
    var path = window.location.pathname;
    var parts = path.split('/');
    var keyword = parts[parts.length - 1];

    $('#search-key').text(keyword);

    console.log('Keyword yang diketikkan:', keyword);


    $.ajax({
        url: appUrl + '/api/bookCover',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);

            if (response && response.data) {
                var data = response.data;
                console.log('data buku:', data);

                var allTitles = data.filter(function (book) {
                    return book.judul && typeof book.judul === 'string';
                }).map(function (book) {
                    return book.judul;
                });                
                var keywordLetters = keyword.toLowerCase().split('');

                var searchResults = allTitles.filter(function (title) {
                    if (title && typeof title === 'string') {
                        var titleLetters = title.toLowerCase().split('');
                        return keywordLetters.every(function (letter) {
                            return titleLetters.includes(letter);
                        });
                    }
                    return false;
                });
                console.log('Hasil pencarian:', searchResults);

                var books = data.filter(function (book) {
                    return searchResults.includes(book.judul);
                });
    
                console.log('Informasi buku yang ditemukan:', books);
    
                // Tempat display data 
                displayBooks(books);
            }
        },
    });
}

// Menghubungkan function pencarian dengan event tombol Enter
$('#cari').on('keypress', function (event) {
    if (event.which === 13) {
        var keyword = $(this).val();
        searchBooks(keyword);
        redirectToSearchPage(keyword);
    }
});

function displayBooks(books) {

    var gridContainer = $("#grid-item");
    gridContainer.empty();

    // books = books.slice(0, 6).reverse();


    $.each(books, function (index, book) {
        var gridItem = $(
            '<div class="grid-item" data-rating="' + book.rating + '"></div>'
        );
        var img = $("<img>")
            .attr("src", "data:image/png;base64," + book.gambar)
            .attr("alt", book.judul);

        var details = $('<div class="details"></div>');

        var categories = $('<div id="kategori-buku"></div>');
        $.each(book.kategori, function (i, category) {
            categories.append('<a href="#">' + category + "</a>, ");
        });

        var title = $(
            '<h3 id="judul-buku"><a style="cursor:pointer;" id="book_judul" data-id="' +
                book.book_id +
                '">' +
                book.judul +
                "</a></h3>"
        );
        var author = $(
            '<a href="#" id="penulis-buku">By: ' + book.penulis + "</a>"
        );

        var rating = $('<div class="rating"></div>');
        var fullStars = Math.floor(book.rating); 
        var decimalPart = book.rating - fullStars; 
        var halfStar = decimalPart >= 0.25 && decimalPart < 0.75; 
        var fullStarAfterHalf = decimalPart >= 0.75; 

        for (var i = 1; i <= 5; i++) {
            if (i <= fullStars) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && halfStar) {
                rating.append(
                    '<i class="bi bi-star-half" value="' + i + '"></i>'
                );
            } else if (i === fullStars + 1 && fullStarAfterHalf) {
                rating.append(
                    '<i class="bi bi-star-fill" value="' + i + '"></i>'
                );
            } else {
                rating.append('<i class="bi bi-star" value="' + i + '"></i>');
            }
        }

        var linkPinjam = $('<div class="link-pinjam" id="disabledLink"></div>');
        var buttonPinjam = $(
            '<button style="cursor: pointer" id="btn-pinjam" onclick="openPinjam()" data-id=' +
                book.book_id +
                "><a>Pinjam</a></button>"
        );

        details.append(
            categories,
            title,
            author,
            rating,
            linkPinjam.append(buttonPinjam)
        );
        gridItem.append(img, details);
        gridContainer.append(gridItem);
    });
}


// $('#cari').on('keypress', function (event) {
//     if (event.which === 13) {
//         var keyword = $(this).val();
//         searchBooks(keyword);
//     }
// });


// function searchBooks(keyword) {
//     console.log('Keyword yang diketikkan:', keyword);
//     $.ajax({
//         url: appUrl + '/api/bookCover',
//         method: 'GET',
//         dataType: 'json',
//         success: function (response) {
//             console.log(response);

//             if (response && response.data) {
//                 var data = response.data;
//                 console.log('data buku:', data);
            
//                 // Mengumpulkan semua judul dari seluruh buku
//                 var allTitles = data.map(function (book) {
//                     return book.judul;
//                 });
            
//                 console.log('Semua judul buku:', allTitles);
            
//                 // Memfilter hasil pencarian berdasarkan keyword di antara semua judul
//                 var keywordLetters = keyword.toLowerCase().split('');

//                 // Memfilter judul berdasarkan huruf yang cocok dengan keyword
//                 var searchResults = allTitles.filter(function (title) {
//                     // Memastikan title ada dan bertipe string
//                     if (title && typeof title === 'string') {
//                         // Mengumpulkan semua huruf dari judul
//                         var titleLetters = title.toLowerCase().split('');
            
//                         // Memeriksa apakah setidaknya satu huruf dari keyword ada dalam judul
//                         return keywordLetters.some(function (letter) {
//                             return titleLetters.includes(letter);
//                         });
//                     }
//                     return false;
//                 });
            
//                 console.log('Hasil pencarian:', searchResults);
            
//                 // Navigasi ke halaman pencarian dengan parameter keyword
//                 window.location.href = appUrl + '/user/search/' + encodeURIComponent(keyword);
//             } else {
//                 console.error('Response tidak sesuai format yang diharapkan.');
//             }
//         },
//         error: function (error) {
//             console.error('Error:', error);
//         }
//     });
// }

            
            // if (response && response.data) {
            //     var data = response.data;
            //     console.log('data buku:', data);
            //     var judul = data.judul;
            //     console.log('Judul buku:', judul);
            //     var searchResults = data.filter(function (book) {
            //         // Periksa apakah 'judul' ada, tidak undefined, dan bukan string 'undefined'
            //         return book.judul && typeof book.judul === 'string' && book.judul.toLowerCase() !== 'undefined' && book.judul.toLowerCase().includes(keyword.toLowerCase());
            //     });
            //     console.log('Hasil pencarian:', searchResults);

            //     // Navigasi ke halaman pencarian dengan parameter keyword
            //     window.location.href = appUrl + '/user/search/' + encodeURIComponent(keyword);
            // } else {
            //     console.error('Response tidak sesuai format yang diharapkan.');
            // }



// function searchBooks(keyword) {
//     $.ajax({
//         url: appUrl + '/api/bookCover',
//         method: 'GET',
//         dataType: 'json',
//         success: function (response) {
//             console.log(response);
//             if (response.data) {
//                 var data = response.data;
//                 console.log('data buku : ' + data);
//                 var searchResults = response.data.filter(function (book) {
//                     return book.judul !== undefined && book.judul.toLowerCase() !== 'undefined' && book.judul.toLowerCase().includes(keyword.toLowerCase());
//                 });
//                 console.log(searchResults);


//                 // Navigasi ke halaman pencarian dengan parameter keyword
//                 window.location.href = appUrl + '/user/search/' + encodeURIComponent(keyword);
//             }
//         },
//         error: function (error) {
//             console.error('Error:', error);
//         }
//     });
// }

// Menambahkan event listener untuk tombol "Enter"


// Tambahan: Jika Anda ingin tetap menjalankan pencarian saat input berubah
// $('#cari').on('input', function () {
//     var keyword = $(this).val();
//     searchBooks(keyword);
// });



// $(document).ready(function () {
//     function searchBooks(keyword) {
//         $.ajax({
//             url: appUrl+'/api/bookCover',
//             method: 'GET',
//             dataType: 'json',
//             success: function (response) {
//                 var searchResults = response.data.filter(function (book) {
//                     return book.judul.toLowerCase().includes(keyword.toLowerCase());
//                 });
//                 console.log(searchResults);
//             },
//             error: function (error) {
//                 console.error('Error:', error);
//             }
//         });
//     }
//     $('#cari').on('input', function () {
//         var keyword = $(this).val();
//         searchBooks(keyword);
//     });
// });
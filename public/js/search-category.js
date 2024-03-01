$(document).ready(function () {
    getData();
    displayBooks();

    if (isTargetURLsearch()) {
        searchBooks();
    }

    if (isTargetURLcategory()) {
        categoryOpen();
    }
});

$('#cari').on('keypress', function (event) {
    if (event.which === 13) {
        var keyword = $(this).val();
        searchBooks(keyword);
        redirectToSearchPage(keyword);
    }
});

function isTargetURLsearch() {
    var pathArray = window.location.pathname.split('/');
    var keywordFromURL = pathArray[pathArray.indexOf('search') + 1];
    var targetURL = 'http://127.0.0.1:8000/user/search/' + keywordFromURL;
    var currentURL = window.location.href;
    return currentURL === targetURL;
}

function isTargetURLcategory() {
    var pathArray = window.location.pathname.split('/');
    var keywordFromURL = pathArray[pathArray.indexOf('category') + 1];
    var targetURL = 'http://127.0.0.1:8000/user/category/' + keywordFromURL;
    var currentURL = window.location.href;
    return currentURL === targetURL;
}

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
    var lowercaseKeyword = keyword.toLowerCase();
    window.location.href = appUrl + '/user/search/' + encodeURIComponent(lowercaseKeyword);
    console.log('Keyword untuk navigasi:', lowercaseKeyword);
}

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
                displayBooks(books);
            }
        },
    });
}


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

function categoryOpen() {
    var path = window.location.pathname;
    var parts = path.split('/');
    var category = parts[parts.length - 1];

    $('#category-key').text(category);

    console.log('Keyword yang diketikkan:', category);

    $.ajax({
        url: appUrl + '/api/bookCover',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            
            if (response && response.data) {
                var data = response.data;
                console.log('data buku:', data);

                var allCategories = data.filter(function (book) {
                    return book.kategori && Array.isArray(book.kategori);
                }).map(function (book) {
                    return book.kategori.map(function (cat) {
                        return cat.toLowerCase();
                    });
                }).flat();

                var categoryLowerCase = category.toLowerCase();

                var searchResults = allCategories.filter(function (bookCategory) {
                    return bookCategory.includes(categoryLowerCase);
                });

                var filteredBooks = data.filter(function (book) {
                    return book.kategori && book.kategori.map(function (cat) {
                        return cat.toLowerCase();
                    }).includes(categoryLowerCase);
                });

                console.log('Informasi buku yang ditemukan:', filteredBooks);
                displayBooks(filteredBooks);
            }
        }
    });
}
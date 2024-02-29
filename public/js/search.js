$(document).ready(function () {
    function searchBooks(keyword) {
        $.ajax({
            url: appUrl+'/api/bookCover', 
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                var searchResults = response.data.filter(function (book) {
                    return book.judul.toLowerCase().includes(keyword.toLowerCase());
                });
                console.log(searchResults);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    }
    $('#cari').on('input', function () {
        var keyword = $(this).val();
        searchBooks(keyword);
    });
});
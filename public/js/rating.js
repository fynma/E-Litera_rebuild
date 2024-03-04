// document.addEventListener("DOMContentLoaded", function () {
//     const bintang = document.querySelectorAll('.bi-star');

//     bintang.forEach(function (star) {
//       star.addEventListener('click', function () {
//         const value = this.getAttribute('value');
//         highlightStars(value);
//       });
//     });

//     function highlightStars(value) {
//       bintang.forEach(function (star) {
//         const starValue = star.getAttribute('value');
//         if (starValue <= value) {
//           star.classList.remove('bi-star');
//           star.classList.add('bi-star-fill');
//         } else {
//           star.classList.remove('bi-star-fill');
//           star.classList.add('bi-star');
//         }
//       });
//     }
//   });

$(document).ready(function () {
    rateBook();
});

function rateBook() {
    var bintangIcons = document.querySelectorAll('.bi-star');
    var userId = document.querySelector('meta[name="user-id"]').content;
    var url = window.location.href;
    var urlParts = url.split("/");
    var bookId = urlParts[urlParts.length - 1];

    bintangIcons.forEach(function (star) {
        star.addEventListener('click', function () {
            const value = this.getAttribute('value');
            highlightStars(value);

            // Kirim rating ke backend
            sendRating(userId, bookId, value);
        });
    });

    function highlightStars(value) {
        bintangIcons.forEach(function (star) {
            const starValue = star.getAttribute('value');
            if (starValue <= value) {
                star.classList.remove('bi-star');
                star.classList.add('bi-star-fill');
            } else {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            }
        });
    }

    function sendRating(userId, bookId, rating) {
        const apiUrl = '/api/rating';

        fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                user_id: userId,
                book_id: bookId,
                rating: rating,
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error sending rating:', error);
        });
    }
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <style>
        #categoryList ul {
            display: none;
            transition: opacity 0.3s ease-in-out;
        }

        #categoryList li:hover {
            background-color: #f0f0f0;
            /* Ganti dengan warna latar yang diinginkan */
        }

        #categoryList li a {
            text-decoration: none;
            color: #333;
            /* Ganti dengan warna teks yang diinginkan */
            display: block;
            padding: 8px 12px;
        }

        #categoryList li:hover a {
            color: #fff;
            /* Ganti dengan warna teks saat dihover yang diinginkan */
        }

        #categoryList:hover li {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.html"><img src="../img/logo aplikasi billa 1.png" /></a>
        <!-- <div class="toggle">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
      <div class="bg-sidebar"></div> -->
        <div class="kotak-search">
            <input type="search" name="cari" id="cari" placeholder="Cari" />
            <i class="bi bi-search"></i>
        </div>
        <div class="fav-notif">
            <a href="Favorit.html"><i class="bi bi-heart"></i> Favorit</a>
            <div class="garis-vertikal"></div>
            <a href="Notifikasi.html"><i class="bi bi-bell"></i> Notifikasi</a>
        </div>
    </header>
    <div class="navbar">
        <div class="kosongan-navbar"></div>
        <ul class="navigation">
            <li>
                <a href="#" class="kategori">Kategori <i class="bi bi-chevron-down"></i></a>
                <ul id="categoryList"></ul>
            </li>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="Tentang.html">Tentang</a></li>
            <li>
                <a href="Riwayat.html">Riwayat</a>
            </li>
            <li><a href="Kontak.html">Kontak</a></li>
        </ul>
        <div class="username">
            @if (!session('photo'))
                <img src="../img/avatar.jpg" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="username"></a>
        </div>
    </div>

    <div class="bg-peminjaman" id="bg-peminjaman">
        <div class="peminjaman">
            <div class="header-peminjaman">
                <i class="bi bi-chevron-left" onclick="closePinjam(this)" style="cursor: pointer"></i>
                <img src="../img/logo aplikasi billa 1.png" />
            </div>
            <div class="content-peminjaman">
                <img src="../img/vektor-login.png" />
                <form>
                    <h3>Formulir Peminjaman</h3>
                    <div class="get-pinjam">
                        <label for="nama">Nama</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p id="username_pop"></p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="judul-buku">Judul buku</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>Help Me Find My Stomach</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="stok">Sisa buku tersedia</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>3</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="tgl-kembali">Tanggal kembali</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <p>29/01/2024</p>
                        </div>
                    </div>
                    <div class="get-pinjam">
                        <label for="nama">Jumlah</label>
                        <p>:</p>
                        <div class="data-get-pinjam">
                            <input type="text" name="jumlah" id="jumlah"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                placeholder="isilah jumlah buku.." />
                        </div>
                    </div>
                    <button type="submit">kirim</button>
                </form>
            </div>
        </div>
    </div>

    <section class="banner" id="banner">
        <div class="content">
            <h1>Selamat Datang Di</h1>
            <h1>Website <a href="#">E-Litera</a></h1>
            <p>
                Jelajahi dunia literasi dengan koleksi digital kami. Baca, pelajari,
                dan temukan pengetahuan baru di perpustakaan digital kami.
            </p>
            <a href="Tentang.html" class="btn-banner">Baca Selengkapnya</a>
        </div>
    </section>
    <section class="rekomendasi">
        <div class="title">
            <div class="judul">
                <p>Rekomendasi</p>
                <h1>Pilihan buku terbaik untuk anda</h1>
            </div>
            <div class="btn-rekomendasi">
                <a href="#">Baca Selengkapnya</a>
            </div>
        </div>
        <div class="books-grid" id="grid-item">
            {{-- <div class="grid-item" data-rating="5"> --}}
            {{-- <img src="../img/books1.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div> --}}
        </div>
        {{-- <div class="grid-item" data-rating="5">
                <img src="../img/books2.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books3.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books4.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books5.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="../img/books6.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page.html">Help Me Find My Stomach</a>
                    </h3>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="link-pinjam" id="disabledLink">
                        <button style="cursor: pointer" onclick="openPinjam(this)">
                            <a>Pinjam</a>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    @if (!session('photo'))
                        <img src="../img/avatar.jpg" />
                    @else
                        <img src="data:image/png;base64,{{ session('photo') }}" alt="Nama Alt">
                    @endif
                    <div class="username-popup">
                        <p>{{ session('username') }}</p>
                        <button id="btn-profile">
                            <a href="/user/profile">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                        <img src="../img/icon-denda.png" />
                        <a href="Denda.html">Denda</a>
                    </button>
                    <button id="btn-bantuan">
                        <i class="bi bi-question-circle"></i>
                        <a href="Kontak.html">Bantuan</a>
                    </button>
                </div>
                <button class="btn-logout">
                    <div class="icon-logout">
                        <i class="bi bi-box-arrow-left"></i>
                    </div>
                    <p>Keluar Dari Aplikasi</p>
                </button>
                <br />
                <a onclick="closeModal()">Tutup</a>
            </div>
        </div>
    </div>

    <section class="new-rilis">
        <div class="rilis-konten">
            <p>New Rilis</p>
            <h1 id="judul-new-rilis">
                Temukan Buku-Buku Terbaru dari Penulis Terkenal Lintang Luqman
            </h1>
            <p id="quote-penulis" class="quote-penulis">
                “ Terima kasih telah menyambangi dunia kata-kataku. Semoga setiap
                kalimat membawa inspirasi dan kebahagiaan ke dalam hidupmu. Selamat
                menikmati petualangan kata bersamaku, pembaca setia. ”
            </p>
            <p id="salam-penulis" class="salam-penulis">
                - Salam literasi dari Lintang Luqman
            </p>
            <div class="books-grid">
                <div class="grid-item" data-rating="5">
                    <img src="../img/books7.png" alt="Book 1" />
                    <div class="details">
                        <div id="kategori-buku">
                            <a href="#">Adventure</a>, <a href="#">Fun</a>
                        </div>
                        <h3 id="judul-buku">Help Me Find My Stomach</h3>
                        <a href="#" id="penulis-buku">By: Angela Gunning</a>
                        <div class="rating">
                            <i class="bi bi-star-fill" value="1"></i>
                            <i class="bi bi-star-fill" value="2"></i>
                            <i class="bi bi-star-fill" value="3"></i>
                            <i class="bi bi-star-fill" value="4"></i>
                            <i class="bi bi-star-fill" value="5"></i>
                        </div>
                    </div>
                </div>
                <div class="grid-item" data-rating="5">
                    <img src="../img/books8.png" alt="Book 1" />
                    <div class="details">
                        <div id="kategori-buku">
                            <a href="#">Adventure</a>, <a href="#">Fun</a>
                        </div>
                        <h3 id="judul-buku">Help Me Find My Stomach</h3>
                        <a href="#" id="penulis-buku">By: Angela Gunning</a>
                        <div class="rating">
                            <i class="bi bi-star-fill" value="1"></i>
                            <i class="bi bi-star-fill" value="2"></i>
                            <i class="bi bi-star-fill" value="3"></i>
                            <i class="bi bi-star-fill" value="4"></i>
                            <i class="bi bi-star-fill" value="5"></i>
                        </div>
                    </div>
                </div>
                <div class="grid-item" data-rating="5">
                    <img src="../img/books9.png" alt="Book 1" />
                    <div class="details">
                        <div id="kategori-buku">
                            <a href="#">Adventure</a>, <a href="#">Fun</a>
                        </div>
                        <h3 id="judul-buku">Help Me Find My Stomach</h3>
                        <a href="#" id="penulis-buku">By: Angela Gunning</a>
                        <div class="rating">
                            <i class="bi bi-star-fill" value="1"></i>
                            <i class="bi bi-star-fill" value="2"></i>
                            <i class="bi bi-star-fill" value="3"></i>
                            <i class="bi bi-star-fill" value="4"></i>
                            <i class="bi bi-star-fill" value="5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gambar-penulis">
            <div class="circle"></div>
            <img src="../img/foto-penulis.png" />
        </div>
    </section>
    <section class="faq">
        <div class="title-faq">
            <p>FAQ</p>
            <h1 class="judul-faq">Kami menyediakan Jawaban Atas Pertanyaan Anda</h1>
            <p class="deskripsi-faq">
                Temukan jawaban atas pertanyaan umum Anda di bagian FAQ kami.
                Informasi lengkap dan bermanfaat untuk membantu Anda lebih memahami
                layanan kami. Jelajahi sekarang untuk solusi cepat dan mudah.
            </p>
        </div>
        <div class="konten-faq">
            <div class="faq-item">
                <button class="faq-question" onclick="toggleAnswer(this)">
                    <p>Apa itu E-Litera?</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        E-Litera adalah aplikasi dan website perpustakaan digital yang
                        memberikan akses kepada penggunanya untuk menjadi pengelola dan
                        anggota perpustakaan. Bekerja sama dengan ratusan penerbit
                        ternama, E-Litera menyediakan ribuan koleksi bacaan digital berupa
                        buku, majalah, dan koran. Layanan ePerpus dapat diakses melalui
                        web browser dan smartphone berbasis iOS dan Android.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleAnswer(this)">
                    <p>Bagaimana cara meminjam bacaan di E-Litera?</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Anggota perpustakaan dapat meminjam secara online melalui website
                        atau aplikasi yang dapat diakses melalui perangkat web browser dan
                        mobile berbasis Android maupun iOS.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleAnswer(this)">
                    <p>Berapa lama anggota perpustakaan dapat meminjam bacaan?</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Durasi peminjaman dapat diatur sesuai keinginan pengguna dengan
                        maksimal peminjaman 1 minggu.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleAnswer(this)">
                    <p>Bagaimana cara mengembalikan buku?</p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Caranya sangat mudah. Anda dapat masuk ke detail bacaan pada
                        website atau aplikasi, lalu tekan "kembalikan" , lalu buku bacaan
                        di serahkan ke perpustakaan.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question" onclick="toggleAnswer(this)">
                    <p>
                        Apa yang terjadi ketika masa peminjaman berakhir namun tidak
                        sempat mengembalikan bacaan?
                    </p>
                    <i class="bi bi-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>
                        Jika mengalami keterlambatan pengembalian , pengguna akan
                        dikenakan denda saat pengembalian buku.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="link-kontak">
        <div class="konten-link-kontak">
            <div class="title-link-kontak">
                <h2>Hubungi Kami</h2>
                <p>
                    Jalin Hubungan, Bagikan Pertanyaan, dan Dapatkan Dukungan yang Anda
                    Butuhkan!
                </p>
            </div>
            <button class="btn-kontak">
                <a href="Kontak.html">Kontak Kami</a><i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="penutup">
        <div class="konten-penutup">
            <div class="books-footer">
                <div class="buku">
                    <img src="../img/books1.png" alt="Book 1" />
                    <img src="../img/books2.png" alt="Book 1" />
                    <img src="../img/books3.png" alt="Book 1" />
                    <img src="../img/books4.png" alt="Book 1" />
                </div>
                <h2>E-LITERA</h2>
                <p class="deskripsi-perpus">
                    E-Litera adalah sebuah sistem perpustakaan digital yang bisa di
                    akses kapanpun dan dimanapun
                </p>
                <p class="alamat">Jl. Raimei No 123 Kec. Klojen, Kota Malang</p>
                <p class="whatsapp">Whatsapp Contact Center : 0812-3456-7890</p>
                <p class="email">Email : e-litera@gmail.com</p>
            </div>
            <div class="layanan">
                <h2>layanan</h2>
                <a href="#">Direktori Peprustakaan</a>
            </div>
            <div class="informasi">
                <h2>Informasi</h2>
                <li>
                    <a href="Tentang.html">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak.html">Hubungi Kami</a>
                </li>
                <div class="sosmed">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><img src="../img/yt-icon.png" /></a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; E-Litera Perpustakaan Digital</p>
            <p>Perpustakaan Digital dengan berbagai ffitur</p>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            getData();
            getcategory();
            getListBook();
        });

        function getData() {
            $.ajax({
                url: 'http://127.0.0.1:8000/profile',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        var data = response.data;
                        $('#username, #username_pop').text(data.username);
                        $('#prev_profile, #prev_profile_pop').attr('src', 'data:image/png;base64,' + data.photo)
                    }
                },
            });
        }

        function getcategory() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/categoryList',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.data) {
                        var categories = response.data;
                        displayCategories(categories);
                    } else {
                        console.error('Failed to retrieve categories from the API.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error while fetching categories:', error);
                }
            });
        }

        function displayCategories(categories) {
            console.log('categories:', categories);
            var categoryList = $('#categoryList');

            // Clear existing categories
            categoryList.empty();

            // Append new categories
            if (categories && categories.length > 0) {
                categories.forEach(function(category) {
                    var listItem = $('<li><a href="category-display/' + category.name_category + '">' + category
                        .name_category + '</a></li>');
                    // var listItem = $('<li><a href="#">' + category.name_category + '</a></li>');
                    categoryList.append(listItem);
                });

                // Show the updated list
                categoryList.show();
            } else {
                console.warn('No categories found or categories array is empty.');
            }
        }

        function getListBook() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/bookCover',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.data) {
                        var books = response.data;
                        displayBooks(books);
                    } else {
                        console.error('Failed to retrieve categories from the API.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error while fetching book:', error);
                }
            })
        }


        function displayBooks(books) {
            var gridContainer = $('#grid-item');
            gridContainer.empty();

            // Memotong array buku agar hanya 4 data yang ditampilkan
            books = books.slice(0, 4);
            // Membalik urutan array sehingga data terbaru muncul pertama
            books = books.reverse();

            $.each(books, function(index, book) {
                var gridItem = $('<div class="grid-item" data-rating="' + book.rating + '"></div>');
                var img = $('<img>').attr('src', 'data:image/png;base64,' + book.gambar).attr('alt', book.judul);

                // var img = $('<img>').attr('src', '../img/' + book.gambar).attr('alt', book.judul);
                var details = $('<div class="details"></div>');

                var categories = $('<div id="kategori-buku"></div>');
                $.each(book.kategori, function(i, category) {
                    categories.append('<a href="#">' + category + '</a>, ');
                });

                var title = $('<h3 id="judul-buku"><a href="#">' + book.judul + '</a></h3>');
                var author = $('<a href="#" id="penulis-buku">By: ' + book.penulis + '</a>');

                var rating = $('<div class="rating"></div>');
                var fullStars = Math.floor(book.rating); // Bintang penuh
                var decimalPart = book.rating - fullStars; // Bagian desimal
                var halfStar = decimalPart >= 0.25 && decimalPart < 0.75; // Setengah bintang
                var fullStarAfterHalf = decimalPart >= 0.75; // Bintang penuh setelah setengah bintang

                for (var i = 1; i <= 5; i++) {
                    if (i <= fullStars) {
                        rating.append('<i class="bi bi-star-fill" value="' + i + '"></i>');
                    } else if (i === fullStars + 1 && halfStar) {
                        rating.append('<i class="bi bi-star-half" value="' + i + '"></i>');
                    } else if (i === fullStars + 1 && fullStarAfterHalf) {
                        rating.append('<i class="bi bi-star-fill" value="' + i + '"></i>');
                    } else {
                        rating.append('<i class="bi bi-star" value="' + i + '"></i>');
                    }
                }
                // var rating = $('<div class="rating"></div>');
                // for (var i = 1; i <= 5; i++) {
                //     if (i <= book.rating) {
                //         rating.append('<i class="bi bi-star-fill" value="' + i + '"></i>');
                //     } else {
                //         rating.append('<i class="bi bi-star" value="' + i + '"></i>');
                //     }
                // }

                var linkPinjam = $('<div class="link-pinjam" id="disabledLink"></div>');
                var buttonPinjam = $(
                    '<button style="cursor: pointer" onclick="openPinjam(this)"><a>Pinjam</a></button>');

                details.append(categories, title, author, rating, linkPinjam.append(buttonPinjam));
                gridItem.append(img, details);
                gridContainer.append(gridItem);
            });
        }

        // function displayBooks(books) {
        //     var gridContainer = $(
        //     '#grid-item');
        //     gridContainer.empty(); 

        //     $.each(books, function(index, book) {
        //         var gridItem = $('<div class="grid-item" data-rating="' + book.rating + '"></div>');
        //         var img = $('<img>').attr('src', 'data:image/png;base64,' + book.gambar).attr('alt', book.judul);
        //         var details = $('<div class="details"></div>');

        //         var categories = $('<div id="kategori-buku"></div>');
        //         $.each(book.categories, function(i, category) {
        //             categories.append('<a href="#">' + category.name_category + '</a>, ');
        //         });

        //         var title = $('<h3 id="judul-buku"><a href="#">' + book.judul + '</a></h3>');
        //         var author = $('<a href="#" id="penulis-buku">By: ' + book.penulis + '</a>');

        //         var rating = $('<div class="rating"></div>');
        //         for (var i = 1; i <= book.rating; i++) {
        //             rating.append('<i class="bi bi-star-fill" value="' + i + '"></i>');
        //         }

        //         var linkPinjam = $('<div class="link-pinjam" id="disabledLink"></div>');
        //         var buttonPinjam = $(
        //             '<button style="cursor: pointer" onclick="openPinjam(this)"><a>Pinjam</a></button>');

        //         details.append(categories, title, author, rating, linkPinjam.append(buttonPinjam));
        //         gridItem.append(img, details);
        //         gridContainer.append(gridItem);

        //     });
        // }



























        function toggleAnswer(question) {
            const answer = question.nextElementSibling;
            const icon = question.querySelector("i");

            // Toggle the answer visibility
            answer.style.display =
                answer.style.display === "block" ? "none" : "block";
            answer.style.maxHeight =
                answer.style.maxHeight === "200px" ? "0px" : "200px";

            // Add or remove the 'active' class
            question.classList.toggle("active");

            // Adjust the dropdown icon
            icon.classList.toggle("bi bi-chevron-up");
            icon.classList.toggle("bi bi-chevron-down");
        }

        // validasi button pinjam
        window.addEventListener("load", function() {
            closeModal();
        });

        let popup = document.getElementById("popup");

        function openModal(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            popup.classList.add("open-popup");
        }

        function closeModal() {
            popup.classList.remove("open-popup");
        }

        // validasi Pinjam
        window.addEventListener("load", function() {
            closePinjam();
        });

        let pinjam = document.getElementById("bg-peminjaman");

        function openPinjam(triggerElement) {
            // Tambahkan kelas untuk menampilkan modal
            pinjam.classList.add("open-peminjaman");
        }

        function closePinjam() {
            pinjam.classList.remove("open-peminjaman");
        }

        // button popup profile
        document
            .getElementById("btn-denda")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
        document
            .getElementById("btn-bantuan")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
        document
            .getElementById("btn-profile")
            .addEventListener("click", function() {
                var link = this.querySelector("a"); // Mengambil elemen <a> di dalam tombol
                if (link) {
                    window.location.href = link.href; // Mengarahkan ke URL yang ditentukan di dalam tag <a>
                }
            });
    </script>
</body>

</html>

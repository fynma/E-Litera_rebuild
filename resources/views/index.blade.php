<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
    <meta name="user-id" content="{{ session('user_id') }}">
    <meta name="username" content="{{ session('username') }}">
</head>

<body>
    <header>
        <a href="index"><img src="img/logo aplikasi billa 1.png" /></a>
        <div class="kotak-search">
            <input type="search" name="cari" id="cari" placeholder="Cari" />
            <i class="bi bi-search"></i>
        </div>
        <div class="fav-notif">
            <a onclick="openModal(this)" style="cursor: pointer"><i class="bi bi-heart"></i> Favorit</a>
            <div class="garis-vertikal"></div>
            <a onclick="openModal(this)" style="cursor: pointer"><i class="bi bi-bell"></i> Notifikasi</a>
        </div>
    </header>
    <div class="navbar">
        <div class="kosongan-navbar"></div>
        <ul class="navigation">
            <li>
                <a href="#" class="kategori">Kategori <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li>
                        <a href="#" id="menu">Umum <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Publikasi Umum</a></li>
                            <li><a href="#">Informasi Umum</a></li>
                            <li><a href="#">Ensiklopedia</a></li>
                            <li><a href="#">Bibliografi</a></li>
                            <li><a href="#">Majalah</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" id="menu">Filsafat dan Psikologi <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Isu kesehatan Mental</a></li>
                            <li><a href="#">Psikologi Positif</a></li>
                            <li><a href="#">Psikologi dalam Filsafat</a></li>
                            <li><a href="#">Filsafat Mindfulness</a></li>
                            <li><a href="#">Psikologi Eksperimental</a></li>
                            <li><a href="#">Filsafat Ontologi</a></li>
                            <li><a href="#">Filsafat Epistemologi</a></li>
                            <li><a href="#">Filsafat Aksiologi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" id="menu">Sosial <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Sosiologi</a></li>
                            <li><a href="#">Kesejahteraan Masyarakat</a></li>
                            <li><a href="#">Politik dan Ekonomi</a></li>
                            <li><a href="#">Budaya dan Identitas</a></li>
                            <li><a href="#">Isu Kontemporer</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Agama <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Islam</a></li>
                            <li><a href="#">Protestan dan Katolik</a></li>
                            <li><a href="#">Hindu</a></li>
                            <li><a href="#">Buddha</a></li>
                            <li><a href="#">Konghucu</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Bahasa <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Tata Bahasa</a></li>
                            <li><a href="#">Cerpen Indonesia</a></li>
                            <li><a href="#">Bahasa Indonesia</a></li>
                            <li><a href="#">Bahasa Asing</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Sains dan Matematika <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Sains</a></li>
                            <li><a href="#">Matematika Dasar</a></li>
                            <li><a href="#">Kimia</a></li>
                            <li><a href="#">Kalkulus</a></li>
                            <li><a href="#">Fisika</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Teknologi <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Inovasi</a></li>
                            <li><a href="#">Pemrograman</a></li>
                            <li><a href="#">Teknologi Medis</a></li>
                            <li><a href="#">Machine Learning</a></li>
                            <li><a href="#">Artificial Intelegent</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Seni dan Rekreasi <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Seni Lukis</a></li>
                            <li><a href="#">Seni Rupa</a></li>
                            <li><a href="#">Pariwisata</a></li>
                            <li><a href="#">Wisata Alam</a></li>
                            <li><a href="#">Seni Tari</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Literatur dan Sastra <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Novel</a></li>
                            <li><a href="#">Sastra Indonesia</a></li>
                            <li><a href="#">Cerpen</a></li>
                            <li><a href="#">Komik</a></li>
                            <li><a href="#">Sastra Dunia</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Sejarah dan Geografis <i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li>
                                <h2></h2>
                            </li>
                            <li><a href="#">Sejarah Dunia</a></li>
                            <li><a href="#">Sejarah Nasional</a></li>
                            <li><a href="#">Arkeologi</a></li>
                            <li><a href="#">Geografis</a></li>
                            <li><a href="#">Tokoh Bersejarah</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="index">Beranda</a></li>
            <li><a href="Tentang">Tentang</a></li>
            <li>
                <a onclick="openModal(this)" style="cursor: pointer">Riwayat</a>
            </li>
            <li><a href="Kontak">Kontak</a></li>
        </ul>
        <div class="masuk-daftar">
            <a href="Login">Masuk</a>
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
            <a href="Tentang" class="btn-banner">Baca Selengkapnya</a>
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
        <div class="books-grid">
            <div class="grid-item" data-rating="5">
                <img src="img/books1.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="img/books2.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="img/books3.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="img/books4.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="img/books5.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
            <div class="grid-item" data-rating="5">
                <img src="img/books6.png" alt="Book 1" />
                <div class="details">
                    <div id="kategori-buku">
                        <a href="#">Adventure</a>, <a href="#">Fun</a>
                    </div>
                    <h3 id="judul-buku">
                        <a href="Books-Page">Help Me Find My Stomach</a>
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
                        <button onclick="openModal(this)">Pinjam</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-close-popup">
                <button class="close-popup" onclick="closeModal()">X</button>
            </div>
            <div class="content-popup">
                <img src="img/alert-icon1.png" />
                <h2>Masuk ke E-Litera untuk menikmati layanan!</h2>
                <div class="link-masuk-daftar">
                    <a href="Login">Masuk</a>
                    <a href="Daftar">Daftar</a>
                </div>
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
                    <img src="img/books7.png" alt="Book 1" />
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
                    <img src="img/books8.png" alt="Book 1" />
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
                    <img src="img/books9.png" alt="Book 1" />
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
            <img src="img/foto-penulis.png" />
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
                <a href="Kontak">Kontak Kami</a><i class="bi bi-arrow-right"></i>
            </button>
        </div>
    </section>

    <section class="penutup">
        <div class="konten-penutup">
            <div class="books-footer">
                <div class="buku">
                    <img src="img/books1.png" alt="Book 1" />
                    <img src="img/books2.png" alt="Book 1" />
                    <img src="img/books3.png" alt="Book 1" />
                    <img src="img/books4.png" alt="Book 1" />
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
                    <a href="Tentang">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak">Hubungi Kami</a>
                </li>
                <div class="sosmed">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><img src="img/yt-icon.png" /></a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; E-Litera Perpustakaan Digital</p>
            <p>Perpustakaan Digital dengan berbagai ffitur</p>
        </div>
    </section>

    <script>
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
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <header>
        <a href="index.html"><img src="img/logo aplikasi billa 1.png" /></a>
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
            <li><a href="index.html">Beranda</a></li>
            <li><a href="Tentang.html">Tentang</a></li>
            <li>
                <a onclick="openModal(this)" style="cursor: pointer">Riwayat</a>
            </li>
            <li><a href="Kontak.html">Kontak</a></li>
        </ul>
        <div class="masuk-daftar">
            <a href="Login.html">Masuk</a>
        </div>
    </div>

    <section class="deskripsi-buku">
        <div class="container">
            <h2>Detail Buku</h2>
            <div class="identitas-buku">
                <img src="img/books1.png" />
                <div class="identitas">
                    <h2>Help Me Find My Stomach</h2>
                    <a href="#" id="penulis-buku">By: Angela Gunning</a>
                    <div class="rating">
                        <i class="bi bi-star-fill" value="1"></i>
                        <i class="bi bi-star-fill" value="2"></i>
                        <i class="bi bi-star-fill" value="3"></i>
                        <i class="bi bi-star-fill" value="4"></i>
                        <i class="bi bi-star-fill" value="5"></i>
                    </div>
                    <div class="pinjam-buku">
                        <button onclick="openModal(this)">Pinjam</button>
                        <i class="bi bi-heart-fill"></i>
                    </div>
                </div>
            </div>
            <div class="menu-buku">
                <ul>
                    <li>
                        <a href="#description" class="active" data-target="description">Deskripsi</a>
                    </li>
                    <li><a href="#details" data-target="details">Detail</a></li>
                    <li><a href="#comments" data-target="comments">Komentar</a></li>
                </ul>

                <div id="content-description" class="content">
                    <p id="description-text" class="">
                        Kami bertiga teman baik. Remaja, murid kelas sebelas. Penampilan
                        kami sama seperti murid pada umumnya. Kami sedang berada di masa
                        di mana kami sedang mengerjakan sebuah projek untuk tugas akhir.
                        Ini adalah kisah kami dengan lika-liku dan drama dalam mengerjakan
                        tugas akhir yang merepotkan ini.
                    </p>
                    <a href="#" id="read-more" class="read-more">Selengkapnya</a>
                </div>

                <div id="content-details" class="content">
                    <div class="nama-kolom">
                        <li>Penulis</li>
                        <li>Penerbit</li>
                        <li>Tahun Terbit</li>
                        <li>Jumlah</li>
                        <li>Kategori</li>
                    </div>
                    <div class="isi-kolom">
                        <li>Angela Gunning</li>
                        <li>Pustaka Utama</li>
                        <li>2018</li>
                        <li>6</li>
                        <li>Adventure, Fun</li>
                    </div>
                </div>

                <div id="content-comments" class="content">
                    <div class="konten-komen">
                        <div class="komentar">
                            <img src="img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                        <div class="komentar">
                            <img src="img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                        <div class="komentar">
                            <img src="img/avatar.jpg" />
                            <div class="isi-komen">
                                <h2 class="username-komen" id="username-komen">Dika</h2>
                                <p class="tanggal-komen" id="tanggal-komen">
                                    9 Januari 2020 - 20.23 WIB
                                </p>
                                <p class="isi" id="isi">
                                    Bukunya membuat saya mendapatkan banyak pengalaman
                                </p>
                                <a href="#">Balas</a>
                            </div>
                        </div>
                    </div>
                    <div class="tambah-komen">
                        <div class="inputan">
                            <img src="img/no-profil.jpeg" />
                            <input type="text" name="tambah-komen" id="tambah-komen"
                                placeholder="Masuk untuk bisa berkomentar" readonly />
                        </div>
                        <a href="#"><i class="bi bi-send"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rekomendasi">
        <div class="title">
            <div class="judul">
                <h1>Buku Serupa</h1>
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
                    <a href="Login.html">Masuk</a>
                    <a href="Daftar.html">Daftar</a>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="Tentang.html">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak.html">Hubungi Kami</a>
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
        const menuLinks = document.querySelectorAll(".menu-buku ul li a");
        const contentContainers = document.querySelectorAll(".content");

        menuLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();

                // Remove active class from all menu links
                menuLinks.forEach((link) => link.classList.remove("active"));

                // Add active class to clicked menu link
                event.target.classList.add("active");

                // Hide all content containers
                contentContainers.forEach(
                    (container) => (container.style.display = "none")
                );

                // Show content container corresponding to clicked menu link
                const targetId = event.target.getAttribute("data-target");

                if (targetId === "details") {
                    document.getElementById(`content-${targetId}`).style.display =
                        "flex";
                } else {
                    document.getElementById(`content-${targetId}`).style.display =
                        "block";
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var contentDescription = document.getElementById("content-description");
            var descriptionText = document.getElementById("description-text");
            var readMore = document.getElementById("read-more");

            readMore.addEventListener("click", function(event) {
                event.preventDefault();

                // Toggle class expand pada content-description
                contentDescription.classList.toggle("expand");

                // Toggle antara Selengkapnya dan Sembunyikan
                if (readMore.textContent === "Selengkapnya") {
                    readMore.textContent = "Sembunyikan";
                } else {
                    readMore.textContent = "Selengkapnya";
                }
            });
        });

        // title halaman
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen dengan kelas identitas dan dapatkan teks dari elemen tersebut
            const identitasTitle =
                document.querySelector(".identitas-buku h2").innerText;

            // Gabungkan teks dari identitas dengan judul awal
            const fullTitle = "E-Litera | " + identitasTitle;

            // Atur judul halaman dengan hasil gabungan
            document.title = fullTitle;
        });

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

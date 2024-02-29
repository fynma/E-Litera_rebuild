<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Kontak</title>
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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

    <section class="kontak">
        <div class="content-kontak">
            <div class="form-kontak">
                <h2>Hubungi Kami</h2>
                <form>
                    <input type="text" name="nama" id="nama" placeholder="Nama" required />
                    <input type="text" name="email" id="email" placeholder="Email" required />
                    <textarea name="pesan" id="pesan" cols="30" rows="10" placeholder="Pesan"></textarea>
                    <input type="submit" name="kirim" id="kirim" value="Kirim"
                        style="pointer-events: none" />
                </form>
            </div>
            <div id="map"></div>
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
        var map = L.map("map").setView(
            [-7.9720852125090795, 112.6222269966015],
            16
        );
        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }).addTo(map);
        var marker = L.marker([-7.9720852125090795, 112.6222269966015]).addTo(
            map
        );

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

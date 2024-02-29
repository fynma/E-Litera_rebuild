<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Tentang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../css/user.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <header>
        <a href="homepage"><img src="../img/logo aplikasi billa 1.png" /></a>
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
            <a href="Favorit"><i class="bi bi-heart"></i> Favorit</a>
            <div class="garis-vertikal"></div>
            <a href="Notifikasi"><i class="bi bi-bell"></i> Notifikasi</a>
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
            <li><a href="homepage">Beranda</a></li>
            <li><a href="Tentang">Tentang</a></li>
            <li>
                <a href="Riwayat">Riwayat</a>
            </li>
            <li><a href="Kontak">Kontak</a></li>
        </ul>
        <div class="username">
            @if (!session('photo'))
                <img src="" id="prev_profile" />
            @else
                <img id="prev_profile" alt="Nama Alt">
            @endif
            <a onclick="openModal(this)" style="cursor: pointer" id="username"></a>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="isi-popup">
            <div class="content-popup">
                <div class="username-content-popup">
                    @if (!session('photo'))
                        <img src="" id="prev_profile_pop" />
                    @else
                        <img src="data:image/png;base64,{{ session('photo') }}" alt="Nama Alt">
                    @endif
                    <div class="username-popup">
                        <p>Natalia Dita</p>
                        <button id="btn-profile">
                            <a href="Profile">Lihat Profil</a>
                        </button>
                    </div>
                </div>
                <div class="widget">
                    <button id="btn-denda">
                        <img src="../img/icon-denda.png" />
                        <a href="Denda">Denda</a>
                    </button>
                    <button id="btn-bantuan">
                        <i class="bi bi-question-circle"></i>
                        <a href="Kontak">Bantuan</a>
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

    <section class="tentang">
        <div class="content-tentang">
            <div class="main-tentang">
                <h3>Tentang</h3>
                <h1>E-Litera</h1>
                <hr />
                <p>
                    Selamat datang di Perpustakaan E-Litera - Sebuah dunia pengetahuan
                    yang tak terbatas di ujung jari Anda. Kami hadir untuk memenuhi
                    kebutuhan literasi dan memperkenalkan kemudahan akses ke dunia
                    literatur. Dengan fokus utama pada layanan peminjaman buku dan
                    kemudahan pembayaran denda secara online, E-Litera memadukan tradisi
                    perpustakaan dengan inovasi teknologi. Tim kami, yang bersemangat
                    dan berkomitmen, bertujuan untuk memberikan pengalaman yang efisien
                    dan memuaskan bagi pengguna kami. Kami percaya bahwa setiap halaman
                    yang terbuka di buku adalah pintu menuju petualangan baru, dan kami
                    berkomitmen untuk membantu Anda menemukan kunci ke dunia pengetahuan
                    melalui koleksi kami yang kaya. Selamat bergabung dengan kami dalam
                    perjalanan mencari ilmu yang tak pernah berakhir di E-Litera.
                </p>
                <a href="../Daftar">Daftar</a>
            </div>
            <img src="../img/vektor-tentang.png" />
        </div>
        <div class="content-mission">
            <img src="../img/vektor-mission.png" />
            <div class="main-mission">
                <h1>Mission</h1>
                <hr />
                <p>
                    Misi kami di E-Litera adalah merangkul dan memperkaya masyarakat
                    melalui literasi. Kami percaya bahwa akses mudah terhadap buku
                    adalah kunci untuk pengembangan pribadi dan kemajuan kolektif.
                    Dengan tekad kuat, kami berkomitmen untuk memberikan layanan
                    peminjaman buku yang efisien dan pembayaran denda yang nyaman secara
                    online, sehingga setiap individu dapat mengeksplorasi dunia
                    pengetahuan tanpa hambatan. Kami memandang literasi sebagai sarana
                    untuk membuka pintu peluang, dan itulah mengapa kami terus berusaha
                    meningkatkan dan memperluas koleksi kami. Melalui inovasi teknologi
                    dan semangat pelayanan, misi kami adalah menjadi katalisator
                    perubahan positif di komunitas, memupuk cinta akan membaca, dan
                    menginspirasi pertumbuhan intelektual. Bergabunglah dengan kami
                    dalam membangun masyarakat yang terdidik, berdaya, dan penuh
                    inspirasi di E-Litera.
                </p>
            </div>
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
                    <a href="Tentang">Tentang Kami</a>
                </li>
                <li>
                    <a href="Kontak">Hubungi Kami</a>
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

    <script>
        $(document).ready(function() {
            getData();
            getCategories();
        });

        function getData() {
            $.ajax({
                url: appUrl + "/profile",
                type: "GET",
                success: function(response) {
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

        // Fungsi untuk mengambil data kategori dari API
        function getCategories() {
            $.ajax({
                url: appUrl + "/api/categoryList",
                type: "GET",
                success: function(response) {
                    // Panggil fungsi untuk menampilkan kategori ke dalam daftar
                    displayCategories(response.data);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                },
            });
        }

        // Fungsi untuk menampilkan kategori ke dalam daftar
        function displayCategories(categories) {
            const categoryList = $("#categoryList");
            // Kosongkan daftar sebelum menambahkan kategori baru
            categoryList.empty();
            // Tambahkan setiap kategori ke dalam daftar
            categories.forEach((category) => {
                const li = $("<li>");
                const link = $("<a>")
                    .attr("href", "/categories/" + category.category_id)
                    .text(category.name_category);
                li.append(link);
                categoryList.append(li);
            });
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

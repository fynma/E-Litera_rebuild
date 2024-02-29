<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Litera | Denda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />

    <!-- css tabel -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <!-- css custom -->
    <link rel="stylesheet" href="../css/user.css" />

    <!-- js tabel -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <header>
        <a href="homepage"><img src="../img/logo aplikasi billa 1.png" /></a>
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
                <ul id="categoryList"></ul>
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
                    <img src="" id="prev_profile_pop" />
                    <div class="username-popup">
                        <p id="username_pop"></p>
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

    <form method="post" id="bayarDenda">
        @csrf
        <input type="hidden" name="user_id" id="user_id" readonly>
        <input type="hidden" name="book_id" id="book_id" readonly>
        <input type="hidden" name="keterlambatan" id="keterlambatan" readonly>
        <input type="hidden" name="tarif_denda" id="tarif_denda" readonly>
    </form>

    <div class="popupDenda" id="popupDenda">
        <div class="containerDenda">
            <div class="headerDenda">
                <img src="../img/logo aplikasi billa 1.png" />
                <i class="bi bi-x-lg" onclick="closeDetail(this)" style="cursor: pointer"></i>
            </div>
            <div class="contentDenda">
                <div class="labelDenda">
                    <label>Judu Buku</label>
                    <label>Tanggal Pinjam</label>
                    <label>Tanggal Kembali</label>
                    <label>Pengonfirmasi Peminjaman</label>
                    <label>Pengonfirmasi Pengembalian</label>
                    <label>Jumlah Pinjam</label>
                    <label>Lama Keterlambatan (hari)</label>
                    <label>Total Harga (Rp)</label>
                </div>
                <div class="titikDua">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="inputanDenda">
                    <form method="post" id="detailDenda">
                        @csrf
                        <input type="text" name="titleBook" id="titleBook" readonly>
                        <input type="text" name="tglPinjam" id="tglPinjam" readonly>
                        <input type="text" name="tglKembali" id="tglKembali" readonly>
                        <input type="text" name="petugasPinjam" id="petugasPinjam" readonly>
                        <input type="text" name="petugasKembali" id="petugasKembali" readonly>
                        <input type="text" name="jumlahPinjam" id="jumlahPinjam" readonly>
                        <input type="text" name="durasiTelat" id="durasiTelat" readonly>
                        <input type="text" name="totalHarga" id="totalHarga" readonly>
                    </form>
                </div>
            </div>
            <div class="bayarDenda">
                <button id="pay-button">Bayar</button>
            </div>  
        </div>
    </div>

    <section class="denda">
        <h1>Denda</h1>
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th style="width: 300px">Buku</th>
                    <th style="width: 120px">Tanggal Pinjam</th>
                    <th style="width: 170px">Tanggal Pengembalian</th>
                    <th style="width: 170px">Pengonfirmasi Pinjam</th>
                    <th style="width: 170px">Pengonfirmasi Kembali </th>
                    <th style="width: 170px">Jumlah Pinjam </th>
                    <th style="width: 170px">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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

    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
        // validasi Profil
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
    <script src="../js/denda.js"></script>
</body>

</html>

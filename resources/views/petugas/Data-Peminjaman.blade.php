<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="user-id" content="{{ session('user_id') }}">
    <meta name="access" content="{{ session('access') }}">
    <meta name="username" content="{{ session('username') }}">
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
    <script src="../js/route-admin.js"></script>


    <title>E-Litera | Petugas - Data Peminjaman</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Custom styles for this page -->
    <!-- <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css" />

    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link rel="icon" href="../img/logo-tanpa-tulisan.ico" type="image/x-icon" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-admin sidebar sidebar-light accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/petugas/dashboard">
                <img src="../img/logo aplikasi billa 1.png" />
            </a>

            <!-- Nav Item - Data Peminjaman Buku -->
            <li class="nav-item">
                <a class="nav-link" href="/petugas/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Data Pengguna -->
            <li class="nav-item">
                <a class="nav-link" href="Data-Pengguna">
                    <i class="bi bi-people"></i>
                    <span>Data Pengguna</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-pencil-square"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Data-Buku">Data Buku</a>
                        <a class="collapse-item" href="Kategori">Kategori</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-graph-up"></i>
                    <span>Aktivitas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Komentar">Komentar</a>
                        <a class="collapse-item" href="Aktivitas">Riwayat Aktivitas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-arrow-left-right"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="Data-Peminjaman">Peminjaman</a>
                        <a class="collapse-item" href="Pengembalian">Pengembalian</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="Denda">
                    <i class="bi bi-cash"></i>
                    <span>Denda</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="header-navbar">
                        <h2>Data Peminjaman Buku</h2>
                        <p>Data Peminjaman Buku</p>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">!</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown" id="notifAdmin">
                                <h6 class="dropdown-header">Notifikasi</h6>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="mr-3 img-profile rounded-circle" src="../img/undraw_profile.svg" />
                                <span class="d-none d-lg-inline text-gray-600 small" id="user"> (Petugas)</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" style="cursor: pointer;" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Button Print Laporan -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn-print">
                            <i class="bi bi-printer"></i>Print
                        </button>
                    </div>

                    <!-- desain popup alert -->
                    <div class="popup" id="popup">
                        <div class="isi-popup">
                            <div class="content-popup">
                                <img src="../img/alert-icon1.png" />
                                <h2>Apakah Anda yakin ingin mengkonfirmasi peminjaman?</h2>
                                <div class="button-container">
                                    <button class="batal" id="tutup-konfirmasi">Batal</button>
                                    <button class="oke">Oke</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-orange">
                                List Data Peminjaman
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post" id="updateBorrow">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                                    <input type="hidden" name="borrow_id" id="borrow-id">
                                    <input type="hidden" name="konfirmasi_pinjam" value="1">
                                    <input type="hidden" name="tgl_pinjam" id="tgl-pinjam">
                                    <input type="hidden" name="tgl_kembali" id="tgl-kembali">
                                    <input type="hidden" name="jumlah_pinjam" id="jumlah-pinjam">
                                </form>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Petugas</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/peminjaman.js"></script>
    <script>
        $(document).ready(function() {
            showNotifikasi();
        });

        function showNotifikasi() {
            $.ajax({
                url: "http://127.0.0.1:8000/api/notifadmin",
                type: "GET",
                success: function(response) {
                    console.log(response);
                    var notifs = response.data;
                    const notifContainer = $("#notifAdmin");

                    $.each(notifs, function(index, notif) {
                        // Buat struktur HTML untuk setiap komentar
                        const notifDiv = `
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">${notif.created_at}</div>
                                    ${notif.message}
                                </div>
                            </a>
                        `;

                        // Tambahkan komentar ke dalam container
                        notifContainer.append(notifDiv);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                },
            });
        }

        function logout() {
            // Ambil token CSRF dari meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Kirim permintaan logout dengan menyertakan token CSRF
            $.ajax({
                url: appUrl + '/hapussession',
                type: 'POST',
                data: {
                    _token: csrfToken // Sertakan token CSRF dalam data permintaan
                },
                success: function(response) {
                    console.log(response);
                    location.reload()
                },
                error: function(error) {
                    console.error('Logout failed:', error);
                }
            });
        }
    </script>
    <!--
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil semua button yang digunakan untuk memunculkan popup
            var buttons = document.querySelectorAll(".button-confirm");
            var popup = document.getElementById("popup");
            var tutupKonfirm = document.getElementById("tutup-konfirmasi");

            // Tambahkan event listener untuk setiap button
            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Panggil fungsi untuk menampilkan popup
                    popup.classList.add("open-popup");
                    // Panggil fungsi untuk mengkonfirmasi peminjaman hanya untuk tombol ini
                    var btnOke = popup.querySelector(".oke");
                    btnOke.addEventListener("click", function() {
                        konfirmasiPeminjaman(button);
                    });
                });
            });

            function konfirmasiPeminjaman(button) {
                button.innerText = "Dikonfirmasi";
                button.classList.remove("confirm");
                button.classList.add("terconfirm");
                button.disabled = true;

                // Tutup popup setelah dikonfirmasi
                closeKonfirmasi();
            }

            tutupKonfirm.addEventListener("click", function() {
                // Panggil fungsi untuk menampilkan popup
                popup.classList.remove("open-popup");
            });

            function closeKonfirmasi() {
                popup.classList.remove("open-popup");
            }
        });
    </script> -->
</body>

</html>

<?php

    require "../system/koneksi.php";
    require "../system/fungsi_indotgl.php";
    require "../system/fungsi_modul.php";
    require "../system/fungsi_rupiah.php";
    require "../system/fungsi_seo.php";
    require "../system/fungsi_telp.php";
    require "../system/paging.php";
    require "../system/z_setting.php";

    session_start();
    error_reporting(0);

    if ($_SESSION['_level__']==="Penulis") {
        $_SESSION['_level__'] = "Pegawai";
    }

    if (empty($_SESSION['_kode_login__'])) {
        echo "<script>window.location = 'keluar-edit';</script>";
        die();
        exit();
    }else{
        try{
            $queryLogin     = $pdo->query("SELECT kode_login FROM data_admin WHERE kode_login='$_SESSION[_kode_login__]'");
            $rowsLogin      = $queryLogin->rowCount();

            if ($rowsLogin===0 OR $rowsLogin<0){
                header("location: keluar-edit");
                die();
                exit();
            }
        }catch(Exception $e) {
            var_dump($e);
        }
    }

    if ($_SESSION['_msg__']==="Gagal") {
        $_SESSION['_alert__']   = 0;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="Berhasil") {
        $_SESSION['_alert__']   = 1;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="FromLogin") {
        $_SESSION['_alert__']   = 2;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="PasswordTidakSama") {
        $_SESSION['_alert__']   = 0;
    }elseif ($_SESSION['_msg__']==="GagalUploadFile") {
        $_SESSION['_alert__']   = 0;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="fileWajib") {
        $_SESSION['_alert__']   = 0;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="cekFile") {
        $_SESSION['_alert__']   = 0;
        $_SESSION['_msg__']     = NULL;
    }else{
        $_SESSION['_alert__']   = NULL;
        $_SESSION['_msg__']     = NULL;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Portal Admin <?= $namaweb ?> | <?= $_SESSION['_nama__'] ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/images/<?= $iconWebsite; ?>">

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Plugins -->
    <!-- Data Admin -->
    <?php if ($_GET['module']=='data-admin'): ?>
        <link rel="stylesheet" href="assets/plugins/validation-pass-arpateam/css/style.css">
    <?php endif ?>
    <!-- End Data Admin -->

    <!-- Slider View, Daftar Ketua View, Profil View, Galeri Kegiatan View, Prestasi View, Berita View, Pengumuman View, Alumni View, File Download View -->
    <?php if (($_GET['module']=='slider') AND ($_GET['act']=='view') OR ($_GET['module']=='daftar-ketua') AND ($_GET['act']=='view') OR ($_GET['module']=='profil') AND ($_GET['act']=='view') OR ($_GET['module']=='galeri-kegiatan') AND ($_GET['act']=='view') OR ($_GET['module']=='prestasi' AND $_GET['act']=='view') OR ($_GET['module']=='berita' AND $_GET['act']=='view') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='view') OR ($_GET['module']=='alumni' AND $_GET['act']=='view') OR ($_GET['module']=='file-download' AND $_GET['act']=='view') OR ($_GET['module']=='sitemap-one' AND $_GET['act']=='view')): ?>
        <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/datatables.min.css"/>
    <?php endif ?>
    <!-- END Slider View, Daftar Ketua View, Profil View, Galeri Kegiatan View, Prestasi View, Berita View, Pengumuman View, Alumni View, File Download View -->

    <!-- Sitemap One View -->
    <?php if ($_GET['module']=='sitemap-one' AND $_GET['act']=='view'): ?>
        <link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/datatables.min.css"/>
    <?php endif ?>
    <!-- END Sitemap One View -->

    <!-- Slider Add, Daftar Ketua Add, Profil Add, Galeri Kegiatan Add, Prestasi Add, Berita Add, Pengumuman Add, Alumni Add -->
    <?php if (($_GET['module']=='slider' AND $_GET['act']=='add') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add') OR ($_GET['module']=='profil' AND $_GET['act']=='add') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='add') OR ($_GET['module']=='prestasi' AND $_GET['act']=='add') OR ($_GET['module']=='berita' AND $_GET['act']=='add') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='add') OR ($_GET['module']=='alumni' AND $_GET['act']=='add')): ?>
        <link rel="stylesheet" href="assets/plugins/image-upload-arpateam/image-upload-arpateam.css"/>
        <link rel="stylesheet" href="assets/plugins/summernote-0.8.18/summernote-bs4.css"/>
    <?php endif ?>
    <!-- END Slider Add, Daftar Ketua Add, Profil Add, Galeri Kegiatan Add, Prestasi Add, Berita Add, Pengumuman Add, Alumni Add -->

    <!-- File Download Add -->
    <?php if ($_GET['module']=='file-download' AND $_GET['act']=='add'): ?>
        <link rel="stylesheet" href="assets/plugins/file-upload-arpateam/file-upload-arpateam.css"/>
    <?php endif ?>
    <!-- END File Download Add -->

    <!-- Pengaturan Edit, Slider Edit, Daftar Ketua Edit, Profil Edit, Galeri Kegiatan Edit, Prestasi Edit, Berita Edit, Pengumuman Edit, Alumni Edit -->
    <?php if (($_GET['module']=='pengaturan' AND $_GET['act']=='edit') OR ($_GET['module']=='slider' AND $_GET['act']=='edit') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit') OR ($_GET['module']=='profil' AND $_GET['act']=='edit') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='edit') OR ($_GET['module']=='prestasi' AND $_GET['act']=='edit') OR ($_GET['module']=='berita' AND $_GET['act']=='edit') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='edit') OR ($_GET['module']=='alumni' AND $_GET['act']=='edit')): ?>
        <link rel="stylesheet" href="assets/plugins/image-upload-arpateam/image-upload-arpateam.css"/>
        <link rel="stylesheet" href="assets/plugins/summernote-0.8.18/summernote-bs4.css"/>
    <?php endif ?>
    <!-- END Pengaturan Edit, Slider Edit, Daftar Ketua Edit, Profil Edit, Galeri Kegiatan Edit, Prestasi Edit, Berita Edit, Pengumuman Edit, Alumni Edit -->

    <!-- File Download Edit -->
    <?php if ($_GET['module']=='file-download' AND $_GET['act']=='edit'): ?>
        <link rel="stylesheet" href="assets/plugins/file-upload-arpateam/file-upload-arpateam.css"/>
    <?php endif ?>
    <!-- END File Download Edit -->

    <!-- Primary CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">
    <!-- Primary CSS Files -->
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                
                <a href="dashboard" class="logo">
                    <img src="../assets/images/<?= $logoVersiDesktop; ?>" alt="<?= $judulLogoVersiDesktop; ?>" class="navbar-brand" style="max-height: 100%;width: 90%;">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="../assets/images/avatar/male01.png" alt="Avatar Male 01" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="../assets/images/avatar/male01.png" alt="Avatar Male 01" class="avatar-img rounded-circle"></div>
                                            <div class="u-text">
                                                <h4><?= $_SESSION['_nama__'] ?></h4>
                                                <h5 class="text-muted"><?= $_SESSION['_level__'] ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="far fa-user-circle"></i> Profil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-primary" href="keluar">KELUAR <i class="fas fa-sign-out-alt"></i></a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <!-- End Header -->

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">

                        <li class="nav-item <?php if($_GET['module']=='dashboard'){ echo 'active'; } ?>">
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu Utama</h4>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='slider' AND $_GET['act']=='view') OR ($_GET['module']=='slider' AND $_GET['act']=='add') OR ($_GET['module']=='slider' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="slider">
                                <i class="fab fa-slideshare"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='berita' AND $_GET['act']=='view') OR ($_GET['module']=='berita' AND $_GET['act']=='add') OR ($_GET['module']=='berita' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="berita">
                                <i class="fas fa-newspaper"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='pengumuman' AND $_GET['act']=='view') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='add') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="pengumuman">
                                <i class="fas fa-bullhorn"></i>
                                <p>Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='profil' AND $_GET['act']=='view') OR ($_GET['module']=='profil' AND $_GET['act']=='add') OR ($_GET['module']=='profil' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="profil">
                                <i class="fas fa-id-card-alt"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='view') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='add') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="galeri-kegiatan">
                                <i class="fas fa-images"></i>
                                <p>Galeri Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if(($_GET['module']=='prestasi' AND $_GET['act']=='view') OR ($_GET['module']=='prestasi' AND $_GET['act']=='add') OR ($_GET['module']=='prestasi' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="prestasi">
                                <i class="fas fa-trophy"></i>
                                <p>Prestasi</p>
                            </a>
                        </li>

                        <li class="nav-item <?php if(($_GET['module']=='alumni' AND $_GET['act']=='view') OR ($_GET['module']=='alumni' AND $_GET['act']=='add') OR ($_GET['module']=='alumni' AND $_GET['act']=='edit') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='view') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-user-graduate"></i>
                                <p>Alumni</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse <?php if(($_GET['module']=='alumni' AND $_GET['act']=='view') OR ($_GET['module']=='alumni' AND $_GET['act']=='add') OR ($_GET['module']=='alumni' AND $_GET['act']=='edit') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='view') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit')){ echo 'show'; } ?>" id="base">
                                <ul class="nav nav-collapse">
                                    <li class="<?php if(($_GET['module']=='alumni' AND $_GET['act']=='view') OR ($_GET['module']=='alumni' AND $_GET['act']=='add') OR ($_GET['module']=='alumni' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                                        <a href="alumni">
                                            <span class="sub-item"><i class="fas fa-user-graduate"></i> Daftar Alumni</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(($_GET['module']=='daftar-ketua' AND $_GET['act']=='view') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                                        <a href="daftar-ketua">
                                            <span class="sub-item"><i class="fas fa-users"></i> Daftar Ketua</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item <?php if(($_GET['module']=='file-download' AND $_GET['act']=='view') OR ($_GET['module']=='file-download' AND $_GET['act']=='add') OR ($_GET['module']=='file-download' AND $_GET['act']=='edit')){ echo 'active'; } ?>">
                            <a href="file-download">
                                <i class="fas fa-file-download"></i>
                                <p>File Download KPS</p>
                            </a>
                        </li>

                        <li class="nav-section border-top">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Pengaturan Website</h4>
                        </li>

                        <li class="nav-item <?php if($_GET['module']=='halaman' AND $_GET['act']=='view' OR $_GET['module']=='halaman' AND $_GET['act']=='edit'){ echo 'active'; } ?>">
                            <a href="halaman">
                                <i class="fab fa-searchengin"></i>
                                <p>Pengaturan SEO</p>
                            </a>
                        </li>

                        <?php if ($_SESSION['_level__']==="Administrator"): ?>
                        <li class="nav-item <?php if($_GET['module']=='data-admin'){ echo 'active'; } ?>">
                            <a href="data-admin">
                                <i class="fas fa-users-cog"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='pengaturan' AND $_GET['act']=='view' OR $_GET['module']=='pengaturan' AND $_GET['act']=='edit'){ echo 'active'; } ?>">
                            <a href="pengaturan">
                                <i class="fas fa-cogs"></i>
                                <p>Pengaturan Website</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if($_GET['module']=='sitemap-one'){ echo 'active'; } ?>">
                            <a href="sitemap-one">
                                <i class="fas fa-sitemap"></i>
                                <p>Sitemap 1</p>
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <?php require 'inc/contents.php'; ?>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright ml-auto">
                        2021, di buat dengan <i class="fa fa-heart heart text-danger"></i> oleh <a href="https://www.arpateam.com">#ARPATEAM</a>
                    </div>              
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.6.0.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.13.0/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>

    <!-- Data Admin -->
    <?php if ($_GET['module']=='data-admin'): ?>
        <script src="assets/plugins/validation-pass-arpateam/js/validation.js"></script>
        <!-- Show Password -->
        <script>
            function showPassword() {
                // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                var x = document.getElementById('pass').type;

                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {

                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowPassword').innerHTML = `<i class="fas fa-eye"></i>`;
                }else{

                    //ubah form input password menjadi text
                    document.getElementById('pass').type = 'password';

                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowPassword').innerHTML = `<i class="fas fa-eye-slash"></i>`;
                }
            }
            function showUlangiPassword() {

                // membuat variabel berisi tipe input dari id='passUlangi', id='passUlangi' adalah form input password 
                var x = document.getElementById('passUlangi').type;

                //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                if (x == 'password') {

                    //ubah form input password menjadi text
                    document.getElementById('passUlangi').type = 'text';
                    
                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowUlangiPassword').innerHTML = `<i class="fas fa-eye"></i>`;
                }else{

                    //ubah form input password menjadi text
                    document.getElementById('passUlangi').type = 'password';

                    //ubah icon mata terbuka menjadi tertutup
                    document.getElementById('buttonShowUlangiPassword').innerHTML = `<i class="fas fa-eye-slash"></i>`;
                }
            }
        </script>
        <!-- Show Password -->
    <?php endif ?>
    <!-- End Data Admin -->

    <!-- Slider View, Daftar Ketua View, Profil View, Galeri Kegiatan View, Prestasi View, Berita View, Pengumuman View, Alumni View, File Download View -->
    <?php if (($_GET['module']=='slider' AND $_GET['act']=='view') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='view') OR ($_GET['module']=='profil' AND $_GET['act']=='view') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='view') OR ($_GET['module']=='prestasi' AND $_GET['act']=='view') OR ($_GET['module']=='berita' AND $_GET['act']=='view') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='view') OR ($_GET['module']=='alumni' AND $_GET['act']=='view') OR ($_GET['module']=='file-download' AND $_GET['act']=='view')): ?>
        <script type="text/javascript" src="assets/plugins/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/DataTables/Bootstrap-4-4.6.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabelData').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
            });
        </script>

        <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
        <?php if (($_GET['module']=='slider' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusSlider(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Slider ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteSlider-" + enkripsi;
                        }else{
                            swal({
                                title: "Slider tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='daftar-ketua' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusDaftarKetua(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Daftar Ketua ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteDaftarKetua-" + enkripsi;
                        }else{
                            swal({
                                title: "Daftar Ketua tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='profil' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusProfil(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Profil ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteProfil-" + enkripsi;
                        }else{
                            swal({
                                title: "Profil tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusGaleriKegiatan(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Galeri Kegiatan ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteGaleriKegiatan-" + enkripsi;
                        }else{
                            swal({
                                title: "Galeri Kegiatan tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='prestasi' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusPrestasi(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Prestasi ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeletePrestasi-" + enkripsi;
                        }else{
                            swal({
                                title: "Prestasi tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='berita' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusBerita(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Berita ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteBerita-" + enkripsi;
                        }else{
                            swal({
                                title: "Berita tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='pengumuman' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusPengumuman(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Pengumuman ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeletePengumuman-" + enkripsi;
                        }else{
                            swal({
                                title: "Pengumuman tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='alumni' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusAlumni(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus Alumni ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteAlumni-" + enkripsi;
                        }else{
                            swal({
                                title: "Alumni tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php elseif (($_GET['module']=='file-download' AND $_GET['act']=='view')): ?>
            <script>
                function confirmHapusFileDownload(enkripsi) {
                    swal({
                        title: "Apakah anda yakin ingin menghapus File Download ini?",
                        text: "Data yang telah terhapus tidak dapat dikembalikan lagi!",
                        icon: "warning",
                        primaryMode: true,
                        buttons: ["Tidak Jadi", "Ya, Hapus Saja"],
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "actionDeleteFileDownload-" + enkripsi;
                        }else{
                            swal({
                                title: "File Download tidak jadi di hapus",
                                icon: "warning",
                                primaryMode: true,
                            })
                        }
                    });
                }
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- END Slider View, Daftar Ketua View, Profil View, Galeri Kegiatan View, Prestasi View, Berita View, Pengumuman View, Alumni View, File Download View -->

    <!-- Sitemap One View -->
    <?php if ($_GET['module']=='sitemap-one' AND $_GET['act']=='view'): ?>
        <script type="text/javascript" src="assets/plugins/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/DataTables/Bootstrap-4-4.6.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabelSitemapPage').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapSlider').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapDaftarKetua').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapProfil').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapGaleriKegiatan').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapPrestasi').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapBerita').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapPengumuman').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapAlumni').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
                $('#tabelSitemapFileDownload').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });
            });
        </script>
    <?php endif ?>
    <!-- END Sitemap One View -->

    <!-- Slider Add, Daftar Ketua Add, Profil Add, Galeri Kegiatan Add, Prestasi Add, Berita Add, Pengumuman Add, Alumni Add -->
    <?php if (($_GET['module']=='slider' AND $_GET['act']=='add') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add') OR ($_GET['module']=='profil' AND $_GET['act']=='add') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='add') OR ($_GET['module']=='prestasi' AND $_GET['act']=='add') OR ($_GET['module']=='berita' AND $_GET['act']=='add') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='add') OR ($_GET['module']=='alumni' AND $_GET['act']=='add')): ?>
        <script src="assets/plugins/image-upload-arpateam/image-upload-arpateam.js"></script>
        <script src="assets/plugins/summernote-0.8.18/summernote-bs4.js"></script>

        <?php if ($_GET['module']=='daftar-ketua' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#data_diri').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis data diri ketua disini',
                        tabsize: 1,
                        height: 150,
                    });

                    $('#kegiatan').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis kegiatan ketua disini',
                        tabsize: 1,
                        height: 150,
                    });
                });
            </script>
        <?php elseif ($_GET['module']=='profil' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi profil di sini',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiProfil',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis keterangan galeri kegiatan disini...',
                        tabsize: 2,
                        height: 200,
                    });
                });
            </script>
        <?php elseif ($_GET['module']=='prestasi' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi prestasi disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPrestasi',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='berita' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis isi berita disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiBerita',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='pengumuman' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis isi pengumuman disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPengumuman',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='alumni' AND $_GET['act']=='add'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi alumni disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiAlumni',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- End Slider Add, Daftar Ketua Add, Profil Add, Galeri Kegiatan Add, Prestasi Add, Berita Add, Pengumuman Add, Alumni Add -->

    <!-- File Download Add -->
    <?php if ($_GET['module']=='file-download' AND $_GET['act']=='add'): ?>
        <script src="assets/plugins/file-upload-arpateam/file-upload-arpateam.js"></script>
    <?php endif ?>
    <!-- End File Download Add -->

    <!-- Pengaturan Edit, Slider Edit, Daftar Ketua Edit, Profil Edit, Galeri Kegiatan Edit, Prestasi Edit, Berita Edit, Pengumuman Edit, Alumni Edit -->
    <?php if (($_GET['module']=='pengaturan' AND $_GET['act']=='edit') OR ($_GET['module']=='slider' AND $_GET['act']=='edit') OR ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit') OR ($_GET['module']=='profil' AND $_GET['act']=='edit') OR ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='edit') OR ($_GET['module']=='prestasi' AND $_GET['act']=='edit') OR ($_GET['module']=='berita' AND $_GET['act']=='edit') OR ($_GET['module']=='pengumuman' AND $_GET['act']=='edit') OR ($_GET['module']=='alumni' AND $_GET['act']=='edit')): ?>
        <script src="assets/plugins/image-upload-arpateam/image-upload-arpateam-edit.js"></script>
        <script src="assets/plugins/summernote-0.8.18/summernote-bs4.js"></script>

        <?php if ($_GET['module']=='daftar-ketua' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#data_diri').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis data diri ketua disini',
                        tabsize: 1,
                        height: 150,
                    });

                    $('#kegiatan').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis kegiatan ketua disini',
                        tabsize: 1,
                        height: 150,
                    });
                });
            </script>
        <?php elseif ($_GET['module']=='profil' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi profil di sini',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiProfil',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='galeri-kegiatan' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis keterangan galeri kegiatan disini...',
                        tabsize: 2,
                        height: 200,
                    });
                });
            </script>
        <?php elseif ($_GET['module']=='prestasi' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi prestasi disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPrestasi',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='berita' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis isi berita disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiBerita',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='pengumuman' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis isi pengumuman disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiPengumuman',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php elseif ($_GET['module']=='alumni' AND $_GET['act']=='edit'): ?>
            <script type="text/javascript">
                $(document).ready(function(){

                    $('#deskripsi').summernote({
                        callbacks: {
                            onImageUpload: function(files) {
                                for(let i=0; i < files.length; i++) {
                                    $.upload(files[i]);
                                }
                            }
                        },
                        placeholder: 'Tulis deskripsi alumni disini...',
                        tabsize: 2,
                        height: 200,
                    });

                    $.upload = function (file) {
                        let out = new FormData();
                        out.append('file', file, file.name);

                        $.ajax({
                            method: 'POST',
                            url: 'actionUploadImgDeskripsiAlumni',
                            contentType: false,
                            cache: false,
                            processData: false,
                            data: out,
                            success: function (img) {
                                $('#deskripsi').summernote('insertImage', img);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error(textStatus + " " + errorThrown);
                            }
                        });
                    };

                });
            </script>
        <?php endif ?>
    <?php endif ?>
    <!-- End Pengaturan Edit, Slider Edit, Daftar Ketua Edit, Profil Edit, Galeri Kegiatan Edit, Prestasi Edit, Berita Edit, Pengumuman Edit, Alumni Edit -->

    <!-- File Download Edit -->
    <?php if ($_GET['module']=='file-download' AND $_GET['act']=='edit'): ?>
        <script src="assets/plugins/file-upload-arpateam/file-upload-arpateam-edit.js"></script>
    <?php endif ?>
    <!-- End File Download Edit -->

    <!-- Notifikasi -->
    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <?php if ($_SESSION['_alert__']!==NULL): ?>
        <script>
            var placementFrom = "top";
            var placementAlign = "center";
        </script>

        <?php if ($_SESSION['_alert__']===0): ?>
            <script>
                var state = "danger";
                var style = "withicon";
                var content = {};
                content.message = 'Sistem kami tidak bisa menyimpan data perubahan anda';
                content.title = 'GAGAL!!!';
                content.icon = 'fas fa-exclamation-circle';
            </script>
        <?php elseif ($_SESSION['_alert__']===1): ?>
            <script>
                var state = "success";
                var style = "withicon";
                var content = {};
                content.message = 'Perubahan berhasil di simpan';
                content.title = 'BERHASIL!!!';
                content.icon = 'fas fa-check-circle';
            </script>
        <?php elseif ($_SESSION['_alert__']===2): ?>
            <script>
                var state = "success";
                var style = "withicon";
                var content = {};
                content.message = 'Selamat Datang di Portal Admin <?= $namaweb ?>';
                content.title = 'BERHASIL LOGIN!';
                content.icon = 'fas fa-bell';
            </script>
        <?php endif ?>

        <script>
            $.notify(content,{
                type: state,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                time: 1000,
                delay: 0,
            });
        </script>
    <?php endif ?>
    <!-- End Notifikasi -->

    <!-- All -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!-- End All -->

</body>
</html>
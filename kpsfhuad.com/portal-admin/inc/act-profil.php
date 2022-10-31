<?php

session_start();
error_reporting(0);

if (empty($_SESSION['_kode_login__'])) {
    header("location: keluar-edit");
    die();
    exit();
}elseif(isset($_POST['_submit_special_KPSFHUAD_']) OR $_GET['act']=='03'){
    require '../../system/koneksi.php';
    require '../../system/others.php';
    require '../../system/fungsi_modul.php';
    require '../../system/fungsi_sitemap.php';
    require "../../system/fungsi_upload_gambar.php";
    require "../../system/z_setting.php";

    // Data file
    $link                   = "profil";
    $penyimpananGambar        = "../../assets/images/konten-profil";
    $database               = "konten_profil";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $urutan     = htmlspecialchars($_POST['___in_urutan_special_KPSFHUAD']);
        $judul      = htmlspecialchars($_POST['___in_judul_special_KPSFHUAD']);
        $status     = $_POST['___in_status_special_KPSFHUAD'];
        $deskripsi  = $_POST['___in_deskripsi_special_KPSFHUAD'];

        $title          = $judul." ".$namaweb;
        $keyword        = $link2." - Tentang ".$judul." ".$namaweb." | ".substr(preg_replace('/<[^<]+?>/', ' ', $deskripsi), 0,300);
        $description    = $link3." - Tentang ".$judul." ".$namaweb." | ".substr(preg_replace('/<[^<]+?>/', ' ', $deskripsi), 0,150);
        $seo            = seo($judul." ".$namaweb);

        // Gambar
            $lokasi_file        = $_FILES['___in_gambar_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload      = "$penyimpananGambar/";
            $judul_file         = $_FILES['___in_gambar_special_KPSFHUAD']['name'];
            $tipe_file          = strtolower($_FILES['___in_gambar_special_KPSFHUAD']['type']);
            $tipe_file2         = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran             = $_FILES['___in_gambar_special_KPSFHUAD']['size'];
            $judul_file_unik    = $seo."-".rand(10,99).".".$tipe_file2;

            // Cek jenis file yang di upload
            cekFile($tipe_file);
            // Cek jenis file yang di upload

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $gambar     = $judul_file_unik;
        // End Gambar

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 4;
            $loc_1              = $link1."/profil/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
        $id_sitemap_1 = $insertId;
        if ($count>0) {
            try{
                $stmt = $pdo->prepare("INSERT INTO $database
                                (urutan,judul,status,deskripsi,gambar,title,keyword,description,seo,tgl_update,id_sitemap_1)
                                VALUES(:urutan,:judul,:status,:deskripsi,:gambar,:title,:keyword,:description,:seo,NOW(),:id_sitemap_1)" );
                        
                $stmt->bindParam(":urutan", $urutan, PDO::PARAM_STR);
                $stmt->bindParam(":judul", $judul, PDO::PARAM_STR);
                $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                $stmt->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
                $stmt->bindParam(":gambar", $gambar, PDO::PARAM_STR);
                $stmt->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":seo", $seo, PDO::PARAM_STR);
                $stmt->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_STR);
                    
                $count = $stmt->execute();

                // Upload Gambar
                uploadGambarSlider($judul_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload Gambar
                        
                $insertId = $pdo->lastInsertId();

                if ($count>0) {
                    $_SESSION['_msg__'] = 'Berhasil';
                    header("Location: $link");
                    die();
                    exit();
                }     
            }catch(PDOException $e){
                hapusSitemap_1($database_1, $id_sitemap_1, $link);
                if ($count>0) {
                    $_SESSION['_msg__'] = 'Gagal';
                    echo "<script>window.location(history.back(0))</script>";
                    die();
                    exit();
                }
            }
        }
    }
    // Tambah data

    // Edit data
    elseif ($_GET['act']==="02") {
        $id_sitemap_1       = htmlspecialchars($_POST['___in_id_sitemap_1_special_KPSFHUAD']);
        $id_konten_profil   = htmlspecialchars($_POST['___in_id_konten_profil_special_KPSFHUAD']);
        $urutan             = htmlspecialchars($_POST['___in_urutan_special_KPSFHUAD']);
        $judul              = htmlspecialchars($_POST['___in_judul_special_KPSFHUAD']);
        $status             = $_POST['___in_status_special_KPSFHUAD'];
        $deskripsi          = $_POST['___in_deskripsi_special_KPSFHUAD'];

        $title              = $judul." ".$namaweb;
        $keyword            = $link2." - Tentang ".$judul." ".$namaweb." | ".substr(preg_replace('/<[^<]+?>/', ' ', $deskripsi), 0,300);
        $description        = $link3." - Tentang ".$judul." ".$namaweb." | ".substr(preg_replace('/<[^<]+?>/', ' ', $deskripsi), 0,150);
        $seo                = seo($judul." ".$namaweb);

        // Gambar
            $lokasi_file        = $_FILES['___in_gambar_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload      = "$penyimpananGambar/";
            $judul_file         = $_FILES['___in_gambar_special_KPSFHUAD']['name'];
            $tipe_file          = strtolower($_FILES['___in_gambar_special_KPSFHUAD']['type']);
            $tipe_file2         = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran             = $_FILES['___in_gambar_special_KPSFHUAD']['size'];
            $judul_file_unik    = $seo."-".rand(10,99).".".$tipe_file2;

            $in_gambar_lama     = $_POST['___in_gambar_lama_special_KPSFHUAD'];
            $cariExtensiGambar  = explode(".", $in_gambar_lama);
            $extensiGambarnya   = $cariExtensiGambar[1];

            if (empty($judul_file)){
                // Ubah judul gambar
                rename("$penyimpananGambar/$in_gambar_lama", "$penyimpananGambar/$judul_file_unik$extensiGambarnya");
                // Ubah judul gambar

                $gambar = $judul_file_unik.$extensiGambarnya;
            }else{
                // Cek jenis file yang di upload
                cekFile($tipe_file);
                // Cek jenis file yang di upload

                // Cek ukuran file yang di upload
                cekUkuranFile2mb($ukuran);
                // Cek ukuran file yang di upload

                // Hapus gambar
                unlink("$penyimpananGambar/$in_gambar_lama");
                // Hapus gambar

                // Upload Gambar
                uploadGambarSlider($judul_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload Gambar

                $gambar = $judul_file_unik;
            }
        // End Gambar

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 4;
            $loc_1              = $link1."/profil/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        try {
            $sql = "UPDATE $database
                    SET urutan      = :urutan,
                        judul       = :judul,
                        status      = :status,
                        deskripsi   = :deskripsi,
                        gambar      = :gambar,
                        title       = :title,
                        keyword     = :keyword,
                        description = :description,
                        seo         = :seo,
                        tgl_update  = NOW()
                    WHERE id_$database  = :id_konten_profil
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_konten_profil", $id_konten_profil, PDO::PARAM_INT);
            $statement->bindParam(":urutan", $urutan, PDO::PARAM_STR);
            $statement->bindParam(":judul", $judul, PDO::PARAM_STR);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);
            $statement->bindParam(":deskripsi", $deskripsi, PDO::PARAM_STR);
            $statement->bindParam(":gambar", $gambar, PDO::PARAM_STR);
            $statement->bindParam(":title", $title, PDO::PARAM_STR);
            $statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $statement->bindParam(":description", $description, PDO::PARAM_STR);
            $statement->bindParam(":seo", $seo, PDO::PARAM_STR);

            $count = $statement->execute();

            editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_konten_profil'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_konten_profil'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        $Data           = $pdo->query("SELECT gambar, id_sitemap_1 FROM $database WHERE id_$database='$_GET[id]'");
        $resultData     = $Data->fetch(PDO::FETCH_ASSOC);
        $gambarHapus      = $resultData["gambar"];

        // SiteMap 1
            $database_1     = "sitemap_1";
            $id_sitemap_1   = $resultData['id_sitemap_1'];
        // SiteMap 1

        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            // Hapus gambar
            unlink("$penyimpananGambar/$gambarHapus");
            // Hapus gambar

            hapusSitemap_1($database_1, $id_sitemap_1, $link);
            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                header("Location: $link");
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Hapus data

}else{
    header("location: keluar-edit");
    die();
    exit();
}
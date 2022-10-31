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
    $link                   = "file-download";
    $penyimpananFile        = "../../assets/images/file-download";
    $database               = "file_download";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $in_nama_file   = htmlspecialchars($_POST['___in_nama_file_special_KPSFHUAD']);
        $status         = htmlspecialchars($_POST['___in_status_special_KPSFHUAD']);

        // File
            $lokasi_file    = $_FILES['___in_file_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload  = "$penyimpananFile/";
            $nama_file      = $_FILES['___in_file_special_KPSFHUAD']['name'];
            $tipe_file      = strtolower($_FILES['___in_file_special_KPSFHUAD']['type']);
            $tipe_file2     = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $tipe_file3     = explode(".", strtolower($nama_file));
            $ukuran         = $_FILES['___in_file_special_KPSFHUAD']['size'];
            $nama_file_unik = seo("File Download ".$namaweb." ".$in_nama_file)."-".rand(10,99).".".$tipe_file3[count($tipe_file3)-1];

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $file           = $nama_file_unik;
        // End File

        // SiteMap 1
            $database_1     = "sitemap_1";
            $id_sub_sitemap = 8;
            $loc_1          = $link1."/assets/images/file-download/".$file;
            $priority_1     = "0.80";
        // SiteMap 1

        tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
        $id_sitemap_1 = $insertId;
        if ($count>0) {
            try{
                $stmt = $pdo->prepare("INSERT INTO $database
                                (nama_file,file,status,tgl_update,id_sitemap_1)
                                VALUES(:nama_file,:file,:status,NOW(),:id_sitemap_1)" );
                        
                $stmt->bindParam(":nama_file", $in_nama_file, PDO::PARAM_STR);
                $stmt->bindParam(":file", $file, PDO::PARAM_STR);
                $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                $stmt->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_STR);
                    
                $count = $stmt->execute();

                // Upload file
                uploadGambarSlider($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload file
                        
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
        $id_file_download   = htmlspecialchars($_POST['___in_id_file_download_special_KPSFHUAD']);
        $in_nama_file       = htmlspecialchars($_POST['___in_nama_file_special_KPSFHUAD']);
        $status             = htmlspecialchars($_POST['___in_status_special_KPSFHUAD']);

        // File
            $lokasi_file    = $_FILES['___in_file_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload  = "$penyimpananFile/";
            $nama_file      = $_FILES['___in_file_special_KPSFHUAD']['name'];
            $tipe_file      = strtolower($_FILES['___in_file_special_KPSFHUAD']['type']);
            $tipe_file2     = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $tipe_file3     = explode(".", strtolower($nama_file));
            $ukuran         = $_FILES['___in_file_special_KPSFHUAD']['size'];
            $nama_file_unik = seo("File Download ".$namaweb." ".$in_nama_file)."-".rand(10,99).".".$tipe_file3[count($tipe_file3)-1];

            $in_file_lama     = $_POST['___in_file_lama_special_KPSFHUAD'];
            $cariExtensiFile  = explode(".", $in_file_lama);
            $extensiFilenya   = $cariExtensiFile[1];

            if (empty($nama_file)){
                // Ubah nama File
                rename("$penyimpananFile/$in_file_lama", "$penyimpananFile/$nama_file_unik$extensiFilenya");
                // Ubah nama File

                $file = $nama_file_unik.$extensiFilenya;
            }else{
                // Cek ukuran file yang di upload
                cekUkuranFile2mb($ukuran);
                // Cek ukuran file yang di upload

                // Hapus file
                unlink("$penyimpananFile/$in_file_lama");
                // Hapus file
                // Upload File
                uploadGambarSlider($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload);
                // Upload File

                $file = $nama_file_unik;
            }
        // File

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 8;
            $loc_1              = $link1."/assets/images/file-download/".$file;
            $priority_1         = "0.80";
        // SiteMap 1

        try {
            $sql = "UPDATE $database
                    SET nama_file       = :nama_file,
                        status          = :status,
                        file            = :file,
                        tgl_update      = NOW()
                    WHERE id_$database  = :id_file_download
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_file_download", $id_file_download, PDO::PARAM_INT);
            $statement->bindParam(":nama_file", $in_nama_file, PDO::PARAM_STR);
            $statement->bindParam(":status", $status, PDO::PARAM_STR);
            $statement->bindParam(":file", $file, PDO::PARAM_STR);

            $count = $statement->execute();

            editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_file_download'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_file_download'</script>";
            die();
            exit();
        }
    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        $Data           = $pdo->query("SELECT file, id_sitemap_1 FROM $database WHERE id_$database='$_GET[id]'");
        $resultData     = $Data->fetch(PDO::FETCH_ASSOC);
        $fileHapus    = $resultData["file"];

        // SiteMap 1
            $database_1     = "sitemap_1";
            $id_sitemap_1   = $resultData['id_sitemap_1'];
        // SiteMap 1

        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            // Hapus file
            unlink("$penyimpananFile/$fileHapus");
            // Hapus file

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
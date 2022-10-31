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
    $link                   = "daftar-ketua";
    $penyimpananFoto        = "../../assets/images/daftar-ketua";
    $penyimpananFotoSmall   = "../../assets/images/daftar-ketua/small";
    $database               = "daftar_ketua";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $nama       = htmlspecialchars($_POST['___in_nama_special_KPSFHUAD']);
        $periode    = substr($_POST['___in_periode_1_special_KPSFHUAD'], 0, 4)." - ".substr($_POST['___in_periode_2_special_KPSFHUAD'], 0, 4);
        $data_diri  = $_POST['___in_data_diri_special_KPSFHUAD'];
        $kegiatan   = $_POST['___in_kegiatan_special_KPSFHUAD'];

        $title          = $nama." Ketua ".$namaweb." Periode ".$periode;
        $keyword        = "Ketua ".$namaweb." Pada Periode ".$periode." Adalah ".$nama;
        $description    = $nama." Adalah Ketua ".$namaweb." Pada Periode ".$periode;
        $seo            = seo($nama)."-adalah-ketua-".seo($namaweb)."-pada-periode-".seo($periode);

        // Foto
            $lokasi_file        = $_FILES['___in_foto_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload      = "$penyimpananFoto/";
            $lokasi_upload_small= "$penyimpananFotoSmall/";
            $nama_file          = $_FILES['___in_foto_special_KPSFHUAD']['name'];
            $tipe_file          = strtolower($_FILES['___in_foto_special_KPSFHUAD']['type']);
            $tipe_file2         = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran             = $_FILES['___in_foto_special_KPSFHUAD']['size'];
            $nama_file_unik     = $seo."-".rand(10,99).".".$tipe_file2;

            // Cek jenis file yang di upload
            cekFile($tipe_file);
            // Cek jenis file yang di upload

            // Cek ukuran file yang di upload
            cekUkuranFile2mb($ukuran);
            // Cek ukuran file yang di upload

            $foto     = $nama_file_unik;
        // End Foto

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 3;
            $loc_1              = $link1."/daftar-ketua/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        tambahSitemap_1($database_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
        $id_sitemap_1 = $insertId;
        if ($count>0) {
            try{
                $stmt = $pdo->prepare("INSERT INTO $database
                                (nama,periode,data_diri,kegiatan,foto,title,keyword,description,seo,tgl_update,id_sitemap_1)
                                VALUES(:nama,:periode,:data_diri,:kegiatan,:foto,:title,:keyword,:description,:seo,NOW(),:id_sitemap_1)" );
                        
                $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
                $stmt->bindParam(":periode", $periode, PDO::PARAM_STR);
                $stmt->bindParam(":data_diri", $data_diri, PDO::PARAM_STR);
                $stmt->bindParam(":kegiatan", $kegiatan, PDO::PARAM_STR);
                $stmt->bindParam(":foto", $foto, PDO::PARAM_STR);
                $stmt->bindParam(":title", $title, PDO::PARAM_STR);
                $stmt->bindParam(":keyword", $keyword, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":seo", $seo, PDO::PARAM_STR);
                $stmt->bindParam(":id_sitemap_1", $id_sitemap_1, PDO::PARAM_STR);
                    
                $count = $stmt->execute();

                // Upload Foto
                uploadFotoWithSmall($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload, $lokasi_upload_small);
                // Upload Foto
                        
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
        $id_sitemap_1   = htmlspecialchars($_POST['___in_id_sitemap_1_special_KPSFHUAD']);
        $id_daftar_ketua= htmlspecialchars($_POST['___in_id_daftar_ketua_special_KPSFHUAD']);
        $nama           = htmlspecialchars($_POST['___in_nama_special_KPSFHUAD']);
        $periode        = substr($_POST['___in_periode_1_special_KPSFHUAD'], 0, 4)." - ".substr($_POST['___in_periode_2_special_KPSFHUAD'], 0, 4);
        $data_diri      = $_POST['___in_data_diri_special_KPSFHUAD'];
        $kegiatan       = $_POST['___in_kegiatan_special_KPSFHUAD'];

        $title          = $nama." Ketua ".$namaweb." Periode ".$periode;
        $keyword        = "Ketua ".$namaweb." Pada Periode ".$periode." Adalah ".$nama;
        $description    = $nama." Adalah Ketua ".$namaweb." Pada Periode ".$periode;
        $seo            = seo($nama)."-adalah-ketua-".seo($namaweb)."-pada-periode-".seo($periode);

        // Foto
            $lokasi_file            = $_FILES['___in_foto_special_KPSFHUAD']['tmp_name'];
            $lokasi_upload          = "$penyimpananFoto/";
            $lokasi_upload_small    = "$penyimpananFotoSmall/";
            $nama_file              = $_FILES['___in_foto_special_KPSFHUAD']['name'];
            $tipe_file              = strtolower($_FILES['___in_foto_special_KPSFHUAD']['type']);
            $tipe_file2             = seo2($tipe_file); // ngedapetin png / jpg / jpeg
            $ukuran                 = $_FILES['___in_foto_special_KPSFHUAD']['size'];
            $nama_file_unik         = $seo.".".$tipe_file2;

            $in_foto_lama     = $_POST['___in_foto_lama_special_KPSFHUAD'];
            $cariExtensiGambar  = explode(".", $in_foto_lama);
            $extensiGambarnya   = $cariExtensiGambar[1];

            if (empty($nama_file)){
                // Ubah nama foto
                rename("$penyimpananFoto/$in_foto_lama", "$penyimpananFoto/$nama_file_unik$extensiGambarnya");
                rename("$penyimpananFotoSmall/$in_foto_lama", "$penyimpananFotoSmall/$nama_file_unik$extensiGambarnya");
                // Ubah nama foto

                $foto = $nama_file_unik.$extensiGambarnya;
            }else{
                // Cek jenis file yang di upload
                cekFile($tipe_file);
                // Cek jenis file yang di upload

                // Cek ukuran file yang di upload
                cekUkuranFile2mb($ukuran);
                // Cek ukuran file yang di upload

                // Hapus foto
                unlink("$penyimpananFoto/$in_foto_lama");
                unlink("$penyimpananFotoSmall/$in_foto_lama");
                // Hapus foto

                // Upload Foto
                uploadFotoWithSmall($nama_file_unik, $tipe_file, $lokasi_file, $lokasi_upload, $lokasi_upload_small);
                // Upload Foto

                $foto = $nama_file_unik;
            }
        // End Foto

        // SiteMap 1
            $database_1         = "sitemap_1";
            $id_sub_sitemap     = 3;
            $loc_1              = $link1."/daftar-ketua/".$seo.".html";
            $priority_1         = "0.80";
        // SiteMap 1

        try {
            $sql = "UPDATE $database
                    SET nama        = :nama,
                        periode     = :periode,
                        data_diri   = :data_diri,
                        kegiatan    = :kegiatan,
                        foto        = :foto,
                        title       = :title,
                        keyword     = :keyword,
                        description = :description,
                        seo         = :seo,
                        tgl_update  = NOW()
                    WHERE id_$database  = :id_daftar_ketua
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_daftar_ketua", $id_daftar_ketua, PDO::PARAM_INT);
            $statement->bindParam(":nama", $nama, PDO::PARAM_STR);
            $statement->bindParam(":periode", $periode, PDO::PARAM_STR);
            $statement->bindParam(":data_diri", $data_diri, PDO::PARAM_STR);
            $statement->bindParam(":kegiatan", $kegiatan, PDO::PARAM_STR);
            $statement->bindParam(":foto", $foto, PDO::PARAM_STR);
            $statement->bindParam(":title", $title, PDO::PARAM_STR);
            $statement->bindParam(":keyword", $keyword, PDO::PARAM_STR);
            $statement->bindParam(":description", $description, PDO::PARAM_STR);
            $statement->bindParam(":seo", $seo, PDO::PARAM_STR);

            $count = $statement->execute();

            editSitemap_1($database_1, $id_sitemap_1, $id_sub_sitemap, $loc_1, $priority_1, $link);
            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_daftar_ketua'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_daftar_ketua'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        $Data           = $pdo->query("SELECT foto, id_sitemap_1 FROM $database WHERE id_$database='$_GET[id]'");
        $resultData     = $Data->fetch(PDO::FETCH_ASSOC);
        $fotoHapus      = $resultData["foto"];

        // SiteMap 1
            $database_1     = "sitemap_1";
            $id_sitemap_1   = $resultData['id_sitemap_1'];
        // SiteMap 1

        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            // Hapus foto
            unlink("$penyimpananFoto/$fotoHapus");
            unlink("$penyimpananFotoSmall/$fotoHapus");
            // Hapus foto

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
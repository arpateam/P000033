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
    $link                   = "alumni";
    $penyimpananGambar      = "../../assets/images/alumni";
    $penyimpananGambarSmall = "../../assets/images/alumni/small";
    $database               = "alumni";
    $act                    = $_GET["act"];
    // Data file

    // Tambah data
    if ($_GET['act']==="01") {
        $nama       = htmlspecialchars($_POST['___in_nama_special_KPSFHUAD']);
        $angkatan   = htmlspecialchars($_POST['___in_angkatan_special_KPSFHUAD']);
        $alamat     = htmlspecialchars($_POST['___in_alamat_special_KPSFHUAD']);
        $pekerjaan  = htmlspecialchars($_POST['___in_pekerjaan_special_KPSFHUAD']);

        try{
            $stmt = $pdo->prepare("INSERT INTO $database
                            (nama,angkatan,alamat,pekerjaan,tgl_update)
                            VALUES(:nama,:angkatan,:alamat,:pekerjaan,NOW())" );
                    
            $stmt->bindParam(":nama", $nama, PDO::PARAM_STR);
            $stmt->bindParam(":angkatan", $angkatan, PDO::PARAM_STR);
            $stmt->bindParam(":alamat", $alamat, PDO::PARAM_STR);
            $stmt->bindParam(":pekerjaan", $pekerjaan, PDO::PARAM_STR);
                
            $count = $stmt->execute();
                    
            $insertId = $pdo->lastInsertId();

            if ($count>0) {
                $_SESSION['_msg__'] = 'Berhasil';
                header("Location: $link");
                die();
                exit();
            }     
        }catch(PDOException $e){
            var_dump($e);
            exit();
            $_SESSION['_msg__'] = 'Gagal';
            echo "<script>window.location(history.back(0))</script>";
            die();
            exit();
        }
    }
    // Tambah data

    // Edit data
    elseif ($_GET['act']==="02") {
        $id_alumni  = htmlspecialchars($_POST['___in_id_alumni_special_KPSFHUAD']);
        $nama       = htmlspecialchars($_POST['___in_nama_special_KPSFHUAD']);
        $angkatan   = htmlspecialchars($_POST['___in_angkatan_special_KPSFHUAD']);
        $alamat     = htmlspecialchars($_POST['___in_alamat_special_KPSFHUAD']);
        $pekerjaan  = htmlspecialchars($_POST['___in_pekerjaan_special_KPSFHUAD']);

        try {
            $sql = "UPDATE $database
                    SET nama        = :nama,
                        angkatan    = :angkatan,
                        alamat      = :alamat,
                        pekerjaan   = :pekerjaan,
                        tgl_update  = NOW()
                    WHERE id_$database  = :id_alumni
                ";
                          
            $statement = $pdo->prepare($sql);

            $statement->bindParam(":id_alumni", $id_alumni, PDO::PARAM_INT);
            $statement->bindParam(":nama", $nama, PDO::PARAM_STR);
            $statement->bindParam(":angkatan", $angkatan, PDO::PARAM_STR);
            $statement->bindParam(":alamat", $alamat, PDO::PARAM_STR);
            $statement->bindParam(":pekerjaan", $pekerjaan, PDO::PARAM_STR);

            $count = $statement->execute();

            if ($count>0) {
                $_SESSION['_msg__']  = "Berhasil";
                echo "<script>window.location = 'ubah-$link-$id_alumni'</script>";
                die();
                exit();
            }
        }catch(PDOException $e){
            $_SESSION['_msg__']  = "Gagal";
            echo "<script>window.location = 'ubah-$link-$id_alumni'</script>";
            die();
            exit();
        }

    }
    // Edit data

    // Hapus data
    elseif ($_GET['act']=='03'){
        try{
            $del = $pdo->query("DELETE FROM $database WHERE id_$database='$_GET[id]'");
            $del->execute();

            if ($del>0) {
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
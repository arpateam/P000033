<?php

    $Detail = $pdo->query("SELECT judul, deskripsi, gambar, tgl_update FROM konten_profil WHERE seo='$_GET[judul_seo]'");
    $resultDetail = $Detail->fetch(PDO::FETCH_ASSOC);

    if ($resultDetail == FALSE) {
        echo "<script>window.location = '../404'</script>";
        exit();
        die();
    }

?>

<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1 class="text-uppercase">HALAMAN <?= $resultDetail['judul'] ?></h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3 class="text-uppercase">HALAMAN <?= $resultDetail['judul'] ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="container z-index mt--4">
    <div class="row justify-content-center">
        <div class="col-11 col-lg-9 col-xl-8 bg-success shadow rounded text-center py-3">
            <span class="d-none d-lg-block">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="../profil/" title="" class="nav-link-danger">Profil</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active"><?= $resultDetail['judul'] ?></a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="../profil/" title="" class="nav-link-danger">Profil</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active"><?= $resultDetail['judul'] ?></a>
            </small>
        </div>
    </div>
</div>

<div class="container-fluid my-3 my-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?= $resultDetail['deskripsi'] ?>
                        <h6 class="mt-4 text-danger"><em><i class="fas fa-calendar-alt"></i> <?= tgl2(date($resultDetail['tgl_update'])) ?></em></h6>
                    </div>
                </div>
            </div>
            <?php require 'sidebar.php'; ?>
        </div>
    </div>
</div>
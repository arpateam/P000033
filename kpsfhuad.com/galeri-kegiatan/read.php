<?php

    $Detail = $pdo->query("SELECT judul, keterangan, foto, link_youtube, tgl_update FROM galeri_kegiatan WHERE seo='$_GET[judul_seo]'");
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
                <h1 class="text-uppercase"><?= $resultDetail['judul'] ?></h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3 class="text-uppercase"><?= $resultDetail['judul'] ?></h3>
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
                <a href="../galeri-kegiatan/semua-kegiatan.html" title="" class="nav-link-danger">Galeri Kegiatan</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active"><?= $resultDetail['judul'] ?></a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="../galeri-kegiatan/semua-kegiatan.html" title="" class="nav-link-danger">Galeri Kegiatan</a>
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
                    <div class="card-title mb-0 text-center">
                        <img src="../assets/images/galeri-kegiatan/<?= $resultDetail['foto'] ?>" alt="Foto <?= $resultDetail['judul'] ?>" class="img-thumbnail mb-1">
                        <small class="text-muted"><em>Foto <?= $resultDetail['judul'] ?></em></small>
                    </div>
                    <div class="card-body mt-0">
                        <?= $resultDetail['keterangan'] ?>
                        <?php if ($resultDetail['link_youtube']!==NULL): ?>
                            <a href="<?= $resultDetail['link_youtube'] ?>" target="_blank" title="Galeri Kegiatan <?= $resultDetail['judul'] ?>" class="btn btn btn-danger z-index text-center"><i class="fab fa-youtube"></i> Lihat di YouTube</a>
                        <?php endif ?>
                        <h6 class="mt-4 text-danger"><em><i class="fas fa-calendar-alt"></i> <?= tgl2(date($resultDetail['tgl_update'])) ?></em></h6>
                    </div>
                </div>
            </div>
            <?php require 'sidebar.php'; ?>
        </div>
    </div>
</div>
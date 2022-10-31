<?php

    $Detail = $pdo->query("SELECT id_daftar_ketua, nama, periode, data_diri, kegiatan, foto, seo FROM daftar_ketua WHERE seo='$_GET[judul_seo]'");
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
                <h1 class="text-uppercase"><?= $resultDetail['nama'] ?></h1>
                <h3 class="text-uppercase">KETUA <?= $namaweb ?> PERIODE <?= $resultDetail['periode'] ?></h3>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3 class="text-uppercase"><?= $resultDetail['nama'] ?></h3>
                <h5 class="text-uppercase">KETUA <?= $namaweb ?> PERIODE <?= $resultDetail['periode'] ?></h5>
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
                <a href="../daftar-ketua/" title="" class="nav-link-danger">Daftar Ketua</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active"><?= $resultDetail['nama'] ?></a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="../profdaftar-ketuail/" title="" class="nav-link-danger">Daftar Ketua</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active"><?= $resultDetail['nama'] ?></a>
            </small>
        </div>
    </div>
</div>

<div class="container-fluid my-3 my-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card sticky-top-card">
                    <h5 class="card-header card-header-success text-light text-center">Ketua <?= $namaweb ?> <br /> Periode <?= $resultDetail['periode'] ?></h5>
                    <div class="card-body">
                        <div class="card h-100 card-profile shadow-sm">
                            <div class="card-header" style="background-image: url('../assets/images/daftar-ketua/<?= $resultDetail['foto']; ?>'); background-size: cover;">
                                
                                <div class="profile-picture">
                                    <div class="avatar avatar-xxl">
                                        <img src="../assets/images/daftar-ketua/<?= $resultDetail['foto']; ?>" alt="Gambar <?= $resultDetail['nama']; ?>" class="avatar-img rounded-circle shadow-md" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-body mt-4">
                                <div class="user-profile text-center">
                                    <div class="name text-danger"><?= $resultDetail['nama']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 mt-4 mt-md-0">
                <div class="shadow-sm">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dataDiri" aria-expanded="true" aria-controls="dataDiri">
                                    <i class="fas fa-id-badge"></i>&nbsp;Data Diri
                                </button>
                            </h2>
                            <div id="dataDiri" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?= $resultDetail['data_diri'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kegiatan" aria-expanded="false" aria-controls="kegiatan">
                                    <i class="fas fa-user-graduate"></i>&nbsp;Kegiatan
                                </button>
                            </h2>
                            <div id="kegiatan" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?= $resultDetail['kegiatan'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
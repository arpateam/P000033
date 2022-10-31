<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>HALAMAN PROFIL</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>HALAMAN PROFIL</h3>
            </div>
        </div>
    </div>
</div>

<div class="container z-index mt--4">
    <div class="row justify-content-center">
        <div class="col-11 col-lg-8 col-xl-6 bg-success shadow rounded text-center py-3">
            <span class="d-none d-lg-block">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Profil</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Profil</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success">PROFIL</h1>
            <h6 class="text-danger">Yuk kenali kami lebih dekat dengan membaca Profil Kami</h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                <?php
                    $Data = $pdo->query("SELECT judul, gambar, seo FROM konten_profil WHERE status='Aktif' ORDER BY urutan ASC");
                    while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="col-sm-6 col-lg-4 my-2">
                    <div class="card h-100 bg-light shadow-sm">
                        <img src="../assets/images/konten-profil/<?= $resultData['gambar'] ?>" class="card-img" alt="<?= $resultData['judul'] ?>">
                        <div class="card-img-overlay text-center">
                            <h4 class="card-title d-none d-md-block text-light-card"><?= $resultData['judul'] ?></h4>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title text-danger d-block d-md-none"><?= $resultData['judul'] ?></h4>
                            <div class="mt-1"></div>
                            <a href="<?= $resultData['seo'] ?>.html" title="Profil <?= $resultData['judul'] ?>" class="btn btn-sm btn-danger z-index"><i class="fab fa-readme"></i> Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
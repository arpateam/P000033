<div class="container-fluid bg-danger py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-light d-none d-lg-block">
                <h1>HALAMAN DAFTAR KETUA</h1>
            </div>
            <div class="col-12 text-center text-light d-block d-lg-none">
                <h3>HALAMAN DAFTAR KETUA</h3>
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
                <a href="#" title="" class="nav-link-danger active">Daftar Ketua</a>
            </span>
            <small class="d-block d-lg-none">
                <a href="/" title="Beranda" class="nav-link-danger"><i class="fas fa-home"></i> Beranda</a>
                <i class="fas fa-angle-right text-danger"></i>
                <a href="#" title="" class="nav-link-danger active">Daftar Ketua</a>
            </small>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-between">
        <div class="col-12">
            <h1 class="text-success text-uppercase">DAFTAR KETUA <?= $namaweb ?></h1>
            <h6 class="text-danger">Yuk kenali lebih dekat dengan Ketua <?= $namaweb ?></h6>
        </div>
        <div class="col-6">
            <div class="border-bottom-3"></div>
        </div>
        <div class="col-12 mt-4">
            <div class="row">
                <?php
                    $DaftarKetua = $pdo->query("SELECT id_daftar_ketua, nama, periode, data_diri, kegiatan, foto, seo FROM daftar_ketua ORDER BY periode DESC");
                    while($resultDaftarKetua = $DaftarKetua->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div class="col-sm-6 col-lg-4 my-2">
                    <div class="card h-100 card-profile shadow-sm">
                        <div class="card-header" style="background-image: url('../assets/images/daftar-ketua/<?= $resultDaftarKetua['foto']; ?>'); background-size: cover;">

                            <span class="badge bg-danger"><i class="fas fa-thumbtack"></i> Periode <?= $resultDaftarKetua['periode'] ?></span>
                            
                            <div class="profile-picture">
                                <div class="avatar avatar-xxl">
                                    <img src="../assets/images/daftar-ketua/<?= $resultDaftarKetua['foto']; ?>" alt="Gambar <?= $resultDaftarKetua['nama']; ?>" class="avatar-img rounded-circle shadow-md" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-4">
                            <div class="user-profile text-center">
                                <div class="name text-danger"><?= $resultDaftarKetua['nama']; ?></div>
                            </div>
                        </div>
                        <div class="card-body p-2 border-top">
                            <div class="row text-center text-light">

                                <div class="col-4 px-0 my-1">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>">
                                        <i class="fas fa-id-badge"></i> Profil
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>" tabindex="-1" aria-labelledby="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-success" id="Profil<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label"><i class="fas fa-id-badge"></i> Profil <strong><?= $resultDaftarKetua['nama']; ?></strong></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start text-success">
                                                    <?= $resultDaftarKetua['data_diri']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 px-0 my-1">
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>">
                                        <i class="fas fa-user-graduate"></i> Kegiatan
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>" tabindex="-1" aria-labelledby="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-success" id="Kegiatan<?= $resultDaftarKetua['id_daftar_ketua']; ?>Label"><i class="fas fa-user-graduate"></i> Kegiatan <strong><?= $resultDaftarKetua['nama']; ?></strong></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start text-success">
                                                    <?= $resultDaftarKetua['kegiatan']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 px-0 my-1">
                                    <a href="<?= $resultDaftarKetua['seo']; ?>.html" role="button" class="btn btn-sm btn-danger">
                                        <i class="fas fa-external-link-alt"></i> Detail
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
    $DaftarKetua = $pdo->query("SELECT id_daftar_ketua, nama, periode, foto, seo FROM daftar_ketua ORDER BY periode DESC LIMIT 1");
    $resultDaftarKetua = $DaftarKetua->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-lg-4 mt-4 mt-lg-0">
    <div class="card sticky-top-card">
        <h5 class="card-header card-header-success text-light text-center">Ketua <?= $namaweb ?> <br /> Periode <?= $resultDaftarKetua['periode'] ?></h5>
        <div class="card-body">
            <div class="card h-100 card-profile shadow-sm">
                <div class="card-header" style="background-image: url('assets/images/daftar-ketua/<?= $resultDaftarKetua['foto']; ?>'); background-size: cover;">
                    
                    <div class="profile-picture">
                        <div class="avatar avatar-xxl">
                            <img src="../assets/images/daftar-ketua/small/<?= $resultDaftarKetua['foto']; ?>" alt="Gambar <?= $resultDaftarKetua['nama']; ?>" class="avatar-img rounded-circle shadow-md" />
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
                            <a href="ubah-<?= $link ?>-<?= $resultDaftarKetua['id_daftar_ketua']; ?>" role="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-id-badge"></i> Profil
                            </a>
                        </div>

                        <div class="col-4 px-0 my-1">
                            <a href="ubah-<?= $link ?>-<?= $resultDaftarKetua['id_daftar_ketua']; ?>" role="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-user-graduate"></i> Kegiatan
                            </a>
                        </div>

                        <div class="col-4 px-0 my-1">
                            <a href="<?= $link1.'/'.$link.'/'.$resultDaftarKetua['seo']; ?>.html" target="_blank" role="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-external-link-alt"></i> Detail
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
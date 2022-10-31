<?php

    $hal                = "Alumni";
    $penyimpananGambar  = "../assets/images/alumni/small";
    $database           = "alumni";
    $link               = "alumni";

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="page-header">
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-user-graduate"></i> <?= $hal; ?></h4>
                <ul class="breadcrumbs text-light">
                    <li class="nav-home">
                        <a href="dashboard">
                            <i class="flaticon-home text-light"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="text-light"><u><?= $hal; ?></u></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-secondary fw-bold">Daftar <?= $hal ?></h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="tambah-<?= $link ?>" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah <?= $hal ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="100px">Aksi</th>
                                        <th scope="col" width="150px">Nama</th>
                                        <th scope="col" width="65px">Angkatan</th>
                                        <th scope="col" width="200px">Alamat</th>
                                        <th scope="col" width="100px">Pekerjaan</th>
                                        <th scope="col" width="100px">Tanggal Update</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT * FROM $database ORDER BY angkatan DESC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="ubah-<?= $link ?>-<?= $resultData['id_alumni']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="confirmHapusAlumni('<?= $resultData['id_alumni']; ?>')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td><?= $resultData['nama']; ?></td>
                                        <td><strong><?= substr($resultData['angkatan'], 0, 4) ?></strong></td>
                                        <td><?= $resultData['alamat']; ?></td>
                                        <td><strong class="text-success"><?= $resultData['pekerjaan']; ?></strong></td>
                                        <td class="text-center"><span class="text-muted"><?= tgl2($resultData['tgl_update']); ?></span></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="100px">Aksi</th>
                                        <th scope="col" width="150px">Nama</th>
                                        <th scope="col" width="65px">Angkatan</th>
                                        <th scope="col" width="200px">Alamat</th>
                                        <th scope="col" width="100px">Pekerjaan</th>
                                        <th scope="col" width="100px">Tanggal Update</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'add':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="page-header">
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-user-graduate"></i> <?= $hal; ?></h4>
                <ul class="breadcrumbs text-light">
                    <li class="nav-home">
                        <a href="dashboard">
                            <i class="flaticon-home text-light"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $link ?>" class="text-light"><?= $hal; ?></a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="text-light disable"><u>Tambah <?= $hal; ?></u></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionTambahAlumni" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>

                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Nama</label>
                                            <input id="nama" name="___in_nama_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: John Doe" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Angkatan</label>
                                            <input id="angkatan" name="___in_angkatan_special_KPSFHUAD" type="month" class="form-control input-border-bottom" placeholder="Cth: 2021" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Angkatan!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Alamat</label>
                                            <textarea id="alamat" name="___in_alamat_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Jl. Wiyoro Kidul, Wiyoro, Baturetno, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55197" rows="2" required></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Alamat!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Pekerjaan</label>
                                            <input id="pekerjaan" name="___in_pekerjaan_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Hakim" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Pekerjaan!
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <button type="submit" name="_submit_special_KPSFHUAD_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'edit':

        $Data       = $pdo->query("SELECT * FROM alumni WHERE id_alumni='$_GET[kode]'");
        $resultData = $Data->fetch(PDO::FETCH_ASSOC);
        $jmlData    = $Data->rowCount(PDO::FETCH_ASSOC);

        if ($jmlData===0) {
            echo "<script>window.location = '$link';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="page-header">
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-user-graduate"></i> <?= $hal; ?></h4>
                <ul class="breadcrumbs text-light">
                    <li class="nav-home">
                        <a href="dashboard">
                            <i class="flaticon-home text-light"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $link ?>" class="text-light"><?= $hal; ?></a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="text-light disable">Mengubah <?= $hal; ?> <u>"<?= $resultData['nama'] ?>"</u></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionEditAlumni" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>
                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Nama</label>
                                            <input id="nama" name="___in_nama_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: John Doe" value="<?= $resultData['nama']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Angkatan</label>
                                            <input id="angkatan" name="___in_angkatan_special_KPSFHUAD" type="month" class="form-control input-border-bottom" placeholder="Cth: 2021" value="<?= $resultData['angkatan']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Angkatan!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Alamat</label>
                                            <textarea id="alamat" name="___in_alamat_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Jl. Wiyoro Kidul, Wiyoro, Baturetno, Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55197" rows="2" required><?= $resultData['alamat']; ?></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Alamat!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Pekerjaan</label>
                                            <input id="pekerjaan" name="___in_pekerjaan_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Hakim" value="<?= $resultData['pekerjaan']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Pekerjaan!
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <input type="hidden" name="___in_id_alumni_special_KPSFHUAD" value="<?= $resultData['id_alumni']; ?>">
                                    <button type="submit" name="_submit_special_KPSFHUAD_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>
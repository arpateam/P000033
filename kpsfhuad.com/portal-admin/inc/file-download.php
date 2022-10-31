<?php

    $hal                = "File Download";
    $penyimpananGambar  = "../assets/images/file-download";
    $database           = "file_download";
    $link               = "file-download";

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="page-header">
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-file-download"></i> <?= $hal; ?></h4>
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
                                <h2 class="text-secondary fw-bold"><?= $hal; ?></h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="tambah-<?= $link ?>" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah <?= $hal; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="80px">Aksi</th>
                                        <th scope="col" width="50px">Status</th>
                                        <th scope="col" width="200px">Nama File</th>
                                        <th scope="col" width="150px">File Download</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT id_file_download, nama_file, file, status FROM $database ORDER BY tgl_update DESC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a href="ubah-<?= $link ?>-<?= $resultData['id_file_download']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="confirmHapusFileDownload('<?= $resultData['id_file_download']; ?>')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td>
                                            <?php if ($resultData['status']==="Aktif"): ?>
                                                <span class="badge badge-success"><i class="fas fa-check"></i> Aktif</span>
                                            <?php elseif ($resultData['status']==="Non-Aktif"): ?>
                                                <span class="badge badge-danger"><i class="fas fa-ban"></i> Non-Aktif</span>
                                            <?php endif ?>
                                        </td>
                                        <td><h5><ins><?= $resultData['nama_file']; ?></ins></h5></td>
                                        <td>
                                            <a href="<?= $penyimpananGambar.'/'.$resultData['file'] ?>" target="_blank" title="Download <?= $hal ?>" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download File</a>
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="80px">Aksi</th>
                                        <th scope="col" width="50px">Status</th>
                                        <th scope="col" width="200px">Nama File</th>
                                        <th scope="col" width="150px">File Download</th>
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
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-file-download"></i> <?= $hal; ?></h4>
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
                        <form method="POST" action="actionTambahFileDownload" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
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
                                            <label class="font-weight-bold">Nama File</label>
                                            <input id="nama_file" name="___in_nama_file_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Kegiatan Rapat Periode 2021-2022" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama File!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Status File Download</label>
                                            <select name="___in_status_special_KPSFHUAD" class="form-control input-border-bottom" required>
                                                <option value="">- Pilih Status File Download -</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non-Aktif">Non-Aktif</option>
                                            </select>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Status File Download!
                                            </div>
                                        </div>
                                    </div>

                                <!-- File Download -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-download"></i> File Download</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning d-flex align-items-center mt-2" role="alert">
                                            <div>
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Maksimal ukuran file <strong>2MB</strong>
                                                <br />
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Untuk menghasilkan slider yang bagus, mohon gunakan resolusi <strong>1920 pixel x 1080 pixel</strong>
                                            </div>
                                        </div>

                                        <div class="image-upload-wrap">

                                            <input type="file" class="file-upload-input" name="___in_file_special_KPSFHUAD" accept=".xlsx,.xls,.doc, .docx,.ppt,.pptx,.txt,.pdf" onchange="readURL(this);" required />

                                            <div class="invalid-feedback fw-bold p-2">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon pilih file untuk <?= $hal; ?> anda
                                            </div>

                                            <div class="drag-text">
                                                <h3>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                    </svg>
                                                    <br />
                                                    Drag & Drop your files or <u>Browse</u>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="file-upload-content">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    File anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah File
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
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

        $Data       = $pdo->query("SELECT * FROM $database WHERE id_file_download='$_GET[kode]'");
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
                <h4 class="page-title text-light d-none d-md-block"><i class="fas fa-file-download"></i> <?= $hal; ?></h4>
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
                        <a href="#" class="text-light disable">Mengubah <?= $hal; ?> <u>"<?= $resultData['nama_file'] ?>"</u></a>
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
                        <form method="POST" action="actionEditFileDownload" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
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
                                            <label class="font-weight-bold">Nama File</label>
                                            <input id="nama_file" name="___in_nama_file_special_KPSFHUAD" type="text" class="form-control input-border-bottom" placeholder="Cth: Kegiatan Rapat Periode 2021-2022" value="<?= $resultData['nama_file']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Nama File!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Status File Download</label>
                                            <select name="___in_status_special_KPSFHUAD" class="form-control input-border-bottom" required>
                                                <option value="">- Pilih Status File Download -</option>
                                                <option value="Aktif" <?php if ($resultData['status']==="Aktif") { echo "selected"; } ?>>Aktif</option>
                                                <option value="Non-Aktif" <?php if ($resultData['status']==="Non-Aktif") { echo "selected"; } ?>>Non-Aktif</option>
                                            </select>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Pilih Status File Download!
                                            </div>
                                        </div>
                                    </div>

                                <!-- File Download -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-download"></i> File Download</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning d-flex align-items-center mt-2" role="alert">
                                            <div>
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Maksimal ukuran File <strong>2MB</strong>
                                                <br />
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Untuk menghasilkan slider yang bagus, mohon gunakan resolusi <strong>1920 pixel x 1080 pixel</strong>
                                            </div>
                                        </div>

                                        <div class="image-upload-wrap">
                                            <input type="file" class="file-upload-input" name="___in_file_special_KPSFHUAD" accept=".xlsx,.xls,.doc, .docx,.ppt,.pptx,.txt,.pdf" onchange="readURL(this);" />

                                            <div class="drag-text">
                                                <h3>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                    </svg>
                                                    <br />
                                                    Drag & Drop your files or <u>Browse</u>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="file-upload-content">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    File anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah File
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="file-upload-content-edit text-center">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    File anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <a href="<?= $penyimpananGambar.'/'.$resultData['file'] ?>" target="_blank" title="Download <?= $hal ?>" class="btn btn-sm btn-primary file-upload-image px-2 pt-2 px-md-4"><i class="fas fa-download"></i> Download File</a>

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah File
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback fw-bold">
                                            Mohon pilih File untuk Slider anda
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <input type="hidden" name="___in_id_file_download_special_KPSFHUAD" value="<?= $resultData['id_file_download']; ?>">
                                    <input type="hidden" name="___in_file_lama_special_KPSFHUAD" value="<?= $resultData['file']; ?>">
                                    <input type="hidden" name="___in_id_sitemap_1_special_KPSFHUAD" value="<?= $resultData['id_sitemap_1']; ?>">
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
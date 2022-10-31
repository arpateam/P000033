<?php
    // configuration
    require "../system/koneksi.php";
    require "../system/fungsi_indotgl.php";

    $row        = $_POST['row'];
    $rowperpage = 3;

    // selecting posts
    $Data       = $pdo->query("SELECT id_galeri_kegiatan, sub_galeri_kegiatan, judul, foto, keterangan, link_youtube, seo, tgl_update FROM galeri_kegiatan WHERE sub_galeri_kegiatan='IMCC' ORDER BY tgl_update DESC LIMIT $row,$rowperpage");

    $html = '';

    while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
        $ket    = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$resultData["keterangan"])));
        $ket2   = substr($ket,0,strrpos(substr($ket,0,200)," "))." ...";

        // Creating HTML structure
        $html .= '<div id="post_'.$resultData['id_galeri_kegiatan'].'" class="col-sm-6 col-lg-4 my-2 post">';
        $html .= '<div class="card bg-light shadow-sm">';
        $html .= '<div class="thumbnail-box">';
        $html .= '<img src="../assets/images/galeri-kegiatan/small/'.$resultData['foto'].'" class="card-img portrait-box" alt="'.$resultData['judul'].'">';
        $html .= '</div>';
        $html .= '<div class="card-img-overlay">';
        $html .= '<h5 class="card-title d-none d-md-block text-light-card">'.$resultData['judul'].'</h5>';
        $html .= '<small class="badge bg-danger fw-normal"><i class="fas fa-tag"></i> '.$resultData['sub_galeri_kegiatan'].'</small>';
        $html .= '<small class="badge bg-danger fw-normal"><i class="fas fa-calendar-alt"></i> '.tgl2($resultData['tgl_update']).'</small>';
        $html .= '</div>';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title text-danger d-block d-md-none">'.$resultData['judul'].'</h5>';
        $html .= '<small class="card-text text-muted">'.$ket2.'</small>';
        $html .= '<div class="mt-2"></div>';
        $html .= '<a href="'.$resultData['seo'].'.html" title="'.$resultData['judul'].'" class="btn btn-sm btn-outline-danger z-index"><i class="fas fa-external-link-alt"></i> Detail</a>';

        if ($resultData['link_youtube']!==NULL) {
            $html .= '<a href="'.$resultData['link_youtube'].'" target="_blank" title="Galeri Kegiatan '.$resultData['judul'].'" class="btn btn-sm btn-danger z-index"><i class="fab fa-youtube"></i> Lihat di YouTube</a>';
        }

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

    }

    echo $html;
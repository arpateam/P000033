<?php

	class pagingSemuaGaleriKegiatan{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='semua-kegiatan-page-1.html'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='semua-kegiatan-page-$prev.html' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=semua-kegiatan-page-$i.html>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=semua-kegiatan-page-$i.html>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=semua-kegiatan-page-$jmlhalaman.html>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='semua-kegiatan-page-$next.html' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='semua-kegiatan-page-$jmlhalaman.html'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingGaleriKegiatanNMCC{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='nmcc-page-1.html'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='nmcc-page-$prev.html' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=nmcc-page-$i.html>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=nmcc-page-$i.html>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=nmcc-page-$jmlhalaman.html>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='nmcc-page-$next.html' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='nmcc-page-$jmlhalaman.html'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingGaleriKegiatanIMCC{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='imcc-page-1.html'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='imcc-page-$prev.html' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=imcc-page-$i.html>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=imcc-page-$i.html>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=imcc-page-$jmlhalaman.html>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='imcc-page-$next.html' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='imcc-page-$jmlhalaman.html'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingGaleriKegiatanPROKER{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='proker-page-1.html'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='proker-page-$prev.html' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=proker-page-$i.html>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=proker-page-$i.html>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=proker-page-$jmlhalaman.html>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='proker-page-$next.html' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='proker-page-$jmlhalaman.html'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingPrestasi{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='page-1'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=page-$jmlhalaman>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='page-$next' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='page-$jmlhalaman'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingBerita{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='page-1'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=page-$jmlhalaman>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='page-$next' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='page-$jmlhalaman'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingPengumuman{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='page-1'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=page-$jmlhalaman>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='page-$next' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='page-$jmlhalaman'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}

	class pagingAlumni{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman){
			$link_halaman = "";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<a href='page-1'><i class='fa fa-arrow-left' aria-hidden='true'></i> First</a> 
								<a href='page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
			}else{ 
				$link_halaman .= "<span class='pages'>Page $halaman_aktif of $jmlhalaman:</span>
								<i class='fa fa-arrow-left' aria-hidden='true'></i> First < Prev | ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " ... " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= " <strong class='current-pag'><b>$halaman_aktif</b></strong>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  break;
				  $angka .= "<a href=page-$i>$i</a> ";
				}
				  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=page-$jmlhalaman>$jmlhalaman</a> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= " <a href='page-$next' title='Next'><i class='fa fa-arrow-right' aria-hidden='true'></i></i></a>
								 <a href='page-$jmlhalaman'>Last <i class='fa fa-arrow-right' aria-hidden='true'></i></a>
								 ";
			}else{
				$link_halaman .= "";
			}
			return $link_halaman;
		}
	}
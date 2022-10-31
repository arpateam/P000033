<?php
	require "../system/koneksi.php";
	require "../system/fungsi_indotgl.php";
	require "../system/fungsi_modul.php";
    require "../system/fungsi_rupiah.php";
    require "../system/fungsi_seo.php";
    require "../system/fungsi_telp.php";
    require "../system/paging.php";
    require "../system/z_setting.php";
?>

<!DOCTYPE html>
<html lang="id, in">
<head> 
	<?php require "../system/seo_v4.php";?>

	<link rel="icon" type="image/x-icon" href="../assets/images/<?= $iconWebsite; ?>" />

    <!-- Fonts and icons -->
    <link href="../assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap');</style>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/paging.min.css">
</head>
<body>

	<div class="container-fluid">
		<?php require "../inc/headerV2.php"; ?>
		<?php require "content.php"; ?>
		<?php require "../inc/footerV2.php"; ?>
	</div>

	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

	<!-- Asset -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		// ===== Scroll to Top ==== 
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			    $('#return-to-top').fadeIn(200);    // Fade in the arrow
			} else {
				$('#return-to-top').fadeOut(200);   // Else fade out the arrow
			}
		});
		$('#return-to-top').click(function() {      // When arrow is clicked
			$('body,html').animate({
				scrollTop : 0                       // Scroll to top of body
			}, 500);
		});
		// ===== Scroll to Top ==== 
	</script>

	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: 'id, in'},
				'google_translate_element'
			);
		}
	</script>
	<!-- Asset -->

	<?php if ($_GET['module']==="galeri-kegiatan"): ?>
		<script>
		    $(document).ready(function(){
		        // Load more data
		        $('.load-more').click(function(){
		            var row = Number($('#row').val());
		            var allcount = Number($('#all').val());
		            row = row + 3;

		            if(row <= allcount){
		                $("#row").val(row);

		                $.ajax({
		                    url: 'getData.php',
		                    type: 'post',
		                    data: {row:row},
		                    beforeSend:function(){
		                        $(".load-more").html("Memuat <i class='fas fa-spinner fa-spin'></i>");
		                    },
		                    success: function(response){
		                        // Setting little delay while displaying new content
		                        setTimeout(function() {
		                            // appending posts after last post with class="post"
		                            $(".post:last").after(response).show().fadeIn("slow");

		                            var rowno = row + 3;

		                            // checking row value is greater than allcount or not
		                            if(rowno > allcount){
		                                // Change the text and background
		                                $('.load-more').hide();
		                                // $('.load-more').css("background","darkorchid");
		                            }else{
		                                $(".load-more").html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                            }
		                        }, 2000);
		                    }
		                });
		            }else{
		                $('.load-more').html("Memuat <i class='fas fa-spinner fa-spin'></i>");

		                // Setting little delay while removing contents
		                setTimeout(function() {
		                    // When row is greater than allcount then remove all class='post' element after 3 element
		                    $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

		                    // Reset the value of row
		                    $("#row").val(0);

		                    // Change the text and background
		                    $('.load-more').html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                    $('.load-more').css("background","#15a9ce");
		                }, 2000);
		            }
		        });
		    });
		</script>
	<?php elseif ($_GET['module']==="nmcc"): ?>
		<script>
		    $(document).ready(function(){
		        // Load more data
		        $('.load-more').click(function(){
		            var row = Number($('#row').val());
		            var allcount = Number($('#all').val());
		            row = row + 3;

		            if(row <= allcount){
		                $("#row").val(row);

		                $.ajax({
		                    url: 'getDataNMCC.php',
		                    type: 'post',
		                    data: {row:row},
		                    beforeSend:function(){
		                        $(".load-more").html("Memuat <i class='fas fa-spinner fa-spin'></i>");
		                    },
		                    success: function(response){
		                        // Setting little delay while displaying new content
		                        setTimeout(function() {
		                            // appending posts after last post with class="post"
		                            $(".post:last").after(response).show().fadeIn("slow");

		                            var rowno = row + 3;

		                            // checking row value is greater than allcount or not
		                            if(rowno > allcount){
		                                // Change the text and background
		                                $('.load-more').hide();
		                                // $('.load-more').css("background","darkorchid");
		                            }else{
		                                $(".load-more").html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                            }
		                        }, 2000);
		                    }
		                });
		            }else{
		                $('.load-more').html("Memuat <i class='fas fa-spinner fa-spin'></i>");

		                // Setting little delay while removing contents
		                setTimeout(function() {
		                    // When row is greater than allcount then remove all class='post' element after 3 element
		                    $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

		                    // Reset the value of row
		                    $("#row").val(0);

		                    // Change the text and background
		                    $('.load-more').html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                    $('.load-more').css("background","#15a9ce");
		                }, 2000);
		            }
		        });
		    });
		</script>
	<?php elseif ($_GET['module']==="imcc"): ?>
		<script>
		    $(document).ready(function(){
		        // Load more data
		        $('.load-more').click(function(){
		            var row = Number($('#row').val());
		            var allcount = Number($('#all').val());
		            row = row + 3;

		            if(row <= allcount){
		                $("#row").val(row);

		                $.ajax({
		                    url: 'getDataIMCC.php',
		                    type: 'post',
		                    data: {row:row},
		                    beforeSend:function(){
		                        $(".load-more").html("Memuat <i class='fas fa-spinner fa-spin'></i>");
		                    },
		                    success: function(response){
		                        // Setting little delay while displaying new content
		                        setTimeout(function() {
		                            // appending posts after last post with class="post"
		                            $(".post:last").after(response).show().fadeIn("slow");

		                            var rowno = row + 3;

		                            // checking row value is greater than allcount or not
		                            if(rowno > allcount){
		                                // Change the text and background
		                                $('.load-more').hide();
		                                // $('.load-more').css("background","darkorchid");
		                            }else{
		                                $(".load-more").html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                            }
		                        }, 2000);
		                    }
		                });
		            }else{
		                $('.load-more').html("Memuat <i class='fas fa-spinner fa-spin'></i>");

		                // Setting little delay while removing contents
		                setTimeout(function() {
		                    // When row is greater than allcount then remove all class='post' element after 3 element
		                    $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

		                    // Reset the value of row
		                    $("#row").val(0);

		                    // Change the text and background
		                    $('.load-more').html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                    $('.load-more').css("background","#15a9ce");
		                }, 2000);
		            }
		        });
		    });
		</script>
	<?php elseif ($_GET['module']==="proker"): ?>
		<script>
		    $(document).ready(function(){
		        // Load more data
		        $('.load-more').click(function(){
		            var row = Number($('#row').val());
		            var allcount = Number($('#all').val());
		            row = row + 3;

		            if(row <= allcount){
		                $("#row").val(row);

		                $.ajax({
		                    url: 'getDataPROKER.php',
		                    type: 'post',
		                    data: {row:row},
		                    beforeSend:function(){
		                        $(".load-more").html("Memuat <i class='fas fa-spinner fa-spin'></i>");
		                    },
		                    success: function(response){
		                        // Setting little delay while displaying new content
		                        setTimeout(function() {
		                            // appending posts after last post with class="post"
		                            $(".post:last").after(response).show().fadeIn("slow");

		                            var rowno = row + 3;

		                            // checking row value is greater than allcount or not
		                            if(rowno > allcount){
		                                // Change the text and background
		                                $('.load-more').hide();
		                                // $('.load-more').css("background","darkorchid");
		                            }else{
		                                $(".load-more").html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                            }
		                        }, 2000);
		                    }
		                });
		            }else{
		                $('.load-more').html("Memuat <i class='fas fa-spinner fa-spin'></i>");

		                // Setting little delay while removing contents
		                setTimeout(function() {
		                    // When row is greater than allcount then remove all class='post' element after 3 element
		                    $('.post:nth-child(3)').nextAll('.post').remove().fadeIn("slow");

		                    // Reset the value of row
		                    $("#row").val(0);

		                    // Change the text and background
		                    $('.load-more').html("Selengkapnya <i class='fas fa-angle-double-down'></i>");
		                    $('.load-more').css("background","#15a9ce");
		                }, 2000);
		            }
		        });
		    });
		</script>
	<?php endif ?>

</body>
</html>
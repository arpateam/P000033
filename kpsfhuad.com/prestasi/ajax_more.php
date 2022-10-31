<?php
if(!empty($_POST["id_galeri_kegiatan"])){

    // Include the database configuration file
    include '../test/dbConfig.php';
    
    // Count all records except already displayed
    $query = $pdo->query("SELECT COUNT(*) as num_rows FROM galeri_kegiatan WHERE id_galeri_kegiatan < ".$_POST['id_galeri_kegiatan']." ORDER BY id_galeri_kegiatan DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];
    
    $showLimit = 2;
    
    // Get records from the database
    $query = $pdo->query("SELECT * FROM galeri_kegiatan WHERE id_galeri_kegiatan < ".$_POST['id_galeri_kegiatan']." ORDER BY id_galeri_kegiatan DESC LIMIT $showLimit");

    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){
            $postID = $row['id_galeri_kegiatan'];
    ?>
        <div class="list_item"><?php echo $row['judul']; ?></div>
    <?php } ?>
    <?php if($totalRowCount > $showLimit){ ?>
        <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>
<?php
    }
}
?>
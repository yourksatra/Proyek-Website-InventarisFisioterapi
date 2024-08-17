<!DOCTYPE html>
<html lang="en">
<body>
<div class="home-section">
    <div class="home-title">
        <span class="text"><?= $title ?></span>
    </div>
    <div class="content" >
        <span>Daftar Alat</span>
    </div>
    <div class="content">
        <?php 
            foreach ($alat as $row)
                echo "
                <div class='card' style='margin-top:10px; margin-bottom:10px;'>
                    <a class='card-body openBtn' type='button' href='".base_url()."index.php/Home/datasop?id=".$row['id_sop']."'>
                        ". $row['alat'] ."
                    </a>
                </div>
                ";
        ?>
    </div>
</div>
</body>
</html>
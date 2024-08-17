<!DOCTYPE html>
<html lang="en">
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        if($this->session->flashdata('notifikasi')){
            ?>
                <script>
                    Swal.fire({
                        title: "Berhasil Meminjam",
                        text: "<?= $this->session->flashdata('notifikasi')?>",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            <?php
        }
    ?>
<section class="home-section">
    <div class="home-title">
        <span class="text"><?= $title ?></span>
    </div>
    <div class="content" >
        <span>Pilihan Alat</span>
    </div>
    <div class="tabel">
        <div align="left" style="margin: 1rem calc(200rem/120);">
            <table id="datatabel" class="table" style="width:100%; margin-top:1rem;">
                <thead>
                    <tr style="background-color:#ffff;">
                        <th>ALAT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($dt_alat as $alat)
                            if($alat['status']==false){
                                if($alat['jmlh_alat']>=1){
                                    echo "
                                        <tr>
                                            <td>
                                                <div class='card' style='margin: auto; margin-block:0.5rem;'>
                                                    <div class='card-body'>
                                                        " .$alat['alat']. " (" .$alat['merk']. ")
                                                        <div>
                                                            Stok Alat : " .$alat['jmlh_alat']. "
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                ";?><form action='<?= base_url()?>index.php/Home/input' method='post'><?="
                                                    <input type='hidden' class='form-control' name='KDalat' value='".$alat['kd_alat']."'>
                                                    <button type='submit' class='btn btn-outline-primary' style='margin-block:2rem'>+Pinjam</button>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                }else{
                                    echo "
                                        <tr>
                                            <td>
                                                <div class='card' style='margin: auto; margin-block:0.5rem;'>
                                                    <div class='card-body'>
                                                        " .$alat['alat']. " (" .$alat['merk']. ")
                                                        <div>
                                                            Stok Alat : " .$alat['jmlh_alat']. "
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class='btn btn-outline-primary' style='margin-block:2rem' name='KDalat' value='".$alat['kd_alat']."' disabled>+Pinjam</button>
                                            </td>
                                        </tr>
                                    ";
                                };
                            };
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        $('#datatabel').DataTable();
    });
</script>
<script src="<?= base_url('vendor\js')?>\script.js"></script>
</body>
</html>
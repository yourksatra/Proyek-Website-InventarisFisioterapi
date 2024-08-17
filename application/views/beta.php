<div class="home-section">
    <div class="home-title">
        <span class="text"><?= $title ?></span>
    </div>
    <div class="content" >
        <span>Data Alat</span>
    </div>
    <div class="tabel" style="width:100%; margin-top:1rem;">
        <div align="left" style="margin: 1rem calc(100rem/100);">
            <table id="datatabel" class="table table-striped table-bordered" style="width:100%; background-color:#ffff;">
                <thead>
                    <tr>
                        <th>ALAT</th>
                        <th>MEREK</th>
                        <th>TAHUN PEMBELIAN</th>
                        <th>FUNGSI</th>
                        <th>KONDISI</th>
                        <th>LOKASI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($dt_alat as $row)
                            echo "
                                <tr>
                                    <td width='50'>" . $row['alat'] . "</td>
                                    <td width='100'>" . $row['merk'] . "</td>
                                    <td width='50'>" . $row['thn_pembelian'] . "</td>
                                    <td width='50'>" . $row['fungsi'] . "</td>
                                    <td width='100'>" . $row['kondisi'] . "</td>
                                    <td width='120'>" . $row['lokasi'] . "</td>
                                </tr>
                            ";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#datatabel').DataTable();
    });
</script>
<script src="<?= base_url('vendor\js')?>\script.js"></script>
</body>
</html>
<div class="home-section">
    <div class="home-title">
        <span class="text"><?= $title ?></span>
    </div>
    <div class="content">
        <span>Input Data Peminjaman</span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        if($this->session->flashdata('notifikasi')){
            ?>
                <script>
                    Swal.fire({
                        title: "Terjadi Kesalahan Input Data",
                        text: "<?= $this->session->flashdata('notifikasi')?>",
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                </script>
            <?php
        }
    ?>
    <form class="row g-2" action="<?= base_url() ?>index.php/Home/aksiInsert" method="POST" enctype="multipart/form-data">
        <div class='card' style='margin: auto; margin-block:0.5rem;'>
            <div class='card-body'>
                <label for="inputNama" class="form-label">Alat (Merk)</label>
                <input type="hidden" class="form-control" id="inputNama" name="kdalat" value="<?= $dtalat['kd_alat']; ?>" required>
                <input type="text" class="form-control" id="inputNama" name="alat" value="<?= $dtalat['alat']; ?> (<?= $dtalat['merk']; ?>)" readonly>
                <div>
                    <label for="inputNama" class="form-label">Stok Alat</label>
                    <input type="number" class="form-control" id="inputNama" name="jumlah" min="1" max="<?= $dtalat['jmlh_alat']; ?>" value="<?= set_value('jumlah', $dtalat['jmlh_alat']); ?>" required>
                </div>
            </div>
        </div>
        <div class="card">
            <div align="left" style="margin: 1rem;">
                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" required>
                </div>
                <div class="col-12">
                    <label for="inputNIM" class="form-label">NOMOR INDUK MAHASISWA</label>
                    <input name="nim" id="inputNIM" class="form-control" type="text" placeholder="10-Digit NIM" value="<?= set_value('nim'); ?>" required>
                </div>
                <div class="col-12">
                    <label for="input" class="form-label">Nomor Peminjam (08XXXXXXXXXXXX)</label>
                    <input name="telpon" id="input" class="form-control" type="text" placeholder="Nomor WhatsApp Aktif" value="<?= set_value('telpon'); ?>" required>
                </div>
                <div class="col-12">
                    <label for="inputTTL" class="form-label">Matakuliah</label>
                    <input type="text" class="form-control" id="inputMK" name="MK" placeholder="Matakuliah" value="<?= set_value('MK'); ?>" required>
                </div>
                <div class="col-12">
                    <label for="inputNamaDosen" class="form-label">Nama Dosen</label>
                    <input type="text" class="form-control" id="inputDosen" name="dosen" placeholder="Nama Dosen" value="<?= set_value('dosen'); ?>" required>
                </div>
                <div class="col-12">
                    <label for="inputRuang" class="form-label">Ruangan Penggunaan</label>
                    <input type="text" class="form-control" id="inputRuangan" name="ruangan" placeholder="Informasi Ruangan" value="<?= set_value('ruangan'); ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="inputTgl" class="form-label">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="inputTgl" name="tglPinjam" value="<?= set_value('tglPinjam'); ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="input" class="form-label">Waktu Penggunaan</label>
                    <input type="time" class="form-control" id="time" name="jamPenggunaan" value="<?= set_value('jamPenggunaan'); ?>" required>
                </div>
                <div class="col-md-12">
                    <label for="input" class="form-label">Waktu Pengembalian</label>
                    <input type="time" class="form-control" id="time" name="pengembalian" value="<?= set_value('pengembalian'); ?>" required>
                </div>
                <div class="col-12" align="center" style="margin-top: 2rem">
                    <button type="submit" class="btn btn-outline-primary" name="input" value="submit">INPUT</button>
                </div>
            </div>
        </div>
    </form>
    </body>

    </html>
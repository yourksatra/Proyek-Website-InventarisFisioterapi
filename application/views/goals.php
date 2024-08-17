<div class="home-section">
    <div class="home-title">
        <span class="text"><?= $title ?></span>
    </div>
    <div class="content">
        <span>Data Peminjaman</span>
    </div>
    <div>
        <span style="margin-left:1rem;">Peminjaman Berlangsung</span>
    </div>
    <div class="tabel" style="width:100%; margin-top:1rem;">
        <div align="left" style="margin: 1rem calc(100rem/100);">
            <table id="datatabel" class="table table-striped table-bordered" style="width:100%; background-color:#ffff;">
                <thead>
                    <tr>
                        <th>NAMA PEMINJAM</th>
                        <th>MATAKULIAH</th>
                        <th>DOSEN</th>
                        <th>RUANG PEMAKAIAN</th>
                        <th>INFORMASI PEMINJAMAN DAN ALAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dt_pinjam as $row) {
                        $data = $this->db->get_where('peminjaman', ['kd_pinjam' => $row['id_pinjam']])->row_array();
                        $data['jam_peminjaman'] = date("H:i", strtotime($data['jam_peminjaman']));
                        $data['jam_pengembalian'] = date("H:i", strtotime($data['jam_pengembalian']));
                        echo "
                                <tr>
                                    <td>" . $data['Nama'] . " 
                                        <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#peminjam" . $data['kd_pinjam'] . "' ><i class='bx bxs-user-detail' style='color:#ffffff'  ></i></a>
                                        <div class='modal' id='peminjam" . $data['kd_pinjam'] . "'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5'>Detail Peminjam</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <h6>NAMA PEMINJAM : " . $data['Nama'] . "</h6>
                                                        <p style='margin-bottom:0;'>NIM : " . $data['nim'] . "</P>
                                                        <p style='margin-bottom:0;'>NOMOR TELPON : " . $data['Telpon'] . " <a class='btn btn-success' href='tel:" . $data['Telpon'] . "'><i class='bx bxl-whatsapp' style='color:#ffffff'  ></i></a></P>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>" . $data['matakuliah'] . "</td>
                                    <td>" . $data['dosen'] . "</td>
                                    <td>" . $data['ruangan'] . "</td>
                                    <td>
                                        <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#pinjam" . $data['kd_pinjam'] . "' ><i class='bx bx-book-bookmark' style='color:#ffffff' ></i></a>
                                        <div class='modal' id='pinjam" . $data['kd_pinjam'] . "'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5'>Informasi Peminjaman</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <h6>Tanggal Peminjaman : " . $data['tgl_pinjam'] . "</h6>
                                                        <h6>JAM Peminjaman : " . $data['jam_peminjaman'] . "</h6>
                                                        <h6>JAM Pengembalian : " . $data['jam_pengembalian'] . "</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#alat" . $data['kd_pinjam'] . "' ><i class='bx bx-edit' style='color:#ffffff' ></i></a>
                                        <div class='modal' id='alat" . $data['kd_pinjam'] . "'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5'>DAFTAR ALAT</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>";
                                                        $pin = $row['id_pinjam'];
                                                        $hasil = $this->db->query("SELECT * FROM tampilpeminjaman WHERE kd_pinjam = '$pin';");
                                                        foreach ($hasil->result() as $row) {
                                                            echo "$row->alat ($row->merk) | Jumlah Pinjam : $row->jumlah_pinjam<br>";
                                                        }echo "
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <a class='btn btn-danger' href='" . base_url() . "index.php/Home/aksidata?kdPinjam=$pin'>Selesai</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <span style="margin-left:1rem;">Histori Peminjaman</span>
    </div>
    <div class="tabel" style="width:100%; margin-top:1rem;">
        <div align="left" style="margin: 1rem calc(100rem/100);">
            <table id="datatabel1" class="table table-striped table-bordered" style="width:100%; background-color:#ffff;">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PEMINJAM</th>
                        <th>MATAKULIAH</th>
                        <th>DOSEN</th>
                        <th>RUANG PEMAKAIAN</th>
                        <th>INFORMASI PEMINJAMAN DAN ALAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    foreach ($dt_record as $row) {
                        $no++;
                        $data = $this->db->get_where('peminjaman', ['kd_pinjam' => $row['kd_pinjam']])->row_array();
                        $data['jam_peminjaman'] = date("H:i", strtotime($data['jam_peminjaman']));
                        $data['jam_pengembalian'] = date("H:i", strtotime($data['jam_pengembalian']));
                        echo "
                                    <tr>
                                        <td>" . $no . "</td>
                                        <td>" . $data['Nama'] . "
                                            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#peminjam" . $data['kd_pinjam'] . "' ><i class='bx bxs-user-detail' style='color:#ffffff'  ></i></a>
                                            <div class='modal' id='peminjam" . $data['kd_pinjam'] . "'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5'>Detail Peminjam</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <h6>NAMA PEMINJAM : " . $data['Nama'] . "</h6>
                                                            <p style='margin-bottom:0;'>NIM : " . $data['nim'] . "</P>
                                                            <p style='margin-bottom:0;'>NOMOR TELPON : " . $data['Telpon'] . "</P>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>" . $data['matakuliah'] . "</td>
                                        <td>" . $data['dosen'] . "</td>
                                        <td>" . $data['ruangan'] . "</td>
                                        <td>
                                            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#pinjam" . $data['kd_pinjam'] . "' ><i class='bx bx-book-bookmark' style='color:#ffffff' ></i></a>
                                            <div class='modal' id='pinjam" . $data['kd_pinjam'] . "'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5'>Informasi Peminjaman</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <h6>Tanggal Peminjaman : " . $data['tgl_pinjam'] . "</h6>
                                                            <h6>JAM Peminjaman : " . $data['jam_peminjaman'] . "</h6>
                                                            <h6>JAM Pengembalian : " . $data['jam_pengembalian'] . "</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#alat" . $data['kd_pinjam'] . "' ><i class='bx bx-edit' style='color:#ffffff' ></i></a>
                                            <div class='modal' id='alat" . $data['kd_pinjam'] . "'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5'>DAFTAR ALAT</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            ";
                        $pin = $data['kd_pinjam'];
                        $hasil = $this->db->query("SELECT * FROM record WHERE kd_pinjam = '$pin';");
                        foreach ($hasil->result() as $row) {
                            echo "$row->alat ($row->merk) | Jumlah Pinjam : $row->jumlah_pinjam<br>";
                        }
                        echo "
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatabel').DataTable();
        });
        $(document).ready(function() {
            $('#datatabel1').DataTable();
        });
    </script>
    <script src="<?php echo base_url('vendor\js') ?>\script.js"></script>
    </body>

    </html>
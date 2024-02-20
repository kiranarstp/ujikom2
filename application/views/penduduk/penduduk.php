<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-...">
</script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <!-- judul (card) -->
    <div class="container mt-4">
        <h2 class="text-center">Data Penduduk</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah
</button>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penduduk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo site_url('Welcome/addDataBlok'); ?>" method="post">
          <div class="mb-3">
            <label for="kd_penduduk" class="form-label">Kd Penduduk</label>
            <input type="text" class="form-control" id="kd_penduduk" name="kd_penduduk" placeholder="Masukkan Kode Penduduk">
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
          </div>
          <div class="mb-3">
            <label for="kk" class="form-label">Kartu Keluarga</label>
            <input type="text" class="form-control" id="kk" name="kk" placeholder="Masukkan Nomor KK">
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto" placeholder="Masukkan Nomor Blok">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
          </div>
          <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Nomor Blok">
          </div>
          <div class="mb-3">
            <label for="no_blok" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="no_blok" name="no_blok" placeholder="Masukkan Nomor Blok">
          </div>
          <div class="mb-3">
            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
            <select name="jeniskelamin" id="jeniskelamin">
                <option value="perempuan">Perempuan</option>
                <option value="laki-laki">Laki-Laki</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <select name="agama" id="agama">
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="konghucu">Konghucu</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="statusperkawinan" class="form-label">Status Perkawinan</label>
            <select name="statusperkawinan" id="statusperkawinan">
                <option value="menikah">Menikah</option>
                <option value="belum menikah">Belum Menikah</option>
                <option value="janda">Janda</option>
                <option value="duda">Duda</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="status keluarga" class="form-label">Status Keluarga</label>
            <select name="status keluarga" id="status keluarga">
                <option value="kepala keluarga">Kepala Keluarga</option>
                <option value="istri">Istri</option>
                <option value="anak">Anak</option>
                <option value="orangtua">Orang Tua</option>
                <option value="saudara">Saudara</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="status pekerjaan" class="form-label">Status Pekerjaan</label>
            <select name="status pekerjaan" id="status pekerjaan">
                <option value="pns">PNS</option>
                <option value="karyawanswasta">Karyawan Swasta</option>
                <option value="dosen">Dosen</option>
                <option value="guru">Guru</option>
                <option value="mengurus rumah tangga">Mengurus Rumah Tangga</option>
                <option value="pelajar/mahasiswa">Pelajar/Mahasiswa</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="status kewarganegaraan" class="form-label">Status Kewarganegaraan</label>
            <select name="status kewarganegaraan" id="status kewarganegaraan">
                <option value="wna">WNI</option>
                <option value="wni">WNA</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="kd_blok" class="form-label">Kd Blok</label>
            <input type="text" class="form-control" id="kd_blok" name="kd_blok" placeholder="Masukkan Nomor Blok">
          </div>
          <div class="mb-3">
            <label for="status kavling" class="form-label">Status Kavling</label>
            <select name="status kavling" id="status kavling">
                <option value="pemilik">Pemilik</option>
                <option value="kontrak">Kontrak</option>
                </select>
          </div>
          <div class="mb-3">
            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Masukkan Tanggal Masuk">
          </div>
          <div class="mb-3">
            <label for="status huni" class="form-label">Status Huni</label>
            <select name="status huni" id="status huni">
                <option value="aktif">Aktif</option>
                <option value="tidak aktif">Tidak Aktif</option>
                </select>
          </div>
          
          
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <div id="pesan" class="alert" style="display: none;"></div>
      </div>
    </div>
  </div>
</div>


    <!-- tabel -->
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col">Kd Penduduk</th>
            <th scope="col">NIK</th>
            <th scope="col">KK</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Tmpat Lahir</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Status Perkawinan</th>
            <th scope="col">Status Keluarga</th>
            <th scope="col">Status Pekerjaan</th>
            <th scope="col">Status Kewarganegaraan</th>
            <th scope="col">Kd Blok</th>
            <th scope="col">Status Kavling</th>
            <th scope="col">Tgl Masuk</th>
            <th scope="col">Status Huni</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($DataPenduduk)) {
            $no = 1;
            foreach ($DataPenduduk as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->kd_blok; ?></td>
                    <td><?php echo $ReadDS->nama_blok; ?></td>
                    <td><?php echo $ReadDS->no_blok; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->kd_blok; ?>">
                            Update
                        </button>
                    |
                    <a href="<?php echo site_url('Welcome/deletePenduduk/'.$ReadDS->kd_blok)?>" class="btn btn-danger" onclick="return confirmDelete()">
                    Delete
            </a>
                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_blok; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penduduk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Welcome/updateDataBlok/' . $ReadDS->kd_blok) ?>" method="post">
                                            <div class="mb-3">
                                                <label for="kd_blok" class="form-label">Kode Blok</label>
                                                <input type="text" class="form-control" id="kd_blok" name="kd_blok" value="<?= $ReadDS->kd_blok; ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_blok" class="form-label">Nama blok</label>
                                                <input type="text" class="form-control" id="nama_blok" name="nama_blok" value="<?= $ReadDS->nama_blok; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_blok" class="form-label">Nomor Blok</label>
                                                <input type="text" class="form-control" id="no_blok" name="no_blok" value="<?= $ReadDS->no_blok; ?>">
                                            </div>
                            
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                        <!-- Akhir formulir -->
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir konten modal -->
                           
                        </div>
                        <!-- Akhir Modal Edit -->
                    </td>
                </tr>
                <?php
                $no++;
            }
        }
        ?>
    </tbody>
</table>



    </div>

   
    <script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

  </body>
</html>






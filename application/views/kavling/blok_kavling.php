<!-- judul (card) -->
<div class="container mt-4">
    <h2 class="text-center">Data Blok Kavling</h2>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        + Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Blok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Welcome/addDataBlok'); ?>" method="post">
                        <label for="kd_blok" class="form-label" hidden>Kode Blok</label>
                        <input type="hidden" class="form-control" id="kd_blok" name="kd_blok"
                            placeholder="Masukkan Kode Blok">
                        <div class="mb-3">
                            <label for="nama_blok" class="form-label">Nama Blok</label>
                            <input type="text" class="form-control" id="nama_blok" name="nama_blok"
                                placeholder="Masukkan Nama Blok" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_blok" class="form-label">No Blok</label>
                            <input type="text" class="form-control" id="no_blok" name="no_blok"
                                placeholder="Masukkan Nomor Blok" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>


    <!-- tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Blok</th>
                    <th scope="col">Nomor Blok</th>
                    <th scope="col">TOOLS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($DataBlokKavling)) {
                    $no = 1;
                    foreach ($DataBlokKavling as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->nama_blok; ?></td>
                    <td><?php echo $ReadDS->no_blok; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary my-1" data-toggle="modal"
                            data-target="#exampleModal_<?php echo $ReadDS->kd_blok; ?>">
                            Update
                        </button>
                        <a href="<?php echo site_url('Welcome/deleteDataBlok/' . $ReadDS->kd_blok) ?>"
                            class="btn btn-danger" onclick="return confirmDelete()">
                            Delete
                        </a>

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_blok; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Blok</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= site_url('Welcome/updateDataBlok/' . $ReadDS->kd_blok) ?>"
                                            method="post">
                                            <label for="kd_blok" class="form-label" hidden>Kode Blok</label>
                                            <input type="hidden" class="form-control" id="kd_blok" name="kd_blok"
                                                value="<?= $ReadDS->kd_blok; ?>" readonly>
                                            <div class="mb-3">
                                                <label for="nama_blok" class="form-label">Nama blok</label>
                                                <input type="text" class="form-control" id="nama_blok" name="nama_blok"
                                                    value="<?= $ReadDS->nama_blok; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_blok" class="form-label">Nomor Blok</label>
                                                <input type="text" class="form-control" id="no_blok" name="no_blok"
                                                    value="<?= $ReadDS->no_blok; ?>" required>
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



</div>


<script>
function confirmDelete() {
    return confirm('Apakah Anda yakin ingin menghapus data ini?');
}
</script>
<!-- judul (card) -->
<div class="container mt-4">
    <h2 class="text-center">Data Informasi</h2>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        + Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Welcome/addDataInformasi'); ?>" method="post">
                        <label for="kd_info" class="form-label" hidden>Kode Informasi</label>
                        <input type="hidden" class="form-control" id="kd_info" name="kd_info"
                            placeholder="Masukkan Kode Informasi" required>
                        <div class="mb-3">
                            <label for="judul_info" class="form-label">Judul Informasi</label>
                            <input type="text" class="form-control" id="judul_info" name="judul_info"
                                placeholder="Masukkan Judul Informasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="informasi" class="form-label">Informasi</label>
                            <!-- <input type="text" class="form-control" id="informasi" name="informasi"
                                placeholder="Masukkan Informasi" required> -->
                            <textarea name="informasi" id="editor1" cols="30" rows="2" class="form-control"
                                required></textarea>
                            <script data-sample="1">
                            CKEDITOR.replace('editor1', {
                                filebrowserBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                filebrowserImageBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                filebrowserUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=File',
                                filebrowserImageUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Image',
                                filebrowserFlashUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Flash'
                            });
                            </script>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_info" class="form-label">Tanggal Informasi</label>
                            <input type="date" class="form-control" id="tgl_info" name="tgl_info"
                                placeholder="Masukkan Tanggal" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <!-- tabel -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Info</th>
                    <th scope="col">Informasi</th>
                    <th scope="col">Tanggal Informasi</th>
                    <th scope="col">TOOLS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($DataInformasi)) {
                    $no = 1;
                    foreach ($DataInformasi as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->judul_info; ?></td>
                    <td><?php echo $ReadDS->informasi; ?></td>
                    <td><?php echo $ReadDS->tgl_info; ?></td>
                    <td>
                        <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                        <button type="button" class="btn btn-primary my-1" data-toggle="modal"
                            data-target="#exampleModal_<?php echo $ReadDS->kd_info; ?>">
                            Update
                        </button>
                        <a href="<?php echo site_url('Welcome/deleteDataInformasi/' . $ReadDS->kd_info) ?>"
                            class="btn btn-danger" onclick="return confirmDelete()">
                            Delete
                        </a>

                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->kd_info; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Informasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="<?= site_url('Welcome/updateDataInformasi/' . $ReadDS->kd_info) ?>"
                                            method="post">
                                            <label for="kd_info" class="form-label" hidden>Kode Informasi</label>
                                            <input type="hidden" class="form-control" id="kd_info" name="kd_info"
                                                value="<?= $ReadDS->kd_info; ?>" readonly>
                                            <div class="mb-3">
                                                <label for="judul_info" class="form-label">Judul Informasi</label>
                                                <input type="text" class="form-control" id="judul_info"
                                                    name="judul_info" value="<?= $ReadDS->judul_info; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="informasi" class="form-label">Informasi</label>
                                                <textarea name="informasi" id="editor2<?= $ReadDS->kd_info; ?>"
                                                    cols="30" rows="2" class="form-control"
                                                    required><?= $ReadDS->informasi; ?></textarea>
                                                <script data-sample="1">
                                                CKEDITOR.replace('editor2<?= $ReadDS->kd_info ?>', {
                                                    filebrowserBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                    filebrowserImageBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                    filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/connector.php',
                                                    filebrowserUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=File',
                                                    filebrowserImageUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Image',
                                                    filebrowserFlashUploadUrl: '<?php echo base_url(); ?>js/ckeditor_full/filemanager/connectors/php/upload.php?Type=Flash'
                                                });
                                                </script>
                                            </div>
                                            <div class="mb-3">
                                                <label for="tgl_info" class="form-label">Tanggal Informasi</label>
                                                <input type="date" class="form-control" id="tgl_info" name="tgl_info"
                                                    value="<?= $ReadDS->tgl_info; ?>" required>
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
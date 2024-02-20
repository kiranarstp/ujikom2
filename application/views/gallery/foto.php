<!-- judul (card) -->
<div class="container-fluid mt-4">
    <h1 class="text-center">Data Foto</h1>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        + Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="createForm" action="<?php echo site_url('Welcome/addDataFoto'); ?>" method="post" enctype="multipart/form-data">
                        <label for="FotoID" class="form-label" hidden>ID Foto</label>
                        <input type="hidden" class="form-control" id="FotoID" name="FotoID"
                            placeholder="Masukkan ID Foto">
                        <div class="mb-3">
                            <label for="JudulFoto" class="form-label">Judul Foto</label>
                            <input type="text" class="form-control" id="JudulFoto" name="JudulFoto"
                                placeholder="Masukkan Judul Foto" required>
                        </div>
                        <div class="mb-3">
                            <label for="DeskripsiFoto" class="form-label">Deskripsi Foto</label>
                            <input type="text" class="form-control" id="DeskripsiFoto" name="DeskripsiFoto"
                                placeholder="Masukkan Deskripsi Foto" required>
                        </div>
                        <div class="mb-3">
                            <label for="TanggalUnggah" class="form-label">Tanggal Unggah</label>
                            <input type="date" class="form-control" id="TanggalUnggah" name="TanggalUnggah"
                                placeholder="Masukkan Tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="LokasiFile" class="form-label">Lokasi File</label>
                            <input type="file" class="form-control" id="LokasiFile" name="LokasiFile" required>
                        </div>
                        <div class="mb-3">
                            <label for="album" class="form-label">Album</label>
                            <select name="AlbumID" id="album" class="form-control">
                                <option value="">pilih album</option>
                                <?php foreach($DataAlbum as $album): ?>
                                    <option value="<?= $album->AlbumID ?>"><?= $album->NamaAlbum ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <div id="pesan" class="alert" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        if (!empty($DataFoto)) {
            foreach ($DataFoto as $ReadDS) {
        ?>
        <style>
            .card-img-top {
                height: 200px; /* Atur tinggi gambar sesuai kebutuhan */
                object-fit: cover; /* Pastikan gambar terpotong secara proporsional */
            }

            .container {
            max-width: 1200 px;
            margin: 20px auto;
            padding: 20px;
            background-color: #C68484;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }

            .grid-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }
        </style>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>" class="card-img-top" alt="Foto <?= $ReadDS->FotoID ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ReadDS->JudulFoto ?></h5>
                            <p class="card-text"><?= $ReadDS->DeskripsiFoto ?></p>
                            <p class="card-text"><small class="text-muted">Tanggal Unggah: <?= $ReadDS->TanggalUnggah ?></small></p>
                            <div>
                                <?php if($ReadDS->UserID == $this->session->userdata('UserID')): ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?= $ReadDS->FotoID ?>">edit</button>
                                <a href="<?= site_url('Welcome/deleteDataFoto/' . $ReadDS->FotoID) ?>" class="btn btn-danger" onclick="return confirmDelete()">hapus</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->FotoID; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Foto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateForm"
                                            action="<?= site_url('Welcome/updateDataFoto/' . $ReadDS->FotoID) ?>"
                                            method="post">
                                            <label for="FotoID" class="form-label" hidden>ID Foto</label>
                                            <input type="hidden" class="form-control" id="FotoID" name="FotoID"
                                                value="<?= $ReadDS->FotoID; ?>" readonly>
                                            <div class="mb-3">
                                                <label for="JudulFoto" class="form-label">Judul Foto</label>
                                                <input type="text" class="form-control" id="JudulFoto" name="JudulFoto"
                                                    value="<?= $ReadDS->JudulFoto; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="DeskripsiFoto" class="form-label">Deskripsi Foto</label>
                                                <input type="text" class="form-control" id="DeskripsiFoto"
                                                    name="DeskripsiFoto" value="<?= $ReadDS->DeskripsiFoto; ?>"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="TanggalUnggah" class="form-label">Tanggal Unggah </label>
                                                <input type="date" class="form-control" id="TanggalUnggah"
                                                    name="TanggalUnggah" value="<?= $ReadDS->TanggalUnggah	; ?>"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="LokasiFile" class="form-label">Lokasi File</label>
                                                <input type="file" class="form-control" id="LokasiFile"
                                                    name="LokasiFile" value="<?= $ReadDS->LokasiFile; ?>" required>
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


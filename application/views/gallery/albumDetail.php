<style>
            .card-img-top {
                height: 200px; /* Atur tinggi gambar sesuai kebutuhan */
                object-fit: cover; /* Pastikan gambar terpotong secara proporsional */
            }
</style>
<div class="container">
    <div class="row">
        <?php foreach($fotoalbum as $ReadDS): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>" class="card-img-top" alt="Foto <?= $ReadDS->FotoID ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $ReadDS->JudulFoto ?></h5>
                        <p class="card-text"><?= $ReadDS->DeskripsiFoto ?></p>
                        <p class="card-text"><small class="text-muted">Tanggal Unggah: <?= $ReadDS->TanggalUnggah ?></small></p>
                        <!-- <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_<?= $ReadDS->FotoID ?>">edit</button>
                            <a href="<?= site_url('Welcome/deleteDataFoto/' . $ReadDS->FotoID) ?>" class="btn btn-danger" onclick="return confirmDelete()">hapus</a>
                            <a href="<?= site_url('Welcome/fotoDetail/' . $ReadDS->FotoID) ?>" class="btn btn-warning">show</a>
                        </div> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
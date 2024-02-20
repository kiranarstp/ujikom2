<!-- judul (card) -->
<div class="container-fluid mt-4">
    <h2 class="text-center">Data Like</h2>
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="bi bi-plus-circle"></i> + Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Like</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('Welcome/addDataLike');?>" method="post">
                        <label for="LikeID" class="form-label" hidden>LikeID</label>
                        <input type="hidden" class="form-control" id="LikeID" name="LikeID"
                            placeholder="Masukkan LikeID">
                        <div class="mb-3">
                            <label for="FotoID" class="form-label">ID Foto</label>
                            <input type="text" class="form-control" id="FotoID" name="FotoID"
                                placeholder="Masukkan Foto ID" required>
                        </div>
                        <div class="mb-3">
                            <label for="UserID" class="form-label">ID User</label>
                            <input type="text" class="form-control" id="UserID" name="UserID"
                                placeholder="Masukkan User ID" required>
                        </div>
                        <div class="mb-3">
                            <label for="TanggalLike" class="form-label">TanggalLike</label>
                            <input type="date" class="form-control" id="TanggalLike" name="TanggalLike"
                                placeholder="Masukkan Isi TanggalLike" required>
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
                    <th scope="col">no.</th>
                    <th scope="col">ID Like</th>
                    <th scope="col">ID Foto</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Tanggal LIke</th>
                    <th scope="col">TOOLS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($DataLike)) {
                    $no = 1;
                    foreach ($DataLike as $ReadDS) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $ReadDS->LikeID; ?></td>
                    <td><?php echo $ReadDS->FotoID; ?></td>
                    <td><?php echo $ReadDS->UserID; ?></td>
                    <td><?php echo $ReadDS->TanggalLike; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary my-1" data-toggle="modal"
                            data-target="#exampleModal_<?php echo $ReadDS->LikeID; ?>">
                            Edit
                        </button>
                        <a href="<?php echo site_url('Welcome/deleteDataLike/'.$ReadDS->LikeID)?>"
                            class="btn btn-danger" onclick="return confirmDelete()">Hapus</a>



                        <div class="modal fade" id="exampleModal_<?php echo $ReadDS->LikeID; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <!-- Konten modal -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Like</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="<?= site_url('Welcome/updateDataLike/' . $ReadDS->LikeID) ?>"
                                            method="post">
                                                <label for="LikeID" class="form-label" hidden>LikeID</label>
                                                <input type="hidden" class="form-control" id="LikeID" name="LikeID"
                                                value="<?= $ReadDS->LikeID; ?>" readonly>
                                            <div class="mb-3">
                                                <label for="FotoID" class="form-label">Foto ID</label>
                                                <input type="text" class="form-control" id="FotoID" name="FotoID"
                                                    value="<?= $ReadDS->FotoID; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="UserID" class="form-label">User ID</label>
                                                <input type="text" class="form-control" id="UserID" name="UserID"
                                                    value="<?= $ReadDS->UserID; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="TanggalLike" class="form-label">TanggalLike</label>
                                                <input type="date" class="form-control" id="TanggalLike" name="TanggalLike" 
                                                value="<?= $ReadDS->TanggalLike; ?>" required>
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
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>



</div>

<script>
function confirmDelete(LikeID) {
    Swal.fire({
        title: "Apakah anda yakin ?",
        text: "Anda ingin menghapus data ini ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, data akan di hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Berhasil !",
                text: 'Data berhasil di hapus !',
                icon: "success",
                showLoaderOnConfirm: true,
            }).then((result) => {
                if (result.isConfirmed || result.dismiss === Swal.DismissReason.close) {
                    // Redirect to the delete URL with the correct KomentarID
                    window.location.href = "<?php echo site_url('Welcome/deleteDataLike/')?>/" +
                    LikeID;
                }
            });
        }
    });
    return false;
}


function succesModal(msg) {
    Swal.fire({
        title: "Berhasil !",
        text: msg,
        icon: "success",
        showLoaderOnConfirm: true,
    }).then((result) => {
        // Reload the page after the Swal modal is closed
        if (result.isConfirmed || result.dismiss === Swal.DismissReason.close) {
            location.reload();
        }
    });
}

function handleFormSubmit(form, msg) {
    var formData = $(form).serialize();
    console.log(formData);

    $.ajax({
        type: "POST",
        url: $(form).attr("action"),
        data: formData,
        success: function(response) {
            console.log(response);
            // Assuming your server returns a JSON object with a "success" property
            // if (response.success) {
            succesModal(msg);
            // } else {
            //     // Handle the case when the form submission is not successful
            //     // You can display an error message or take other actions
            //     alert("Form submission failed. Please try again.");
            // }
        },
        error: function() {
            // Handle the case when the AJAX request fails
            alert("An error occurred. Please try again later.");
        }
    });

    // Return false to prevent the default form submission
    return false;
}
</script>
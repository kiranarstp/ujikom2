<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-tZJ7KV7mr4bMwVr0DtY0jqtG6IW8JzLLZem1uHjEEN+6PqAOr7Tv4GyOvYaQeDBqIzSRWjbJS1TixEdZhD5x2w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    /* CSS untuk styling */
    body {
        font-family: ;
        margin: 0;
        padding: 0;
        background-color: #C68484;
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

    .grid-item {
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .grid-item img {
        width: 100%;
        height: 200px;
        /* Atur tinggi gambar sesuai kebutuhan */
        object-fit: cover;
        /* Pastikan gambar memenuhi area tanpa merubah proporsi aslinya */
        display: block;
        border-radius: 5px 5px 0 0;
    }

    .grid-item .content {
        padding: 10px;
        background-color: #fff;
    }

    .grid-item .content button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        margin-right: 10px;
    }

    .grid-item .content button:hover {
        color: #007bff;
    }

    .comment {
        background-color: #f9f9f9;
        padding: 5px;
        border-radius: 5px;
        margin-top: 5px;
    }

    .comment .delete-comment {
        color: #dc3545;
        cursor: pointer;
        margin-left: 5px;
    }

    .comment .delete-comment:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <h1 class="text-center">Gallery Foto</h1>
    <div class="container">
        <h1 style="text-align: center;"></h1>
        <div class="grid-container">
            <!-- HTML untuk menampilkan galeri foto -->
            <?php foreach($DataFoto as $ReadDS): ?>
            <div class="grid-item">
                <img src="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>" alt="Photo">
                <div class="content">

                    <?php
            $liked = false;
            foreach ($likefoto as $likes){
                if ($likes->FotoID == $ReadDS->FotoID && $likes->UserID == $_SESSION['UserID']) {
                    $liked = true;
                    break;
                }
            }
            ?>

                    <!-- Tambahkan tombol unlike pada setiap foto -->
                    <?php if($liked): ?>
                        <a class="text-danger" href="<?= site_url('Welcome/unlikefoto/' . $ReadDS->FotoID) ?>"><i class="fas fa-heart"></i></a>
                    <?php else: ?>
                        <a class="text-secondary" href="<?= site_url('Welcome/likefoto/' . $ReadDS->FotoID) ?>"><i class="fas fa-heart"></i></a>
                    <?php endif; ?>
                    <span>
                        <?php $likecount = $this->MSudi->LikeCount($ReadDS->FotoID);
                echo $likecount ?>
                    </span>
                    <!-- Tombol untuk menampilkan input komentar -->
                    <!-- Daftar Komentar -->
                    <button onclick="showCommentInput(<?= $ReadDS->FotoID ?>)"><i class="fas fa-comment"></i></button>

                    <!-- Form input komentar -->
                    <form onsubmit="sendComment(event, <?= $ReadDS->FotoID ?>)">
                        <input type="text" placeholder="Add a comment..." id="commentText_<?= $ReadDS->FotoID ?>" name="IsiKomentar">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>

                    <p class="card-text"><small class="text-muted">Tanggal Unggah: <?= $ReadDS->TanggalUnggah ?></small>
                    </p>
                    <div id="commentList_<?= $ReadDS->FotoID ?>"></div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Tambahkan grid-item lain di sini -->
        </div>
    </div>

    <script>
    let comments = {}; // Menggunakan objek untuk menyimpan komentar dengan ID foto sebagai kunci

if (localStorage.getItem('comments')) {
    comments = JSON.parse(localStorage.getItem('comments'));
    renderComments();
}

function showCommentInput(FotoID) {
    var commentInput = document.getElementById("commentInput_" + FotoID);
    if (commentInput.style.display === "none") {
        commentInput.style.display = "block";
    } else {
        commentInput.style.display = "none";
    }
}

async function sendComment(event, FotoID) {
    event.preventDefault();
    var commentText = document.getElementById("commentText_" + FotoID).value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "<?php echo site_url('Welcome/komentar'); ?>", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Tambahkan komentar baru ke dalam objek komentar yang sesuai dengan ID foto
            if (!comments[FotoID]) {
                comments[FotoID] = [];
            }
            comments[FotoID].push(commentText);
            localStorage.setItem('comments', JSON.stringify(comments));
            renderComments(FotoID);
            document.getElementById("commentText_" + FotoID).value = ''; // Bersihkan kolom input
        }
    };
    xhr.send("FotoID=" + FotoID + "&IsiKomentar=" + commentText);
}

function deleteComment(FotoID, index) {
    // Hapus komentar dari objek komentar yang sesuai dengan ID foto
    comments[FotoID].splice(index, 1);
    localStorage.setItem('comments', JSON.stringify(comments));
    renderComments(FotoID);
}

function renderComments(FotoID) {
    const commentList = document.getElementById(`commentList_${FotoID}`);
    commentList.innerHTML = '';

    // Render komentar hanya untuk ID foto yang sesuai
    if (comments[FotoID]) {
        comments[FotoID].forEach((commentText, index) => {
            const commentItem = document.createElement('div');
            commentItem.classList.add('comment');
            commentItem.innerHTML = `
                <span>${commentText}</span>
                <span class="delete-comment" onclick="deleteComment(${FotoID}, ${index})"><i class="fas fa-trash-alt"></i></span>
            `;
            commentList.appendChild(commentItem);
        });
    }
}
    </script>
</body>

</html> 
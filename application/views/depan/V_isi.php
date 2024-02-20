<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gallery Foto</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/aos/aos.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/bootstrap/css/bootstrap.min.css');?>"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/bootstrap-icons/bootstrap-icons.css');?>"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/boxicons/css/boxicons.min.css');?>"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/glightbox/css/glightbox.min.css');?>"
        rel="stylesheet">
    <link href="<?php echo base_url('assets/template/BizLand/assets/vendor/swiper/swiper-bundle.min.css');?>"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets/template/BizLand/assets/css/style.css');?>" rel="stylesheet">

    <style>
        #header {
        background-color: #9B4444; /* Ganti dengan warna yang Anda inginkan */
        }

        body {
        background: linear-gradient(45deg, #B784B7, #A94438, #74E291, #A94438);
        background-size: 400% 400%;
        animation: gradientBG 7s ease infinite;
            }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        .card-img-top {
            height: 200px; /* Ubah nilai ini sesuai dengan tinggi yang Anda inginkan */
            object-fit: cover;
        }
    </style>
</head>

<body>



    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="">Gallery Foto<span>.</span></a></h1>


            <nav id="navbar" class="navbar">
                <ul>

                    <li><a class="nav-link" href="<?= site_url('Login/authenticate') ?>">Login</a></li>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
<br><br><br><br>
    <div class="container ">
        <h1 style="text-align: center;"></h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- HTML untuk menampilkan galeri foto -->
            <?php foreach($DataFoto as $ReadDS): ?>
            <div class="col">
                <div class="card">
                    <img src="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>" class="card-img-top"
                        alt="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>">
                    <div class="card-body">
                    <h5 class="card-title"><?= $ReadDS->JudulFoto ?></h5>
                    <p class="card-text"><?= $ReadDS->DeskripsiFoto ?></p>
                    <p class="card-text"><small class="text-muted">Tanggal Unggah: <?= $ReadDS->TanggalUnggah ?></small></p>
                    </div>
                </div>



                <!-- <div class="card">
                    <img src="<?= base_url('/uploads/' . $ReadDS->LokasiFile) ?>" class="" alt="Photo">
                    <div class="content">

                       
                        <div id="commentList_<?= $ReadDS->FotoID ?>"></div>
                    </div>
                </div> -->
            </div>
            <?php endforeach; ?>

            <!-- Tambahkan grid-item lain di sini -->
        </div>
    </div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    <script>
    let isLiked = false;
    let likeCount = 0;
    let currentFotoID = null;


    if (localStorage.getItem('likeCount')) {
        likeCount = parseInt(localStorage.getItem('likeCount'));
        document.getElementById('likeCount').innerText = likeCount;
    }

    let comments = [];

    if (localStorage.getItem('comments')) {
        comments = JSON.parse(localStorage.getItem('comments'));
        renderComments();
    }

    function toggleLike(photoId) {
        isLiked = !isLiked;
        likeCount = isLiked ? likeCount + 1 : likeCount - 1;
        document.getElementById(`likeCount_${photoId}`).innerText = likeCount;
        localStorage.setItem(`likeCount_${photoId}`, likeCount);
    }

    function showCommentInput(photoID) {
        var commentInput = document.getElementById("commentInput_" + photoID);
        if (commentInput.style.display === "none") {
            commentInput.style.display = "block";
        } else {
            commentInput.style.display = "none";
        }
    }

    function addComment(photoID) {
        var commentText = document.getElementById("commentText_" + photoID).value;
        // Kirim data komentar ke backend
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_comment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                // Refresh halaman atau tindakan lain yang diperlukan setelah menambahkan komentar
                window.location.reload(); // Contoh: refresh halaman
            }
        };
        xhr.send("photoID=" + photoID + "&commentText=" + commentText);
    }

    function deleteComment(photoId, index) {
        comments.splice(index, 1);
        localStorage.setItem('comments', JSON.stringify(comments));
        renderComments();
    }

    function renderComments(photoId) {
        const commentList = document.getElementById(`commentList_${photoId}`);
        commentList.innerHTML = '';

        comments.forEach((commentText, index) => {
            const commentItem = document.createElement('div');
            commentItem.classList.add('comment');
            commentItem.innerHTML = `
            <span>${commentText}</span>
            <span class="delete-comment" onclick="deleteComment(${photoId}, ${index})"><i class="fas fa-trash-alt"></i></span>
        `;
            commentList.appendChild(commentItem);
        });
    }
    </script>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/purecounter/purecounter_vanilla.js');?>">
    </script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/aos/aos.js');?>"></script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>">
    </script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/glightbox/js/glightbox.min.js');?>">
    </script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/isotope-layout/isotope.pkgd.min.js');?>">
    </script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/swiper/swiper-bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/waypoints/noframework.waypoints.js');?>">
    </script>
    <script src="<?php echo base_url('assets/template/BizLand/assets/vendor/php-email-form/validate.js');?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets/template/BizLand/assets/js/main.js');?>"></script>

</body>

</html>
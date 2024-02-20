<?php
// Sambungkan ke database Anda di sini

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data komentar dari permintaan POST
    $photoId = $_POST['FotoID'];
    $commentText = $_POST['commentText'];

    // Misalkan Anda telah memiliki koneksi database yang terbuka
    // Sisipkan komentar ke dalam database
    // Gantilah 'nama_tabel_komentarfoto' dengan nama tabel yang sesuai dalam database Anda
    $query = "INSERT INTO komentarfoto (FotoID, IsiKomentar) VALUES ('$FotoID', '$commentText')";
    // Jalankan query dan tangani kesalahan jika terjadi
    // mysqli_query($koneksi, $query);
    // Atau gunakan PDO atau metode lain sesuai preferensi Anda
}
?>

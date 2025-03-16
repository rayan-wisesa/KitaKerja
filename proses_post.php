<?php
// Menghubungkan file konfigurasi database
include 'config.php';

// Memulai sesi PHP
session_start();

// Mendapatkan ID pengguna dari sesi
$id = $_SESSION["perusahaan_id"];

// Menangani form untuk menambahkan postingan baru
if (isset($_POST['simpan'])) {
    // Mendapatkan data dari form
    $jobtitle = $_POST["job_title"];
    $gaji = $_POST["gaji"];
    $umur = $_POST["umur"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];

        $query = "INSERT INTO pekerjaan (nama_pekerjaan, perusahaan_id, gaji, umur, pendidikan, alamat, tanggal_post) VALUES ('$jobtitle','$id', $gaji , $umur ,'$pendidikan','$alamat', NOW())";
        if ($conn->query($query) === TRUE) {
            // Notifikasi berhasil jika postingan berhasil ditambahkan
            $_SESSION['notification'] = [
                'type' => 'primary',
                'message' => 'Post successfully added.'
            ];
        } else {
            // Notifikasi error jika gagal menambahkan postingan
            $_SESSION['notification'] = [
                'type' => 'danger',
                'message' => 'Error adding post: ' . $conn->error
            ];
        }

    // Arahkan ke halaman dashboard setelah selesai
    header('location: dashboard.php');
    exit();
}
// Proses penghapusan postingan
if (isset($_POST['delete'])) {
    // Mengambil ID post dari parameter URL
    $id = $_POST['pekerjaan_id'];

    // Query untuk menghapus post berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM pekerjaan WHERE pekerjaan_id='$pekerjaan_id'");

    // Menyimpan notifikasi keberhasilan atau kegagalan ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Post succesfully deleted.'
        ];
    } else {
        $SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting post: ' . mysqli_error($conn)
        ];
    }

    // Arahkan ke halaman dashboard
    header('Location: dashboard.php');
    exit();
}

// Menangani pembaruan data postingan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Menangkap data dari form
    $postId = $_POST['post_id'];
    $postTitle = $_POST['post_title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category_id'];
    $imageDir = "assets/img/uploads/"; // Direktori penyimpanan gambar
    // Periksa apakah file gambar baru diunggah
    if (!empty($_FILES['image_path']['name'])) {
        $imageName = $_FILES['image_path']['name'];
        $imagePath = $imageDir . $imageName;

        // Pindahkan file baru ke direktori tujuan
        move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath);

        // Hapus gambar lama
        $queryOldImage = "SELECT image_path FROM posts WHERE id_post = $postId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) { // Menghapus file lama
                unlink($oldImage);
            }
        }
    } else {
        // Jika tidak ada file baru, gunakan gambar lama
        $queryPathQuery = "SELECT image_path FROM posts WHERE id_post = $postId";
        $result = $conn->query($queryPathQuery);
        if ($result->num_rows > 0) {
            $imagePath = $result->fetch_assoc()['image_path'];
        }
    }

    // Update data post dengan atau tanpa gambar
    $queryUpdate = "UPDATE posts SET post_title = '$postTitle', 
content = '$content', category_id = '$categoryId', 
image_path = '$imagePath' WHERE id_post = '$postId'";

    if ($conn->query($queryUpdate) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Postingan berhasil diperbarui.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui postingan.'
        ];
    }

    // Arahkan ke halaman dashboard
    header('Location: dashboard.php');
    exit();
}

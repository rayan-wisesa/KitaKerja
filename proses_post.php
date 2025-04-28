<?php
include 'config.php';
session_start();

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
    $id = $_POST['postID'];

    // Query untuk menghapus post berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM pekerjaan WHERE pekerjaan_id='$id'");

    // Menyimpan notifikasi keberhasilan atau kegagalan ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary', 'message' => 'Post successfully deleted.'];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger', 'message' => 'Error deleting post: ' . mysqli_error($conn)];
    }
    header('Location: dashboard.php');
    exit();
}

// Update pekerjaan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Menangkap data dari form
    $id = $_POST['postID'];
    $jobtitle = $_POST["nama_pekerjaan"];
    $gaji = $_POST["gaji"];
    $umur = $_POST["umur"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];

    $queryUpdate = "UPDATE pekerjaan SET nama_pekerjaan = '$jobtitle', gaji = '$gaji', umur = '$umur', pendidikan = '$pendidikan', alamat = '$alamat' WHERE pekerjaan_id='$id'";

    if ($conn->query($queryUpdate) === TRUE) {
        $_SESSION['notification'] = [
            'type' => 'success', 'message' => 'Postingan berhasil diperbarui.'];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger', 'message' => 'Gagal memperbarui postingan.'];
    }
    header('Location: dashboard.php');
    exit();
}
// Update pekerjaan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_pekerjaan'])) {
    $pekerjaanId = $_POST['pekerjaan_id'];
    $jobtitle    = $_POST['nama_pekerjaan'];
    $gaji        = $_POST['gaji'];
    $umur        = $_POST['umur'];
    $pendidikan  = $_POST['pendidikan'];
    $alamat      = $_POST['alamat'];
    $queryUpdatePekerjaan = "UPDATE pekerjaan SET 
                                nama_pekerjaan = '$jobtitle', 
                                gaji = '$gaji', 
                                umur = '$umur', 
                                pendidikan = '$pendidikan', 
                                alamat = '$alamat' 
                                WHERE pekerjaan_id = '$pekerjaanId'";
    if ($conn->query($queryUpdatePekerjaan) === TRUE) {
        $_SESSION['notification'] = ['type' => 'success', 'message' => 'Data pekerjaan berhasil diperbarui.'];
    } else {
        $_SESSION['notification'] = ['type' => 'danger', 'message' => 'Gagal memperbarui pekerjaan: ' . $conn->error];
    }
    header('Location: dashboard.php');
    exit();
}
?>

<?php
include 'config.php';
session_start();

$id = $_SESSION["perusahaan_id"];

// Tambah pekerjaan
    if (isset($_POST['simpan'])) {
        $jobtitle   = $_POST["job_title"];
        $gaji       = $_POST["gaji"];
        $umur       = $_POST["umur"];
        $pendidikan = $_POST["pendidikan"];
        $alamat     = $_POST["alamat"];
                $query = "INSERT INTO pekerjaan (nama_pekerjaan, perusahaan_id, gaji, umur, pendidikan, alamat, tanggal_post)
                VALUES ('$jobtitle','$id','$gaji','$umur','$pendidikan','$alamat', NOW())";
                header('location: dashboard.php');
                    exit();
                    }
            // Hapus pekerjaan
    if (isset($_POST['delete'])) {
        $idPost = $_POST['postID'];
        $exec = mysqli_query($conn, "DELETE FROM pekerjaan WHERE pekerjaan_id='$idPost'");
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
// Update postingan 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_postingan'])) {
    $postId     = $_POST['post_id'];
    $postTitle  = $_POST['post_title'];
    $content    = $_POST['content'];
    $categoryId = $_POST['category_id'];
    $imageDir   = "assets/img/uploads/";
    if (!empty($_FILES['image_path']['name'])) {
        $imageName = $_FILES['image_path']['name'];
        $imagePath = $imageDir . $imageName;
        move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath);
        $queryOldImage = "SELECT image_path FROM posts WHERE id_post = $postId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    } else {
        $queryPathQuery = "SELECT image_path FROM posts WHERE id_post = $postId";
            $result = $conn->query($queryPathQuery);
        if ($result->num_rows > 0) {
            $imagePath = $result->fetch_assoc()['image_path'];
        }
    }
    $queryUpdate = "UPDATE posts SET post_title='$postTitle', content='$content', category_id='$categoryId', image_path='$imagePath' WHERE id_post='$postId'";
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

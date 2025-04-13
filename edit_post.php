<?php
include 'config.php';
include '.includes/header.php';

$postId = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

$query = "SELECT * FROM pekerjaan WHERE pekerjaan_id = '$postId'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Post not found";
    exit();
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php" enctype="multipart/form-data">
                        <input type="hidden" name="pekerjaan_id" value="<?= $row['pekerjaan_id']; ?>">

                        <div class="mb-3">
                            <label for="nama_pekerjaan" class="form-label">Nama Pekerjaan</label>
                            <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" value="<?= htmlspecialchars($row['nama_pekerjaan']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="kisaran_gaji" class="form-label">Kisaran Gaji</label>
                            <input type="text" class="form-control" id="kisaran_gaji" name="kisaran_gaji" value="<?= htmlspecialchars($row['kisaran_gaji']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="usia_minimal" class="form-label">Usia Minimal</label>
                            <input type="number" class="form-control" id="usia_minimal" name="usia_minimal" value="<?= htmlspecialchars($row['usia_minimal']); ?>" required>
                        </div>

                        <div class="mb-3">
                        <label for="tingkat_pendidikan" class="form-label">Tingkat Pendidikan</label>
                    <select class="form-control" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
                    <option value="" selected disabled>Pilih salah satu</option>
                                <option value="S3">Doktor (S3)</option>
                                <option value="S2">Magister (S2)</option>
                                <option value="S1">Sarjana (S1)</option>
                                <option value="D1-D4">Diploma (D1 - D4)</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="SMP">SMP</option>
                                <option value="SD">SD</option>
                            </select> 
                    </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= htmlspecialchars($row['alamat']); ?>" required>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '.includes/footer.php';
?>

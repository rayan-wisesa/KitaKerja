<?php
// Menyertakan header halaman
include '.includes/header.php';
?>
<div class="container-xxl flex-grow-1 container p-y">
    <!-- Judul Halaman -->
    <div class="row">
        <!-- Form unyuk menambahkan postingan baru -->
        <div class="col-md-10">
            <div class="card-mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_post.php"
                        enctype="multipart/form-data">
                        <!-- Input untuk judul postingan -->
                        <div class="mb-3">
                            <label for="job_title" class="form-label">Nama Pekerjaan</label>
                            <input type="text" class="form-control" name="job_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="gaji" class="form-label">Kisaran Gaji</label>
                            <input type="text" class="form-control" name="gaji" required>
                        </div>
                        <!-- Textarea untuk konten postingan -->
                        <div class="mb-3">
                            <label for="umur" class="form-label">Usia Minimal</label>
                            <input type="number" class="form-control" name="umur" min="1" max="100" required>
                        </div>
                        <div class="mb-3">
                        <label for="pendidikan" class="form-label">Tingkat Pendidikan</label>
                            <select class="form-select" name="pendidikan" required>
                                <!-- Mengambil data kategori dari database untuk mengisi opsi dropdown -->
                                <option value="" selected disabled>Pilih salah satu</option>
                                <option value="S3">Doktor (S3)</option>
                                <option value="S2">Magister (S2)</option>
                                <option value="S1">Sarjana (S1)</option>
                                <option value="D1-D4">Diploma (D1 - D4)</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="SMP">SMP</option>
                                <option value="SD">SD</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <!-- Tombol Submit -->
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//   Menyertakan footer halaman
include '.includes/footer.php';
?>
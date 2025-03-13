<?php
include(".includes/header.php");
$titel = 'Dashboard';
include '.includes/toast_notification.php';

// Pastikan koneksi ke database ada
if (!isset($conn)) {
    die("Koneksi database tidak ditemukan.");
}

// Pastikan variabel userId ada dan dihindari SQL Injection
$userId = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Semua Perkerjaan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th>nama pekerjaan</th>
                            <th width="150px">Pilihan</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php
                    $index = 1;
                        $userId = intval($userId); // Menghindari SQL Injection
                        $query = "SELECT pekerjaan.nama_pekerjaan, lamaran.*
                            FROM lamaran
                            INNER JOIN pekerjaan ON lamaran.pekerjaan_id = pekerjaan.pekerjaan_id
                            WHERE lamaran.pelamar_id = $userId";
                            $exec = mysqli_query($conn, $query);
                            while ($lamaran = mysqli_fetch_assoc($exec)) :
?>

                        <tr>
                            <td class="text-center"><?= $index++; ?></td>
                            <td><?= htmlspecialchars($lamaran['pekerjaan_nama']); ?></td>
                            <td><?= htmlspecialchars($lamaran['perusahaan_nama'] ?? 'Tidak ada kategori'); ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="edit_post.php?lamaran_id=<?= $lamaran['id_lamaran']; ?>" class="dropdown-item">
                                            <i class="bx bx-edit-alt me-2"></i>Edit
                                        </a>
                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletePost_<?= $lamaran['id_lamaran']; ?>">
                                            <i class="bx bx-trash me-2"></i>Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Hapus Post -->
                        <div class="modal fade" id="deletePost_<?= $lamaran['id_lamaran']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Post?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_post.php" method="POST">
                                            <p>Tindakan ini tidak bisa dibatalkan</p>
                                            <input type="hidden" name="lamaran_id" value="<?= $lamaran['id_lamaran']; ?>">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; ?>

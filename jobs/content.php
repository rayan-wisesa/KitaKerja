<?php

include("../config.php");

$limit = 18;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$first_page = ($page > 1) ? ($page * $limit) - $limit : 0;

$previous = $page - 1;
$next = $page + 1;

$jobs = mysqli_query($conn, "SELECT 
                                            *
                                        FROM pekerjaan pekerjaan
                                        JOIN perusahaan perusahaan 
                                        ON pekerjaan.perusahaan_id = perusahaan.perusahaan_id");

$total_jobs = mysqli_num_rows($jobs);
$total_pages = ceil($total_jobs / $limit);
$number = $first_page + 1;

?>
<meta name="description" content="" />
<link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
<link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<script src="../assets/vendor/js/helpers.js"></script>
<script src="../assets/js/config.js"></script>

</head>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y mt-5">
        <div class="row mb-5">
            <?php
            $data_jobs = mysqli_query($conn, "select  *
                                        FROM pekerjaan pekerjaan
                                        JOIN perusahaan perusahaan 
                                        ON pekerjaan.perusahaan_id = perusahaan.perusahaan_id limit $first_page, $limit");
            while ($j = mysqli_fetch_array($data_jobs)) {
            ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><b><?php echo $j['nama_pekerjaan']; ?></b></h5>
                            <h5 class="card-title"><?php echo $j['nama_perusahaan']; ?></h5>
                            <div class="content-wrapper">
                                <p><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backpack" viewBox="0 0 16 16">
                                            <path d="M4.04 7.43a4 4 0 0 1 7.92 0 .5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14M4 9.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm1 .5v3h6v-3h-1v.5a.5.5 0 0 1-1 0V10z" />
                                            <path d="M6 2.341V2a2 2 0 1 1 4 0v.341c2.33.824 4 3.047 4 5.659v5.5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5V8a6 6 0 0 1 4-5.659M7 2v.083a6 6 0 0 1 2 0V2a1 1 0 0 0-2 0m1 1a5 5 0 0 0-5 5v5.5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5V8a5 5 0 0 0-5-5" />
                                        </svg></i> <?php echo $j['pendidikan']; ?></p>
                                <p><i class="bi bi-cash-stack"></i> Rp<?php echo $j['gaji']; ?></p>
                                <p><i class="bi bi-clipboard-check"></i> <?php echo $j['umur']; ?> Tahun</p>
                                <p><i class="bi bi-geo-fill"></i> <?php echo $j['alamat']; ?></p>
                            </div>
                            <a href="nyoba_doang.php?post_id=<?= $post['id_post']; ?>" class="btn btn-outline-primary">Lamar</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</div>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" <?php if ($page > 1) {
                                        echo "href='?page=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_pages; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($page < $total_pages) {
                                        echo "href='?page=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>
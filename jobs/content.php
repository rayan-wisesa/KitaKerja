<?php

include("../config.php");


$jobs = mysqli_query($conn, "SELECT 
                                            *
                                        FROM pekerjaan pekerjaan
                                        JOIN perusahaan perusahaan 
                                        ON pekerjaan.perusahaan_id = perusahaan.perusahaan_id");

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
            <?php foreach ($jobs as $j): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $j['nama_pekerjaan']; ?></h5>
                            <div class="content-wrapper">
                                <p><?php echo $j['pendidikan'];?></p>
                                <p><?php echo $j['nama_perusahaan'];?></p>
                            </div>
                            <a href="nyoba_doang.php?post_id=<?= $post['id_post']; ?>" class="btn btn-outline-primary">Lamar</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
        


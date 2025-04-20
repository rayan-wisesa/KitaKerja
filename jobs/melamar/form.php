<?php include("../../config.php");
session_start();

$id = $_SESSION["pelamar_id"];
$name = $_SESSION["nama_pelamar"];
$email = $_SESSION["email"];
// Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']);
}
if (empty($_SESSION["nama_pelamar"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silahkan Login Terlebih Dahulu!'
    ];
    //Jika user belum login, maka halaman akan pindah ke halaman login pelamar
    header ('Location: ../../auth/pelamar/login.php');
    exit();
}

$postIdToForm = $_GET['pekerjaan_id'];

$jobs = mysqli_query($conn, "SELECT *
                                        FROM pekerjaan
                                        WHERE pekerjaan_id = $postIdToForm ");

$j = mysqli_fetch_array($jobs)
?>

<meta name="description" content="" />
<link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />
<link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
<link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../../assets/css/demo.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<script src="../../assets/vendor/js/helpers.js"></script>
<script src="../../assets/js/config.js"></script>


<div class="container-xxl mt-5">
  <div class="content-wrapper m-5 p-5">
  <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                      <form action="form_proses.php" method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input readonly
                                type="text"
                                class="form-control"
                                id="basic-icon-default-fullname"
                                value="<?php echo $name; ?>"
                                placeholder="Nama Lengkap"
                                aria-label="Nama Lengkap"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Pekerjaan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                readonly
                                id="basic-icon-default-company"
                                value="<?php echo $j['nama_pekerjaan'];?>"
                                class="form-control"
                                placeholder="ACME Inc."
                                aria-label="ACME Inc."
                                aria-describedby="basic-icon-default-company2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                readonly
                                id="basic-icon-default-email"
                                value="<?php echo $email; ?>"
                                class="form-control"
                                placeholder="john.doe"
                                aria-label="john.doe"
                                aria-describedby="basic-icon-default-email2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nomor HP</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                name="no_hp"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="62 8xx xxxx xxxx"
                                aria-label="62 8xx xxxx xxxx"
                                aria-describedby="basic-icon-default-phone2"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-message">Pesan</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-message2" class="input-group-text"
                                ><i class="bx bx-comment"></i
                              ></span>
                              <textarea
                                id="basic-icon-default-message"
                                name="pesan"
                                class="form-control"
                                aria-label="pesan"
                                aria-describedby="basic-icon-default-message2"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
                            <input type="hidden" name="pekerjaan_id" value="<?= $postIdToForm; ?>">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
  </div>
</div>

<script>
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

<?php include(".layouts/header.php"); ?>
<!-- Register Card -->
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo"></span>
        <span class="app-brand-text demo fw-bolder">kitakerja</span>
      </a>
    </div>
    <!-- /Logo -->
    <form class="mb-3 needs-validation" novalidate action="register_process.php" method="POST">
      <div class="mb-3">
        <label for="validationCustom01" class="form-label">Email</label>
        <input id="validationCustom01" type="email" class="form-control" name="email"
          placeholder="Masukkan email anda" autofocus required />
        <div class="invalid-feedback">
          Masukkan email anda.
        </div>
      <div class="mb-3">
        <label for="validationCustom02" class="form-label">Username</label>
        <input id="validationCustom02" type="text" class="form-control" name="nama_pelamar"
          placeholder="Masukkan username" autofocus required />
        <div class="invalid-feedback">
          Masukkan username yang anda inginkan.
        </div>
      </div>
      <div class="mb-3">
        <label for="validationCustom03" class="form-label">Password</label>
        <input id="validationCustom03" type="password" class="form-control" name="password"
          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
        <div class="invalid-feedback">
          Masukkan password anda.
        </div>
      </div>
      
      <div class="mb-3">
        <button id="submit" class="btn btn-dark d-grid w-100" type="submit">Daftar</button>
      </div>
    </form>
    <p class="text-center">
      <span>Sudah memiliki akun?</span><a href="login.php"><span> Masuk</span></a>
    </p>
  </div>
</div>

<script>
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

<!-- Register Card -->
<?php include(".layouts/footer.php"); ?>
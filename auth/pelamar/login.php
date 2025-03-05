<?php include(".layouts/header.php"); ?>
<!-- Register -->
<div class="card">
  <div class="card-body">
    <!-- Logo -->
    <div class="app-brand justify-content-center">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-text demo fw-bolder">KitaKerja</span>
      </a>
    </div>
    <!-- /Logo -->
    <h4 class="mb-2">Selamat datang di kitakerja</h4>
    <form class="mb-3" action="login_auth.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" id="email" class="form-control" name="email"
          placeholder="Masukkan email anda" autofocus required />
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Password</label>
        </div>
        <div class="input-group input-group-merge">
          <input type="password" id="password" class="form-control" name="password"
            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
            aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-3">
        <button id="submit" class="btn btn-dark d-grid w-100" type="submit">Masuk</button>
      </div>
    </form>
    <p class="text-center">
      <span>Belum punya akun?</span><a href="register.php"><span> Daftar</span></a>
    </p>
  </div>
</div>
<script>
  let submitBtn = document.getElementById('submit');
  let formEmail = document.getElementById('email');
  let formPassword = document.getElementById('password');

  let formAll = (formEmail, formPassword);

  formAll.addEventListener("change", buttonenabler);

  submitBtn.setAttribute("disabled", true);

  let isValid = true;
function buttonenabler(){

    if (formEmail == "") {
        isValid = false;
    } else {
      isValid = true;
    }

    if (formPassword == "") {
        isValid = false;
    } else {
      isValid = true;
    }
    
    if (isValid === true) {
      submitBtn.removeAttribute("disabled");
    }

    if (isValid === false){
      submitBtn.setAttribute("disabled", true);
    }

}
  
        

</script>
<!-- /Register -->
<?php include(".layouts/footer.php"); ?>
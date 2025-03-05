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
    <form action="register_process.php" class="mb-3" method="POST">
      <div class="mb-3">
        <label for="nama_pelamar" class="form-label">Username</label>
        <input type="text" class="form-control" id = "name" name="nama_pelamar" placeholder="Masukkan Username" autofocus/>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id ="email" name="email" placeholder="Masukkan Email" />
      </div>
      <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" class="form-control" id="password" name="password"
          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
      </div>
      <button id="submit" class="btn btn-dark d-grid w-100">Daftar</button>
    </form>
    <p class="text-center">
      <span>Sudah memiliki akun?</span><a href="login.php"><span> Masuk</span></a>
    </p>
  </div>
</div>
<script>
  let submitBtn = document.getElementById('submit');
  let formName = document.getElementById('name');
  let formEmail = document.getElementById('email');
  let formPassword = document.getElementById('password');

  let formAll = (formEmail, formName, formPassword);

  formAll.addEventListener("change", buttonenabler);

  submitBtn.setAttribute("disabled", true);

  let isValid = true;
function buttonenabler(){
  if (formName == "") {
        isValid = false;
    } else {
      isValid = false;
    }

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
<!-- Register Card -->
<?php include(".layouts/footer.php"); ?>
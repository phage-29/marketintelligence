<?php
$page = "Login";
require_once "components/header.php";
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?= $website ?></span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 ajax-form">

                  <div class="col-12">
                    <label for="Username" class="form-label">Username</label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                      <input type="text" name="Username" class="form-control" id="Username" required>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <div class="input-group">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                      <input type="password" name="Password" class="form-control" id="Password" required>
                      <div class="invalid-feedback"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="ShowPassword">
                      <label class="custom-control-label" for="ShowPassword">Show Password</label>
                      <a href="#" class="float-end text-primary">Forgot pwd?</a>
                    </div>
                  </div>

                  <div class="col-12">
                    <input type="hidden" name="Login" />
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="javascript:void(0)">TinyHacker</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
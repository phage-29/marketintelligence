<?php
$page = "Success Factors";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>
<main id="main" class="main">
  <section class="section container">
    <div class="row">
      <div class="col-lg-12 align-self-center">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= $page ?></h5>
            <div class="accordion" id="sfmain">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Title
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#sfmain">
                  <div class="accordion-body">
                    <div class="d-none d-sm-none d-md-block">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Success Factor Subs</th>
                            <th scope="col" class="text-center" style="width: 8vw;">Very High
                            </th>
                            <th scope="col" class="text-center" style="width: 8vw;">High</th>
                            <th scope="col" class="text-center" style="width: 8vw;">Fair</th>
                            <th scope="col" class="text-center" style="width: 8vw;">Low</th>
                            <th scope="col" class="text-center" style="width: 8vw;">Very Low
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">
                              #
                            </th>
                            <td>
                              Self-confidence - PEC1
                            </td>
                            <td class="text-center"><input type="radio" class="form-check-input fs-2" value="5" name="ans" required></td>
                            <td class="text-center"><input type="radio" class="form-check-input fs-2" value="4" name="ans"></td>
                            <td class="text-center"><input type="radio" class="form-check-input fs-2" value="3" name="ans"></td>
                            <td class="text-center"><input type="radio" class="form-check-input fs-2" value="2" name="ans"></td>
                            <td class="text-center"><input type="radio" class="form-check-input fs-2" value="1" name="ans"></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                    <div class="d-block d-sm-block d-md-none">
                      <p>Self-confidence - PEC1</p>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
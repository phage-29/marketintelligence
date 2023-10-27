<?php
$page = "SWOT Analysis";
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
            <h5 class="card-title">
              <?= $page ?>
            </h5>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    Strengths (S)
                    <button class="btn btn-link float-end p-0 m-0"><strong><i class="bi bi-plus"></i></strong></button>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>Strength 1</li>
                      <li>Strength 2</li>
                      <li>Strength 3</li>
                      <!-- Add more strengths here -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    Weaknesses (W)
                    <button class="btn btn-link float-end p-0 m-0"><strong><i class="bi bi-plus"></i></strong></button>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>Weakness 1</li>
                      <li>Weakness 2</li>
                      <li>Weakness 3</li>
                      <!-- Add more weaknesses here -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    Opportunities (O)
                    <button class="btn btn-link float-end p-0 m-0"><strong><i class="bi bi-plus"></i></strong></button>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>Opportunity 1</li>
                      <li>Opportunity 2</li>
                      <li>Opportunity 3</li>
                      <!-- Add more opportunities here -->
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    Threats (T)
                    <button class="btn btn-link float-end p-0 m-0"><strong><i class="bi bi-plus"></i></strong></button>
                  </div>
                  <div class="card-body">
                    <ul>
                      <li>Threat 1</li>
                      <li>Threat 2</li>
                      <li>Threat 3</li>
                      <!-- Add more threats here -->
                    </ul>
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
<?php
$page = "MSME";
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
            <form id="MSME">
              <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" required />
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-lg-4">
                  <label for="FirstName" class="form-label">First Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="FirstName" name="FirstName"
                      placeholder="Enter First Name" required />
                  </div>
                </div>
                <div class="mb-3 col-lg-4">
                  <label for="MiddleName" class="form-label">Middle Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="MiddleName" name="MiddleName"
                      placeholder="Enter Middle Name">
                  </div>
                </div>
                <div class="mb-3 col-lg-4">
                  <label for="LastName" class="form-label">Last Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter Last Name"
                      required />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-lg-6">
                  <label for="Province" class="form-label">Province</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <select class="form-select" id="Province" name="Province" required>
                      <option value="" class="text-muted" selected disabled>--Select a Province--</option>
                      <option value="Aklan">Aklan</option>
                      <option value="Antique">Antique</option>
                      <option value="Capiz">Capiz</option>
                      <option value="Guimaras">Guimaras</option>
                      <option value="Iloilo">Iloilo</option>
                      <option value="Negros Occidental">Negros Occidental</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="Phone" class="form-label">Phone</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone" required />
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="IndustryCluster" class="form-label">Industry Cluster</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                  <select class="form-select" id="IndustryCluster" name="IndustryCluster" required>
                    <option value="" class="text-muted" selected disabled>--Select an Industry Cluster--</option>
                    <option value="Abaca">Abaca</option>
                    <option value="Agribusiness">Agribusiness</option>
                    <option value="Bamboo">Bamboo</option>
                    <option value="Cacao">Cacao</option>
                    <option value="Coco Coir">Coco Coir</option>
                    <option value="Coconut">Coconut</option>
                    <option value="Coffee">Coffee</option>
                    <option value="Construction">Construction</option>
                    <option value="Creative Industry">Creative Industry</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Fish and Fish Products">Fish and Fish Products</option>
                    <option value="High Value Vegetables">High Value Vegetables</option>
                    <option value="ICT">ICT</option>
                    <option value="Mfg Aerospace Parts">Mfg Aerospace Parts</option>
                    <option value="Mfg Agribusiness Bamboo">Mfg Agribusiness Bamboo</option>
                    <option value="Mfg Agribusiness Cacao">Mfg Agribusiness Cacao</option>
                    <option value="Mfg Agribusiness Coconut">Mfg Agribusiness Coconut</option>
                    <option value="Mfg Agribusiness Coffee">Mfg Agribusiness Coffee</option>
                    <option value="Mfg Agribusiness Palm Oil">Mfg Agribusiness Palm Oil</option>
                    <option value="Mfg Agribusiness Rubber">Mfg Agribusiness Rubber</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="BusinessName" class="form-label">Business Name</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-building"></i></span>
                  <input type="text" class="form-control" id="BusinessName" name="BusinessName"
                    placeholder="Enter Business Name" required />
                </div>
              </div>
              <div class="mb-3">
                <input type="hidden" name="MSME" />
                <button type="submit" class="btn btn-primary float-end">Next</button>
                <button type="button" class="btn btn-outline-primary float-end mx-3" data-bs-toggle="modal"
                  data-bs-target="#emailModal">Auto Fill</button>
              </div>
            </form>
            <!-- Enter Email Modal -->
          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
<?php
$page = "MSME";
require_once "includes/msme_session.php";
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
            <h5 class="card-title"><?= $page ?> Profile</h5>
            <form id="MSME">
              <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" id="Email" name="Email" value="<?= isset($acc) ? $acc->Email : '' ?>" placeholder="Enter Email" required />
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-lg-4">
                  <label for="FirstName" class="form-label">First Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?= isset($acc) ? $acc->FirstName : '' ?>" placeholder="Enter First Name" required />
                  </div>
                </div>
                <div class="mb-3 col-lg-4">
                  <label for="MiddleName" class="form-label">Middle Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="MiddleName" name="MiddleName" value="<?= isset($acc) ? $acc->MiddleName : '' ?>" placeholder="Enter Middle Name">
                  </div>
                </div>
                <div class="mb-3 col-lg-4">
                  <label for="LastName" class="form-label">Last Name</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="LastName" name="LastName" value="<?= isset($acc) ? $acc->LastName : '' ?>" placeholder="Enter Last Name" required />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-lg-6">
                  <label for="Phone" class="form-label">Phone</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="tel" class="form-control" id="Phone" name="Phone" value="<?= isset($acc) ? $acc->Phone : '' ?>" placeholder="Enter Phone" required />
                  </div>
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="Province" class="form-label">Province</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <select class="form-select" id="Province" name="Province" required>
                      <option value="" class="text-muted" selected disabled>--Select a Province--</option>
                      <option value="Aklan" <?= isset($acc) && $acc->Province == "Aklan" ? 'selected' : '' ?>>Aklan</option>
                      <option value="Antique" <?= isset($acc) && $acc->Province == "Antique" ? 'selected' : '' ?>>Antique</option>
                      <option value="Capiz" <?= isset($acc) && $acc->Province == "Capiz" ? 'selected' : '' ?>>Capiz</option>
                      <option value="Guimaras" <?= isset($acc) && $acc->Province == "Guimaras" ? 'selected' : '' ?>>Guimaras</option>
                      <option value="Iloilo" <?= isset($acc) && $acc->Province == "Iloilo" ? 'selected' : '' ?>>Iloilo</option>
                      <option value="Negros Occidental" <?= isset($acc) && $acc->Province == "Negros Occidental" ? 'selected' : '' ?>>Negros Occidental</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="IndustryCluster" class="form-label">Industry Cluster</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                  <select class="form-select" id="IndustryCluster" name="IndustryCluster" required>
                    <option value="" class="text-muted" selected disabled>--Select an Industry Cluster--</option>
                    <option value="Abaca" <?= isset($acc) && $acc->IndustryCluster == "Abaca" ? 'selected' : '' ?>>Abaca</option>
                    <option value="Agribusiness" <?= isset($acc) && $acc->IndustryCluster == "Agribusiness" ? 'selected' : '' ?>>Agribusiness</option>
                    <option value="Bamboo" <?= isset($acc) && $acc->IndustryCluster == "Bamboo" ? 'selected' : '' ?>>Bamboo</option>
                    <option value="Cacao" <?= isset($acc) && $acc->IndustryCluster == "Cacao" ? 'selected' : '' ?>>Cacao</option>
                    <option value="Coco Coir" <?= isset($acc) && $acc->IndustryCluster == "Coco Coir" ? 'selected' : '' ?>>Coco Coir</option>
                    <option value="Coconut" <?= isset($acc) && $acc->IndustryCluster == "Coconut" ? 'selected' : '' ?>>Coconut</option>
                    <option value="Coffee" <?= isset($acc) && $acc->IndustryCluster == "Coffee" ? 'selected' : '' ?>>Coffee</option>
                    <option value="Construction" <?= isset($acc) && $acc->IndustryCluster == "Construction" ? 'selected' : '' ?>>Construction</option>
                    <option value="Creative Industry" <?= isset($acc) && $acc->IndustryCluster == "Creative Industry" ? 'selected' : '' ?>>Creative Industry</option>
                    <option value="Dairy" <?= isset($acc) && $acc->IndustryCluster == "Dairy" ? 'selected' : '' ?>>Dairy</option>
                    <option value="Fish and Fish Products" <?= isset($acc) && $acc->IndustryCluster == "Fish and Fish Products" ? 'selected' : '' ?>>Fish and Fish Products</option>
                    <option value="High Value Vegetables" <?= isset($acc) && $acc->IndustryCluster == "High Value Vegetables" ? 'selected' : '' ?>>High Value Vegetables</option>
                    <option value="ICT" <?= isset($acc) && $acc->IndustryCluster == "ICT" ? 'selected' : '' ?>>ICT</option>
                    <option value="Mfg Aerospace Parts" <?= isset($acc) && $acc->IndustryCluster == "Mfg Aerospace Parts" ? 'selected' : '' ?>>Mfg Aerospace Parts</option>
                    <option value="Mfg Agribusiness Bamboo" <?= isset($acc) && $acc->IndustryCluster == "Mfg Agribusiness Bamboo" ? 'selected' : '' ?>>Mfg Agribusiness Bamboo</option>
                    <option value="Mfg Agribusiness Cacao" <?= isset($acc) && $acc->IndustryCluster == "Mfg Agribusiness Cacao" ? 'selected' : '' ?>>Mfg Agribusiness Cacao</option>
                    <option value="Mfg Agribusiness Coconut" <?= isset($acc) && $acc->IndustryCluster == "Mfg Agribusiness Coconut" ? 'selected' : '' ?>>Mfg Agribusiness Coconut</option>
                    <option value="Mfg Agribusiness Coffee" <?= isset($acc) && $acc->IndustryCluster == "Processed Fruits an Nuts" ? 'selected' : '' ?>>Processed Fruits an Nuts</option>
                    <option value="Processed Fruits an Nuts" <?= isset($acc) && $acc->IndustryCluster == "Processed Fruits an Nuts" ? 'selected' : '' ?>>Processed Fruits an Nuts</option>
                    <option value="Wearables and Homestyle" <?= isset($acc) && $acc->IndustryCluster == "Wearables and Homestyle" ? 'selected' : '' ?>>Wearables and Homestyle</option>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="BusinessName" class="form-label">Business Name</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-building"></i></span>
                  <input type="text" class="form-control" id="BusinessName" name="BusinessName" value="<?= isset($acc) ? $acc->BusinessName : '' ?>" placeholder="Enter Business Name" required />
                </div>
              </div>
              <div class="mb-3 text-end">
                <input type="hidden" name="MSME" />
                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary">View Scorecard</button>
                <button type="button" onclick="location='includes/clear.php'" class="btn btn-secondary">Clear</button>
                <button type="submit" class="btn btn-primary">Next</button>
                <!-- Button trigger modal -->
              </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Scorecard</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="scorecard">
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="email" name="Email" placeholder="Enter Email">
                    </div>
                    <input type="hidden" name="viewScorecard"/>
                    <input type="submit" id="viewScorecard" hidden>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="viewScorecard.click()">View</button>
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
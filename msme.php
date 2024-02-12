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
        <div>
          <p><strong>Directions:</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde voluptatum quae aut distinctio iste, itaque qui commodi enim, optio expedita vero aliquam iure? Placeat provident dicta obcaecati velit asperiores voluptate?</p>
        </div>
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
                    <?php
                    $query = $conn->query("SELECT * FROM industryclusters");
                    while ($row = $query->fetch_object()) {
                    ?>
                      <option value="<?= $row->IndustryCluster ?>" <?= isset($acc) && $acc->IndustryCluster == $row->IndustryCluster ? 'selected' : '' ?>><?= $row->IndustryCluster ?></option>
                    <?php
                    }
                    ?>
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
              <div class="row">
                <div class="mb-3 col-lg-6">
                  <label for="EDTLevel" class="form-label">EDT Level</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <select class="form-select" id="EDTLevel" name="EDTLevel" required>
                      <option value="" class="text-muted" selected disabled>--Select a EDT Level--</option>
                      <option value="Level 0 - Entrepreneurial Mind Setting" <?= isset($acc) && $acc->EDTLevel == "Level 0 - Entrepreneurial Mind Setting" ? 'selected' : '' ?>>Level 0 - Entrepreneurial Mind Setting</option>
                      <option value="Level 1.1 - Nurturing Start Up (Not registered)" <?= isset($acc) && $acc->EDTLevel == "Level 1.1 - Nurturing Start Up (Not registered)" ? 'selected' : '' ?>>Level 1.1 - Nurturing Start Up (Not registered)</option>
                      <option value="Level 1.1 - Nurturing Start Up (Partially registered)" <?= isset($acc) && $acc->EDTLevel == "Level 1.1 - Nurturing Start Up (Partially registered)" ? 'selected' : '' ?>>Level 1.1 - Nurturing Start Up (Partially registered)</option>
                      <option value="Level 2 - Growing Enterprises" <?= isset($acc) && $acc->EDTLevel == "Level 2 - Growing Enterprises" ? 'selected' : '' ?>>Level 2 - Growing Enterprises</option>
                      <option value="Level 3 - Expanding Enterprises" <?= isset($acc) && $acc->EDTLevel == "Level 3 - Expanding Enterprises" ? 'selected' : '' ?>>Level 3 - Expanding Enterprises</option>
                      <option value="Level 4 - Sustaining Enterprises" <?= isset($acc) && $acc->EDTLevel == "Level 4 - Sustaining Enterprises" ? 'selected' : '' ?>>Level 4 - Sustaining Enterprises</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 col-lg-6">
                  <label for="AssetSize" class="form-label">Asset Size</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    <select class="form-select" id="AssetSize" name="AssetSize" required>
                      <option value="" class="text-muted" selected disabled>--Select a AssetSize--</option>
                      <option value="Below 100,000.00php" <?= isset($acc) && $acc->AssetSize == "Below 100,000.00php" ? 'selected' : '' ?>>Below 100,000.00php</option>
                      <option value="100,001.00php - 500,000.00php" <?= isset($acc) && $acc->AssetSize == "100,001.00php - 500,000.00php" ? 'selected' : '' ?>>100,001.00php - 500,000.00php</option>
                      <option value="500,001.00php - 1,500,000.00php" <?= isset($acc) && $acc->AssetSize == "500,001.00php - 1,500,000.00php" ? 'selected' : '' ?>>500,001.00php - 1,500,000.00php</option>
                      <option value="1,500,001.00php - 3,000,000.00php" <?= isset($acc) && $acc->AssetSize == "1,500,001.00php - 3,000,000.00php" ? 'selected' : '' ?>>1,500,001.00php - 3,000,000.00php</option>
                      <option value="3,000,001.00php - 5,000,000.00php" <?= isset($acc) && $acc->AssetSize == "3,000,001.00php - 5,000,000.00php" ? 'selected' : '' ?>>3,000,001.00php - 5,000,000.00php</option>
                      <option value="5,000,000.01php - 10,000,000.00php" <?= isset($acc) && $acc->AssetSize == "5,000,000.01php - 10,000,000.00php" ? 'selected' : '' ?>>5,000,000.01php - 10,000,000.00php</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="mb-3 text-end">
                <input type="hidden" name="MSME" />
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-primary">View Scorecard</button>
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
                      <input type="hidden" name="viewScorecard" />
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
<?php
$page = "SWOT Analysis";
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
            <h5 class="card-title"><?= $page ?></h5>
            <div class="row">
              <?php
              $query = "SELECT distinct(`Category`) from `swots`";
              $result = $conn->execute_query($query);
              while ($row = $result->fetch_object()) {
              ?>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <?= $row->Category ?> (<?= $row->Category[0] ?>)
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add<?= $row->Category ?>Modal">
                        Add
                      </button>
                    </div>
                    <div class="card-body" style="height: 300px;overflow-y: scroll;">
                      <ul>
                        <?php
                        $query2 = "SELECT * FROM assessments ass LEFT JOIN swots ON ass.SWOTID = swots.id WHERE ass.SWOTID IS NOT NULL AND ass.MSMEID = ? AND swots.Category = ?";
                        $result2 = $conn->execute_query($query2, [$acc->id, $row->Category]);
                        while ($row2 = $result2->fetch_object()) {
                        ?>
                          <li class="d-flex justify-content-between align-items-center mt-3">
                            <?= $row2->Name ?>
                            <button type="button" class="btn btn-sm btn-danger del-swot" data-id="<?= $row2->id ?>" data-msmeid="<?= $acc->id ?>" data-category="<?= $row->Category ?>">X</button>
                          </li>
                        <?php
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- Add Selection Modal -->
                <div class="modal fade" id="add<?= $row->Category ?>Modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Select <?= $row->Category ?> to Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <ul class="list-group" id="hideList">
                          <?php
                          $query2 = "SELECT * FROM swots WHERE Category = ? AND id NOT IN (SELECT SWOTID FROM assessments WHERE MSMEID = ? AND SWOTID IS NOT NULL)";
                          $result2 = $conn->execute_query($query2, [$row->Category, $acc->id]);
                          while ($row2 = $result2->fetch_object()) {
                          ?>
                            <li class="d-flex justify-content-between align-items-center mt-3">
                              <?= $row2->Name ?>
                              <button type="button" class="btn btn-sm btn-primary add-swot" data-id="<?= $row2->id ?>" data-msmeid="<?= $acc->id ?>" data-category="<?= $row->Category ?>">+</button>
                            </li>
                          <?php
                          }
                          ?>
                        </ul>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
            <div class="mb-3 text-end">
              <a class="btn btn-primary my-2" href="msme.php">Previous</a>
              <a class="btn btn-primary my-2" href="competitors-features.php">Next</a>
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
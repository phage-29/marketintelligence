<?php
$page = "Success Factors";
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
            <h5 class="card-title"><?= $page ?></h5>
            <div class="accordion" id="sfmain">
              <?php
              $query = "SELECT * FROM sfmains";
              $result = $conn->execute_query($query, []);
              while ($row = $result->fetch_object()) {
              ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?= $row->id ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $row->id ?>" aria-expanded="true" aria-controls="collapse<?= $row->id ?>">
                    <?= $row->Name ?> - <?= $row->Description ?>
                    </button>
                  </h2>
                  <div id="collapse<?= $row->id ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?= $row->id ?>" data-bs-parent="#sfmain">
                    <div class="accordion-body">
                      <div class="d-none d-sm-none d-md-block">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Factors</th>
                              <th scope="col" class="text-center" style="width: 8vw;">Very High</th>
                              <th scope="col" class="text-center" style="width: 8vw;">High</th>
                              <th scope="col" class="text-center" style="width: 8vw;">Average</th>
                              <th scope="col" class="text-center" style="width: 8vw;">Low</th>
                              <th scope="col" class="text-center" style="width: 8vw;">Very Low</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query2 = "SELECT * FROM sfsubmains WHERE SFMID=?";
                            $result2 = $conn->execute_query($query2, [$row->id]);
                            while ($row2 = $result2->fetch_object()) {
                              $query = "SELECT * FROM assessments WHERE MSMEID = ? AND SFMID = ? AND SFSID = ? AND Value = ?";
                            ?>
                              <form class="sf-assessment">
                                <tr>
                                  <td>
                                    <?= $row2->Name ?> - <?= $row2->Description ?>
                                    <input type="hidden" name="MSMEID" value="<?= $acc->id ?>" />
                                    <input type="hidden" name="SFMID" value="<?= $row->id ?>" />
                                    <input type="hidden" name="SFSID" value="<?= $row2->id ?>" />
                                  </td>
                                  <td class="text-center">
                                    <input type="radio" class="form-check-input fs-2" value="5" name="Value" onclick="document.getElementById('sf-assessment<?= $row2->id ?>').click()" <?= $conn->execute_query($query, [$acc->id, $row->id, $row2->id, '5'])->num_rows ? 'checked' : '' ?> required>
                                  </td>
                                  <td class="text-center">
                                    <input type="radio" class="form-check-input fs-2" value="4" name="Value" onclick="document.getElementById('sf-assessment<?= $row2->id ?>').click()" <?= $conn->execute_query($query, [$acc->id, $row->id, $row2->id, '4'])->num_rows ? 'checked' : '' ?>>
                                  </td>
                                  <td class="text-center">
                                    <input type="radio" class="form-check-input fs-2" value="3" name="Value" onclick="document.getElementById('sf-assessment<?= $row2->id ?>').click()" <?= $conn->execute_query($query, [$acc->id, $row->id, $row2->id, '3'])->num_rows ? 'checked' : '' ?>>
                                  </td>
                                  <td class="text-center">
                                    <input type="radio" class="form-check-input fs-2" value="2" name="Value" onclick="document.getElementById('sf-assessment<?= $row2->id ?>').click()" <?= $conn->execute_query($query, [$acc->id, $row->id, $row2->id, '2'])->num_rows ? 'checked' : '' ?>>
                                  </td>
                                  <td class="text-center">
                                    <input type="radio" class="form-check-input fs-2" value="1" name="Value" onclick="document.getElementById('sf-assessment<?= $row2->id ?>').click()" <?= $conn->execute_query($query, [$acc->id, $row->id, $row2->id, '1'])->num_rows ? 'checked' : '' ?>>
                                  </td>
                                  <td class="text-center" hidden>
                                    <input type="text" name="AddSFAssessment">
                                    <input type="submit" value="Submit" id="sf-assessment<?= $row2->id ?>">
                                  </td>
                                </tr>
                              </form>
                            <?php
                            }
                            ?>
                          </tbody>
                        </table>
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
              <a class="btn btn-primary my-2" id="nextButton" href="swot-analysis.php" style="display: none;">Next</a>
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
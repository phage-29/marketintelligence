<?php
$page = "Competitors Features";
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
            <form method="POST">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Competitor-feature comparison card</th>
                    <th class="text-center">
                      <?= $acc->BusinessName ?>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query  = "SELECT * FROM `cfmains`";
                  $result = $conn->query($query);
                  while ($row = $result->fetch_object()) {
                  ?>
                    <tr>
                      <th class="text-center" title="<?= $row->Description ?>">
                        <?= $row->Name ?>
                      </th>
                      <th width="50px">
                        <br>
                      </th>
                    </tr>
                    <?php
                    $query2  = "SELECT * FROM `cfsubmains` WHERE `CFMID`='$row->id'";
                    $result2 = $conn->query($query2);
                    while ($row2 = $result2->fetch_object()) {
                      $CfsId     = $row2->id;
                      $check_ass = "SELECT * FROM `assessments` WHERE `MSMEID`='$acc->id' AND `CFMID`='$row->id' AND `CFSID`='$row2->id'";
                      $cf_exist  = $conn->query($check_ass)->num_rows;
                    ?>
                      <tr>
                        <td title="<?= $row2->Description ?>">
                          <?= $row2->Name ?>
                          <button type="button" data-msmeid="<?= $acc->id ?>" data-cfmid="<?= $row->id ?>" data-cfsid="<?= $row2->id ?>" id="Add_<?= $CfsId ?>" class="btn btn-success float-end add-cf">Add</button>
                          <button type="button" data-msmeid="<?= $acc->id ?>" data-cfmid="<?= $row->id ?>" data-cfsid="<?= $row2->id ?>" id="Remove_<?= $CfsId ?>" class="btn btn-danger float-end del-cf" style="display: none;">Remove</button>
                          <input type="checkbox" id="cfs_<?= $CfsId ?>" name="cfs_<?= $CfsId ?>" style="visibility: hidden;" />
                        </td>

                        <td id="indicator_<?= $CfsId ?>" style="background: red">
                          <br>
                        </td>
                      </tr>
                      <script>
                        $(document).ready(function() {

                          $("#Add_<?= $CfsId ?>").on("click", function() {
                            $("#indicator_<?= $CfsId ?>").css('background', 'green');
                            $("#Remove_<?= $CfsId ?>").show();
                            $("#Add_<?= $CfsId ?>").hide();
                            $("#cfs_<?= $CfsId ?>").attr('checked', 'true');
                          });
                          $("#Remove_<?= $CfsId ?>").on("click", function() {
                            $("#indicator_<?= $CfsId ?>").css('background', 'red');
                            $("#Remove_<?= $CfsId ?>").hide();
                            $("#Add_<?= $CfsId ?>").show();
                            $("#cfs_<?= $CfsId ?>").removeAttr('checked');
                          });

                          var a = <?= $cf_exist ?>;
                          if (a > 0) {
                            console.log("<?= $CfsId ?> exist");
                            $("#Add_<?= $CfsId ?>").click();
                          }
                        });
                      </script>
                    <?php
                    }
                    ?>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
              <div class="text-end mt-3">
                <a class="btn btn-primary" href="swot-analysis.php">Previous</a>
                <a href="generated-scorecard.php" class="btn btn-primary" name="sub_cf">Generate Scorecard</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
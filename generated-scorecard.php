<?php
$page = "SWOT Analysis";
require_once "includes/msme_session.php";
require_once "components/header.php";
?>
<main class="main">
    <section class="section container profile mt-4">
        <div class="row">
            <div class="col-lg-12 align-self-center">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MSME Profile</h5>
                        <div class="row">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->FirstName ?> <?= $acc->MiddleName ?> <?= $acc->LastName ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->Email ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Phone</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->Phone ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Province</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->Province ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Industry Cluster</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->IndustryCluster ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Business Name</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->BusinessName ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">Success Factors</h5>
                        <div class="row">
                            <?php
                            $query = "SELECT * FROM sfmains";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_object()){
                                ?><p><?= $row->Name ?> | <?= $row->Description ?></p><?php
                            }
                            ?>
                        </div>
                        <h5 class="card-title">SWOT Analysis</h5>
                        <div class="row">
                            <?php
                            $query = "SELECT distinct(`Category`) from `swots`";
                            $result = $conn->execute_query($query);
                            while ($row = $result->fetch_object()) {
                            ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <?= $row->Category ?> (<?= $row->Category[0] ?>)
                                        </div>
                                        <div class="card-body" style="height: 300px;overflow-y: auto;">
                                            <ul>
                                                <?php
                                                $query2 = "SELECT * FROM assessments ass LEFT JOIN swots ON ass.SWOTID = swots.id WHERE ass.SWOTID IS NOT NULL AND ass.MSMEID = ? AND swots.Category = ?";
                                                $result2 = $conn->execute_query($query2, [$acc->id, $row->Category]);
                                                while ($row2 = $result2->fetch_object()) {
                                                ?>
                                                    <li class="mt-3">
                                                        <?= $row2->Name ?>
                                                    </li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <h5 class="card-title">Competitors Features</h5>
                        <div class="row">
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
                                            <th class="text-center">
                                                <?= $row->Name ?>
                                            </th>
                                            <th>
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
                                                <td>
                                                    <?= $row2->Name ?>
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
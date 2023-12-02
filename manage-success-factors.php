<?php
$page = "Success Factors";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $page ?> Main</h5>
                    <!-- Button to trigger the modal -->
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-sfm-modal"> Add Success Factor Main </button>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="add-sfm-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manual and CSV Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-manual-tab" data-bs-toggle="tab" data-bs-target="#nav-manual" type="button" role="tab" aria-controls="nav-manual" aria-selected="true">Manual</button>
                                            <button class="nav-link" id="nav-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-csv" type="button" role="tab" aria-controls="nav-csv" aria-selected="false">CSV</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                                            <form class="manual-form">
                                                <div class="mb-3">
                                                    <label class="form-label">Name:</label>
                                                    <input type="text" class="form-control" name="Name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description:</label>
                                                    <input type="text" class="form-control" name="Description" required>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Rank:</label>
                                                        <input type="number" class="form-control" name="Rank" required>
                                                    </div>
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Weight:</label>
                                                        <input type="number" step="0.01" class="form-control" name="Weight" required>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSFM" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-csv" role="tabpanel" aria-labelledby="nav-csv-tab">
                                            <form class="csv-form" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Choose a CSV file:</label>
                                                    <input type="file" class="form-control" name="CSVFile" accept=".csv" required>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSFM" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit-sfm-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Success Factor Main</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-pane fade show active" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                                        <form class="manual-form">
                                            <div class="mb-3">
                                                <label class="form-label">Name:</label>
                                                <input type="text" class="form-control" name="Name" id="sfm-name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description:</label>
                                                <input type="text" class="form-control" name="Description" id="sfm-description" required>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Rank:</label>
                                                    <input type="number" class="form-control" name="Rank" id="sfm-rank" required>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Weight:</label>
                                                    <input type="number" step="0.01" class="form-control" name="Weight" id="sfm-weight" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="hidden" name="EditSFM" id="edit-sfm" />
                                                <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SFM Table -->
                    <div class="table-responsive">
                        <table class="datatable" id="sfmdatatable" style="width: 100%" hidden>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Main Factor</th>
                                    <th>Description</th>
                                    <th>Rank</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM sfmains";
                                $result = $conn->execute_query($query, []);
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap" scope="row"><?= $row->id ?></td>
                                        <td class="text-nowrap"><?= $row->Name ?></td>
                                        <td class="text-nowrap"><?= $row->Description ?></td>
                                        <td class="text-nowrap"><?= $row->Rank ?></td>
                                        <td class="text-nowrap"><?= number_format($row->Weight * 100, 2, '.') ?>%</td>
                                        <td class="text-nowrap">
                                            <button class='editsfm-btn btn btn-success btn-sm rounded-0 mx-1' data-editsfm="<?= $row->id ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class='delsfm-btn btn btn-danger btn-sm rounded-0 mx-1' data-delsfm="<?= $row->id ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $page ?> Sub</h5>
                    <!-- Button to trigger the modal -->
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-sfs-modal"> Add Success Factor Main </button>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="add-sfs-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manual and CSV Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-sfs-manual-tab" data-bs-toggle="tab" data-bs-target="#nav-sfs-manual" type="button" role="tab" aria-controls="nav-sfs-manual" aria-selected="true">Manual</button>
                                            <button class="nav-link" id="nav-sfs-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-sfs-csv" type="button" role="tab" aria-controls="nav-sfs-csv" aria-selected="false">CSV</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-sfs-manual" role="tabpanel" aria-labelledby="nav-sfs-manual-tab">
                                            <form class="manual-form">
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Main Factor:</label>
                                                        <select class="form-select" name="SFMID" required>
                                                            <option selected disabled>--</option>
                                                            <?php
                                                            $query = "SELECT * FROM sfmains";
                                                            $result = $conn->execute_query($query, []);
                                                            while ($row = $result->fetch_object()) {
                                                            ?>
                                                                <option value="<?= $row->id ?>"><?= $row->Name ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Name:</label>
                                                        <input type="text" class="form-control" name="Name" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description:</label>
                                                    <input type="text" class="form-control" name="Description" required>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Rank:</label>
                                                        <input type="number" class="form-control" name="Rank" required>
                                                    </div>
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Weight:</label>
                                                        <input type="number" step="0.01" class="form-control" name="Weight" required>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSFS" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-sfs-csv" role="tabpanel" aria-labelledby="nav-sfs-csv-tab">
                                            <form class="csv-form" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Choose a CSV file:</label>
                                                    <input type="file" class="form-control" name="CSVFile" accept=".csv" required>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSFS" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit-sfs-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Success Factor Main</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-pane fade show active" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                                        <form class="manual-form">
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Main Factor:</label>
                                                    <select class="form-select" name="Main" id="sfm" required>
                                                        <option selected disabled>--</option>
                                                        <?php
                                                        $query = "SELECT * FROM sfmains";
                                                        $result = $conn->execute_query($query, []);
                                                        while ($row = $result->fetch_object()) {
                                                        ?>
                                                            <option value="<?= $row->id ?>"><?= $row->Name ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Name:</label>
                                                    <input type="text" class="form-control" name="Submain" id="sfs-name" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description:</label>
                                                <input type="text" class="form-control" name="Description" id="sfs-description" required>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Rank:</label>
                                                    <input type="number" class="form-control" name="Rank" id="sfs-rank" required>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Weight:</label>
                                                    <input type="number" step="0.01" class="form-control" name="Weight" id="sfs-weight" required>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="hidden" name="EditSFS" id="edit-sfs" />
                                                <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SFS Table -->
                    <div class="table-responsive">
                        <table class="datatable" id="sfsdatatable" style="width: 100%" hidden>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Main Factor</th>
                                    <th>Sub Factor</th>
                                    <th>Description</th>
                                    <th>Rank</th>
                                    <th>Weight</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT sfs.*, sfm.Name as Main FROM sfsubmains sfs LEFT JOIN sfmains sfm ON sfs.SFMID=sfm.id";
                                $result = $conn->execute_query($query, []);
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap" scope="row"><?= $row->id ?></td>
                                        <td class="text-nowrap"><?= $row->Main ?></td>
                                        <td class="text-nowrap"><?= $row->Name ?></td>
                                        <td class="text-nowrap"><?= $row->Description ?></td>
                                        <td class="text-nowrap"><?= $row->Rank ?></td>
                                        <td class="text-nowrap"><?= number_format($row->Weight * 100, 2, '.') ?>%</td>
                                        <td class="text-nowrap">
                                            <button class='editsfs-btn btn btn-success btn-sm rounded-0 mx-1' data-editsfs="<?= $row->id ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class='delsfs-btn btn btn-danger btn-sm rounded-0 mx-1' data-delsfs="<?= $row->id ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
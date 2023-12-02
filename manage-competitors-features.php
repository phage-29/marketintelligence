<?php
$page = "Competitors Feature";
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cfm-modal"> Add Competitors Feature Main </button>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="add-cfm-modal" tabindex="-1" aria-hidden="true">
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
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddCFM" />
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
                                                    <input type="hidden" name="AddCFM" />
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
                    <div class="modal fade" id="edit-cfm-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Competitors Feature Main</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-pane fade show active" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                                        <form class="manual-form">
                                            <div class="mb-3">
                                                <label class="form-label">Name:</label>
                                                <input type="text" class="form-control" name="Name" id="cfm-name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description:</label>
                                                <input type="text" class="form-control" name="Description" id="cfm-description" required>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="hidden" name="EditCFM" id="edit-cfm" />
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

                    <!-- CFM Table -->
                    <div class="table-responsive">
                        <table class="datatable" id="cfmdatatable" style="width: 100%" hidden>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Main Feature</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM cfmains";
                                $result = $conn->execute_query($query, []);
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap" scope="row"><?= $row->id ?></td>
                                        <td class="text-nowrap"><?= $row->Name ?></td>
                                        <td style="line-clamp: 2; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= $row->Description ?></td>
                                        <td class="text-nowrap">
                                            <button class='editcfm-btn btn btn-success btn-sm rounded-0 mx-1' data-editcfm="<?= $row->id ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class='delcfm-btn btn btn-danger btn-sm rounded-0 mx-1' data-delcfm="<?= $row->id ?>"><i class="bi bi-trash3-fill"></i></button>
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-cfs-modal"> Add Competitors Feature Main </button>
                    </div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="add-cfs-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manual and CSV Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-cfs-manual-tab" data-bs-toggle="tab" data-bs-target="#nav-cfs-manual" type="button" role="tab" aria-controls="nav-cfs-manual" aria-selected="true">Manual</button>
                                            <button class="nav-link" id="nav-cfs-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-cfs-csv" type="button" role="tab" aria-controls="nav-cfs-csv" aria-selected="false">CSV</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-cfs-manual" role="tabpanel" aria-labelledby="nav-cfs-manual-tab">
                                            <form class="manual-form">
                                                <div class="row">
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="form-label">Main Feature:</label>
                                                        <select class="form-select" name="CFMID" required>
                                                            <option selected disabled>--</option>
                                                            <?php
                                                            $query = "SELECT * FROM cfmains";
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
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddCFS" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-cfs-csv" role="tabpanel" aria-labelledby="nav-cfs-csv-tab">
                                            <form class="csv-form" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Choose a CSV file:</label>
                                                    <input type="file" class="form-control" name="CSVFile" accept=".csv" required>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddCFS" />
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
                    <div class="modal fade" id="edit-cfs-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Competitors Feature Main</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-pane fade show active" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                                        <form class="manual-form">
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label class="form-label">Main Feature:</label>
                                                    <select class="form-select" name="Main" id="cfm" required>
                                                        <option selected disabled>--</option>
                                                        <?php
                                                        $query = "SELECT * FROM cfmains";
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
                                                    <input type="text" class="form-control" name="Submain" id="cfs-name" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description:</label>
                                                <input type="text" class="form-control" name="Description" id="cfs-description" required>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="hidden" name="EditCFS" id="edit-cfs" />
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

                    <!-- CFS Table -->
                    <div class="table-responsive">
                        <table class="datatable" id="cfsdatatable" style="width: 100%" hidden>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Main Feature</th>
                                    <th>Sub Feature</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT cfs.*, cfm.Name as Main FROM cfsubmains cfs LEFT JOIN cfmains cfm ON cfs.CFMID=cfm.id";
                                $result = $conn->execute_query($query, []);
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap" scope="row"><?= $row->id ?></td>
                                        <td class="text-nowrap"><?= $row->Main ?></td>
                                        <td class="text-nowrap"><?= $row->Name ?></td>
                                        <td style="line-clamp: 2; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= $row->Description ?></td>
                                        <td class="text-nowrap">
                                            <button class='editcfs-btn btn btn-success btn-sm rounded-0 mx-1' data-editcfs="<?= $row->id ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class='delcfs-btn btn btn-danger btn-sm rounded-0 mx-1' data-delcfs="<?= $row->id ?>"><i class="bi bi-trash3-fill"></i></button>
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
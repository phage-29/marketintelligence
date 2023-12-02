<?php
$page = "SWOT Analysis";
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
                    <h5 class="card-title"><?= $page ?></h5>

                    <!-- Button to trigger the Add SWOT modal -->
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-swot-modal">Add SWOT</button>
                    </div>

                    <!-- Add SWOT Modal -->
                    <!-- Add SWOT Modal -->
                    <div class="modal fade" id="add-swot-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Manual and CSV Form</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-swot-manual-tab" data-bs-toggle="tab" data-bs-target="#nav-swot-manual" type="button" role="tab" aria-controls="nav-swot-manual" aria-selected="true">Manual</button>
                                            <button class="nav-link" id="nav-swot-csv-tab" data-bs-toggle="tab" data-bs-target="#nav-swot-csv" type="button" role="tab" aria-controls="nav-swot-csv" aria-selected="false">CSV</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-swot-manual" role="tabpanel" aria-labelledby="nav-swot-manual-tab">
                                            <form class="manual-form">
                                                <div class="mb-3">
                                                    <label class="form-label">Category:</label>
                                                    <select class="form-select" name="Category" required>
                                                        <option selected disabled>-- Select Category --</option>
                                                        <option value="Strengths">Strengths</option>
                                                        <option value="Weaknesses">Weaknesses</option>
                                                        <option value="Opportunities">Opportunities</option>
                                                        <option value="Threats">Threats</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Name:</label>
                                                    <input type="text" class="form-control" name="Name" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description:</label>
                                                    <input type="text" class="form-control" name="Description" required>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSWOT" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="nav-swot-csv" role="tabpanel" aria-labelledby="nav-swot-csv-tab">
                                            <form class="csv-form" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label class="form-label">Choose a CSV file:</label>
                                                    <input type="file" class="form-control" name="CSVFile" accept=".csv" required>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <input type="hidden" name="AddSWOT" />
                                                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit SWOT Modal -->
                    <div class="modal fade" id="edit-swot-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit SWOT</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for editing SWOT -->
                                    <form class="manual-form">
                                        <div class="mb-3">
                                            <label class="form-label">Category:</label>
                                            <select class="form-select" id="swot-category" name="Category" required>
                                                <option value="Strengths">Strengths</option>
                                                <option value="Weaknesses">Weaknesses</option>
                                                <option value="Opportunities">Opportunities</option>
                                                <option value="Threats">Threats</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Name:</label>
                                            <input type="text" class="form-control" name="Name" id="swot-name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description:</label>
                                            <input type="text" class="form-control" name="Description" id="swot-description" required>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="hidden" name="EditSWOT" id="edit-swot" />
                                            <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary mx-1">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SWOT DataTable -->
                    <div class="table-responsive">
                        <table class="datatable" id="swotdatatable" style="width: 100%" hidden>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM swots";
                                $result = $conn->execute_query($query, []);
                                while ($row = $result->fetch_object()) {
                                ?>
                                    <tr>
                                        <td class="text-nowrap" scope="row"><?= $row->id ?></td>
                                        <td class="text-nowrap"><?= $row->Category ?></td>
                                        <td class="text-nowrap"><?= $row->Name ?></td>
                                        <td style="line-clamp: 2; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= $row->Description ?></td>
                                        <td class="text-nowrap">
                                            <button class='editswot-btn btn btn-success btn-sm rounded-0 mx-1' data-editswot="<?= $row->id ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class='delswot-btn btn btn-danger btn-sm rounded-0 mx-1' data-delswot="<?= $row->id ?>"><i class="bi bi-trash3-fill"></i></button>
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
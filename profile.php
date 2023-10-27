<?php
$page = "My Profile";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>
<main id="main" class="main">
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/logo.png" alt="Profile">
                        <h2>
                            <?= $acc->FirstName ?>
                            <?= $acc->LastName ?>
                        </h2>
                        <h3>
                            <?= $acc->Role ?>
                        </h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->FirstName ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Middle Name</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->MiddleName ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Last Name</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->LastName ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->Username ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">
                                        <?= $acc->Email ?>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form class="ajax-form">

                                    <div class="row mb-3">
                                        <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First
                                            Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="FirstName" type="text" class="form-control" id="FirstName"
                                                value="<?= $acc->FirstName ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle
                                            Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="MiddleName" type="text" class="form-control" id="MiddleName"
                                                value="<?= $acc->MiddleName ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="LastName" type="text" class="form-control" id="LastName"
                                                value="<?= $acc->LastName ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Username" type="text" class="form-control" id="Username"
                                                value="<?= $acc->Username ?>" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="Email" type="email" class="form-control" id="Email"
                                                value="<?= $acc->Email ?>" required />
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" name="UpdateProfile" />
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form class="ajax-form">

                                    <div class="row mb-3">
                                        <label for="CurrentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="CurrentPassword" type="password" class="form-control"
                                                id="CurrentPassword" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="NewPassword" type="password" class="form-control"
                                                id="NewPassword" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="RenewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="RenewPassword" type="password" class="form-control"
                                                id="RenewPassword" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ShowPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="checkbox" class="custom-control-input" id="ShowPassword">
                                            <label class="custom-control-label" for="ShowPassword">Show Password</label>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" name="UpdatePassword" />
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
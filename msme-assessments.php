<?php
$page = "MSME Assessments";
require_once "includes/session.php";
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
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php
        if (isset($_SESSION["Username"])) {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="bi bi-shop"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" href="manage-success-factors.php">
                    <i class="bi bi-check-circle"></i>
                    <span>Success Factors</span>
                </a>
            </li><!-- End Success Factors Nav -->

            <li class="nav-item">
                <a class="nav-link" href="manage-swot-analysis.php">
                    <i class="bi bi-file-bar-graph"></i>
                    <span>SWOT Analysis</span>
                </a>
            </li><!-- End SWOT Analysis Nav -->

            <li class="nav-item">
                <a class="nav-link" href="manage-competitors-features.php">
                    <i class="bi bi-award"></i>
                    <span>Competitors Features</span>
                </a>
            </li><!-- End Competitors Features Nav -->

            <li class="nav-item">
                <a class="nav-link" href="msme-assessments.php">
                    <i class="bi bi-clipboard-data"></i>
                    <span>MSME Assessments</span>
                </a>
            </li><!-- End MSME Assessments Nav -->
            <?php
        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="msme.php">
                    <i class="bi bi-shop"></i>
                    <span>MSME Profile</span>
                </a>
            </li><!-- End MSME Profile Nav -->

            <li class="nav-item">
                <a class="nav-link" href="success-factors.php">
                    <i class="bi bi-check-circle"></i>
                    <span>Success Factors</span>
                </a>
            </li><!-- End Success Factors Nav -->

            <li class="nav-item">
                <a class="nav-link" href="swot-analysis.php">
                    <i class="bi bi-file-bar-graph"></i>
                    <span>SWOT Analysis</span>
                </a>
            </li><!-- End SWOT Analysis Nav -->

            <li class="nav-item">
                <a class="nav-link" href="competitors-features.php">
                    <i class="bi bi-award"></i>
                    <span>Competitors Features</span>
                </a>
            </li><!-- End Competitors Features Nav -->
            <?php
        }
        ?>


    </ul>

</aside><!-- End Sidebar-->

<!-- Include this script at the end of your HTML, just before the closing </body> tag. -->
<script>
    // Get the current URL path without the domain.
    var currentPath = window.location.pathname.split("/")[2];

    console.log(currentPath);

    // Select all the links in the sidebar with the class "nav-link".
    var sidebarLinks = document.querySelectorAll('#sidebar .nav-link');

    // Loop through the sidebar links.
    for (var i = 0; i < sidebarLinks.length; i++) {
        var link = sidebarLinks[i];
        var linkHref = link.getAttribute('href');

        // Check if the href of the link matches the current path.
        if (linkHref != currentPath) {
            // If they match, remove the "collapsed" class.
            link.classList.add('collapsed');
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- === component header === -->
    <?= view('admin/components/header_admin') ?>
    <!-- === end component header ==== -->
    <title>Dashboard Kemenakes</title>
</head>

<body id="page-top">

    <!-- === component wrapper === -->
    <div id="wrapper">
        <!-- === component sidebar === -->
        <?= view('admin/components/sidebar') ?>
        <!-- === end component sidebar ==== -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- === component header ==== -->
                <?= view('admin/components/header_bar') ?>
                <!-- === end component header ==== -->

                <!-- === Begin Page Content === -->
                <?= view('admin/components/data_supplier/content_body') ?>
                <!-- === /.container-fluid === -->

            </div>
            <!--  === End of Main Content === -->

            <!-- === Footer === -->
            <?= view('admin/components/footer') ?>
            <!-- === End of Footer === -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?= view('admin/components/script') ?>

</body>

</html>
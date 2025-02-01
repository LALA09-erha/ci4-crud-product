<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title><?= $title ?></title>

    <!-- Custom fonts for this template -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href=<?= base_url('css/sb-admin-2.css') ?> rel="stylesheet">
        <link href=<?= base_url("css/sb-admin-2.css") ?> rel="stylesheet">
        <link href=<?= base_url("css/sb-admin-2.min.css") ?> rel="stylesheet">
    <style>
        
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink">❤</i>
            </div>
                <div class="sidebar-brand-text mx-3">Produk Admin <sup>+</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo ($page == 'dashboard') ? 'active' : '';  ?>">
                <a class="nav-link" href="/">
                    🏠
                    <span>Dashboard</span></a>
            </li>
 
            <hr class="sidebar-divider">

            <li class="nav-item <?php echo ($page == 'Produk') ? 'active' : '';  ?>">
                <a class="nav-link" href="/produk">
                🛒
                <span>Produk</span></a>
            </li>



            <?php
            // flash message
            session()->getFlashdata('message');
            if (!empty(session()->getFlashdata('message'))) {
                echo '<hr class="sidebar-divider">';
                echo '<li class="nav-item">';
                echo '<div class="alert alert-warning text-center" role="alert">' . $_SESSION['message'] . '</div>';
                echo '</li>';
                unset($_SESSION['message']);
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"><</button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                     Test
                                </span>
                                <img class="img-profile rounded-circle" src=<?= base_url("img/nodata.png") ?>>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">                         
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content') ?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PA <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <form action="/logout" method="post">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src=<?= base_url("js/jquery.min.js") ?>></script>
    <!-- jquery.js -->
    <script src=<?= base_url("js/jquery.js") ?>></script>


    <script src=<?= base_url("js/jquery.min.js") ?>></script>

    <!-- Custom scripts for all pages-->
    <!-- <script src=>></script> -->
    <script src=<?= base_url("js/sb-admin-2.min.js") ?>></script>

    <!-- Page level plugins -->
    <script src=<?= base_url("js/datatables.js") ?>></script>

</body>

</html>
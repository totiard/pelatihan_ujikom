<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

    // Menu Customer
    $("#m_customer").click(function() {
        loadCustomer();
    });

    $("#contentData").on("click", "#addCustomer", function() {
        $.ajax({
            url: 'customer/add.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formCustomer", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'customer/customer.php?action=save',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadCustomer();
            }
        });
    });

    $("#contentData").on("click", "#deleteCustomer", function() {
        var id_customer = $(this).attr("value");
        $.ajax({
            url: 'customer/customer.php?action=delete',
            type: 'post',
            data: { id_customer: id_customer },
            success: function(data) {
                alert(data);
                loadCustomer();
            }
        });
    });

    $("#contentData").on("click", "#editCustomer", function() {
        var id_customer = $(this).attr("value");
        $.ajax({
            url: 'customer/edit.php',
            type: 'get',
            data: { id_customer: id_customer },
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formEditCustomer", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'customer/customer.php?action=edit',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadCustomer();
            }
        });
    });

    // Menu Item
    $("#m_item").click(function() {
        loadItem();
    });

    $("#contentData").on("click", "#addItem", function() {
        $.ajax({
            url: 'item/form-add.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formItem", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'item/item.php?action=save',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadItem();
            }
        });
    });

    $("#contentData").on("click", "#deleteItem", function() {
        var id_item = $(this).attr("value");
        $.ajax({
            url: 'item/item.php?action=delete',
            type: 'post',
            data: { id_item: id_item },
            success: function(data) {
                alert(data);
                loadItem();
            }
        });
    });

    $("#contentData").on("click", "#editItem", function() {
        var id_item = $(this).attr("value");
        $.ajax({
            url: 'item/edit.php',
            type: 'get',
            data: { id_item: id_item },
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formEditItem", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'item/item.php?action=edit',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadItem();
            }
        });
    });

    // Menu Sales
    $("#m_sales").click(function() {
        loadSales();
    });

    $("#contentData").on("click", "#addSales", function() {
        $.ajax({
            url: 'sales/form-add.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formSales", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'sales/sales.php?action=save',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadSales();
            }
        });
    });

    $("#contentData").on("click", "#deleteSales", function() {
        var id_sales = $(this).attr("value");
        $.ajax({
            url: 'sales/sales.php?action=delete',
            type: 'post',
            data: { id_sales: id_sales },
            success: function(data) {
                alert(data);
                loadSales();
            }
        });
    });

    $("#contentData").on("click", "#editSales", function() {
        var id_sales = $(this).attr("value");
        $.ajax({
            url: 'sales/edit.php',
            type: 'get',
            data: { id_sales: id_sales },
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formEditSales", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'sales/sales.php?action=edit',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadSales();
            }
        });
    });

    // Menu Transaction
    $("#m_transaction").click(function() {
        loadTransaction();
    });

    $("#contentData").on("click", "#addTransaction", function() {
        $.ajax({
            url: 'transaction/form-add.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formTransaction", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'transaction/transaction.php?action=save',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadTransaction();
            }
        });
    });

    $("#contentData").on("click", "#deleteTransaction", function() {
        var id_transaction = $(this).attr("value");
        $.ajax({
            url: 'transaction/transaction.php?action=delete',
            type: 'post',
            data: { id_transaction: id_transaction },
            success: function(data) {
                alert(data);
                loadTransaction();
            }
        });
    });

    $("#contentData").on("click", "#editTransaction", function() {
        var id_transaction = $(this).attr("value");
        $.ajax({
            url: 'transaction/edit.php',
            type: 'get',
            data: { id_transaction: id_transaction },
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    });

    $("#contentData").on("submit", "#formEditTransaction", function(e) {
        e.preventDefault();
        $.ajax({
            url: 'transaction/transaction.php?action=edit',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                alert(data);
                loadTransaction();
            }
        });
    });

    // Function untuk load data
    function loadCustomer() {
        $.ajax({
            url: 'customer/list.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    }

    function loadItem() {
        $.ajax({
            url: 'item/list.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    }

    function loadSales() {
        $.ajax({
            url: 'sales/list.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    }

    function loadTransaction() {
        $.ajax({
            url: 'transaction/list.php',
            type: 'get',
            success: function(data) {
                $('#contentData').html(data);
            }
        });
    }

});
</script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data:</h6>
                        <a class="collapse-item" id="m_item">Item</a>
                        <a class="collapse-item" id="m_customer">Customer</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi:</h6>
                        <a class="collapse-item" id="m_sales">Sales</a>
                        <a class="collapse-item" id="m_transaction">Transaksi</a>
                    </div>
                </div>
            </li>

           
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Toti Ardiansyah</span>
                                <img class="img-profile rounded-circle"
                                    src="asset/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="contentData">
                <div class="container-fluid">
        <!-- Page Heading -->
            <div >
            <h1 class="h3 mb-4 text-gray-800">Welcome </h1>
            </div>
        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TOTI PELATIHAN UJIKOM</span>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>
   
</body>

</html>
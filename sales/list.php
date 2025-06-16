<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sales</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data sales di bawah ini.
        Untuk informasi lebih lanjut tentang DataTables, silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sales</h6>
        </div>
        
        <div class="card-body">
            <button class="btn btn-info btn-user" id="addSales" style="margin-bottom: 30px;">Tambah Sales</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Sales</th>
                            <th>Nama Customer</th>
                            <th>DO Number</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        include "../db.php";
                        $db = new db;
                        $sales = $db->get_allSales();
                        $no = 1;

                        while ($result = $sales->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $result['tgl_sales']; ?></td>
                            <td><?php echo $result['nama_customer']; ?></td>
                            <td><?php echo $result['do_number']; ?></td>
                            <td><?php echo $result['status']; ?></td>
                            <td>
                                <button class="btn btn-warning btn-user editSales" value="<?php echo $result['id_sales']; ?>">Edit</button>
                                <button class="btn btn-danger btn-user deleteSales" value="<?php echo $result['id_sales']; ?>">Delete</button>
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

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>

<script>
    $(document).ready(function(){  

        $("#addSales").click(function(){
            $.ajax({
                url: 'sales/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Edit Sales
        $(".editSales").click(function(){
            var id_sales = $(this).val();
            $.ajax({
                url: 'sales/edit.php',
                type: 'get',
                data: {id_sales: id_sales},
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Delete Sales
        $(".deleteSales").click(function() {
            var id_sales = $(this).val();
            $.ajax({
                url: 'sales/sales.php?action=delete',
                type: 'post',
                data: { id_sales: id_sales },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });
    });
</script>

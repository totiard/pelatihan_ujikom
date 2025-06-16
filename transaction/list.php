<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data transaksi di bawah ini.
        Untuk informasi lebih lanjut tentang DataTables, silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        
        <div class="card-body">
            <button class="btn btn-info btn-user" id="addTransaction" style="margin-bottom: 30px;">Tambah Transaksi</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        include "../db.php";
                        $db = new db;
                        $transactions = $db->get_allTransaction();
                        $no = 1;

                        while ($result = $transactions->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $result['nama_item']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td><?php echo number_format($result['price'], 0, ',', '.'); ?></td>
                            <td><?php echo number_format($result['amount'], 0, ',', '.'); ?></td>
                            <td>
                                <button class="btn btn-warning btn-user editTransaction" value="<?php echo $result['id_transaction']; ?>">Edit</button>
                                <button class="btn btn-danger btn-user deleteTransaction" value="<?php echo $result['id_transaction']; ?>">Delete</button>
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

        $("#addTransaction").click(function(){
            $.ajax({
                url: 'transaction/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Edit Transaction
        $(".editTransaction").click(function(){
            var id_transaction = $(this).val();
            $.ajax({
                url: 'transaction/edit.php',
                type: 'get',
                data: {id_transaction: id_transaction},
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Delete Transaction
        $("#contentData").on("click", ".deleteTransaction", function() {
            var id_transaction = $(this).val();
            $.ajax({
                url: 'transaction/transaction.php?action=delete',
                type: 'post',
                data: { id_transaction: id_transaction },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });
    });
</script>

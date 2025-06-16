<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Item</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data item di bawah ini.
        Untuk informasi lebih lanjut tentang DataTables, silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Item</h6>
        </div>
        
        <div class="card-body">
            <button class="btn btn-info btn-user" id="addItem" style="margin-bottom: 30px;">Tambah Item</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Item</th>
                            <th>Satuan (UOM)</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        include "../db.php";
                        $db = new db;
                        $items = $db->get_allItem();
                        $no = 1;

                        while ($result = $items->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $result['nama_item']; ?></td>
                            <td><?php echo $result['uom']; ?></td>
                            <td><?php echo number_format($result['harga_beli'], 0, ',', '.'); ?></td>
                            <td><?php echo number_format($result['harga_jual'], 0, ',', '.'); ?></td>
                            <td>
                                <button class="btn btn-warning btn-user editItem" value="<?php echo $result['id_item']; ?>">Edit</button>
                                <button class="btn btn-danger btn-user deleteItem" value="<?php echo $result['id_item']; ?>">Delete</button>
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

        $("#addItem").click(function(){
            $.ajax({
                url: 'item/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Edit Item
        $(".editItem").click(function(){
            var id_item = $(this).val();
            $.ajax({
                url: 'item/edit.php',
                type: 'get',
                data: {id_item: id_item},
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        // Event untuk Delete Item
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
    });
</script>

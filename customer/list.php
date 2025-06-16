<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customer</h1>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
        </div>

        <div class="card-body">
            <button class="btn btn-info btn-user" id="addCustomer" style="margin-bottom: 30px;">Tambah Customer</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../db.php";
                        $db = new db;
                        $customer = $db->get_allCustomer();
                        $no = 1;

                        while ($result = $customer->fetch_array()) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $result['nama_customer']; ?></td>
                                <td><?= $result['alamat']; ?></td>
                                <td><?= $result['telp']; ?></td>
                                <td><?= $result['fax']; ?></td>
                                <td><?= $result['email']; ?></td>
                                <td>
                                    <button class="btn btn-success btn-user" id="editCustomer" value="<?= $result['id_customer']; ?>">Edit</button>
                                    <button class="btn btn-danger btn-user" id="deleteCustomer" value="<?= $result['id_customer']; ?>">Delete</button>
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

<!-- DataTables JS -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- DataTables custom demo -->
<script src="asset/js/demo/datatables-demo.js"></script>

<script>
    $(document).ready(function() {
        $("#addCustomer").click(function() {
            $.ajax({
                url: 'customer/form-add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        $("#contentData").on("click", "#editCustomer", function() {
            var id = $(this).val();
            $.ajax({
                url: 'customer/edit.php',
                type: 'get',
                data: { id_customer: id },
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        });

        $("#contentData").on("click", ".deleteCustomer", function() {
            var id = $(this).val();
            if (confirm("Yakin mau dihapus?")) {
                $.ajax({
                    url: 'customer/customer.php?action=delete',
                    type: 'post',
                    data: { id_customer: id },
                    success: function(data) {
                        alert(data);
                        $.ajax({
                            url: 'customer/list.php',
                            type: 'get',
                            success: function(data) {
                                $('#contentData').html(data);
                            }
                        });
                    }
                });
            }
        });
    });
</script>

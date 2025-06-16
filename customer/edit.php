<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Customer</h1>
    <p class="mb-4">
        DataTables digunakan untuk menampilkan data customer secara interaktif.
        Kunjungi <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a> untuk info lebih lanjut.
    </p>

    <!-- Edit Customer Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Customer</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <?php
                include "../db.php";
                $id_customer = $_GET['id_customer'];
                $db = new db;

                $cust = $db->get_CustomerById($id_customer);
                $result = $cust->fetch_array();
                ?>

                <form method="POST" id="formEditCustomer">
                    <input type="hidden" name="id_customer" value="<?= $result['id_customer']; ?>">

                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="nama_customer" value="<?= $result['nama_customer']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required><?= $result['alamat']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telp" value="<?= $result['telp']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax" value="<?= $result['fax']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $result['email']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>

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
    $("#formEditCustomer").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'customer/customer.php?action=update',
            type: 'POST',
            data: $(this).serialize(),
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
    });
</script>

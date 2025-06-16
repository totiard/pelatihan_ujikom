<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Transaksi</h1>
    <p class="mb-4">Form untuk menambah data transaksi pada sistem koperasi.</p>

    <!-- Form Add Transaksi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Transaksi</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" id="formTransaction">

                    <div class="form-group">
                        <label>Item</label>
                        <select class="form-control" name="id_item" required>
                            <option value="">-- Pilih Item --</option>
                            <?php
                            include "../db.php";
                            $db = new db;
                            $items = $db->get_allItem();
                            while ($row = $items->fetch_array()) {
                                echo "<option value='".$row['id_item']."'>".$row['nama_item']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="simpanTransaction">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- DataTables (bisa dipake kalau mau load table di halaman ini juga) -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="asset/js/demo/datatables-demo.js"></script>

<script>
    $("#formTransaction").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'transaction/transaction.php?action=save',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

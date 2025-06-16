<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Transaksi</h1>
    <p class="mb-4">Form untuk mengubah data transaksi pada sistem koperasi.</p>

    <!-- Form Edit Transaksi -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Transaksi</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include "../db.php";
                $id_transaction = $_GET['id_transaction'];
                $db = new db;

                $transaction = $db->get_transactionById($id_transaction);
                $result = $transaction->fetch_array();
                ?>

                <form method="POST" id="formEditTransaction">

                    <input type="hidden" name="id_transaction" value="<?php echo $result['id_transaction']; ?>">

                    <div class="form-group">
                        <label>Item</label>
                        <select class="form-control" name="id_item" required>
                            <option value="">-- Pilih Item --</option>
                            <?php
                            $items = $db->get_allItem();
                            while ($row = $items->fetch_array()) {
                                $selected = ($row['id_item'] == $result['id_item']) ? 'selected' : '';
                                echo "<option value='".$row['id_item']."' $selected>".$row['nama_item']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="<?php echo $result['quantity']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $result['price']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" value="<?php echo $result['amount']; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="simpanEditTransaction">Simpan</button>
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
    $("#formEditTransaction").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'transaction/transaction.php?action=edit',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

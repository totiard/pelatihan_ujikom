<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Transaction Temp</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data transaction temp.
        Untuk info lengkap silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Transaction Temp</h6>
        </div>
        
        <div class="card-body">
        
            <div class="table-responsive">

                <?php
                include "../db.php";
                $id_transaction = $_GET['id_transaction'];
                $db = new db;

                $transaction = $db->get_transactionTempById($id_transaction);
                $result = $transaction->fetch_array();
                ?>
                <form method="POST" id="formEditTransactionTemp">
                    
                    <input type="hidden" name="id_transaction" value="<?php echo $result['id_transaction']; ?>">

                    <div class="form-group">
                        <label>Item</label>
                        <select name="id_item" class="form-control" required>
                            <option value="">-- Pilih Item --</option>
                            <?php
                                $items = $db->get_allItem();
                                while ($item = $items->fetch_array()) {
                                    $selected = ($item['id_item'] == $result['id_item']) ? 'selected' : '';
                                    echo "<option value='{$item['id_item']}' $selected>{$item['nama_item']}</option>";
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

                    <div class="form-group">
                        <label>Session ID</label>
                        <input type="text" class="form-control" name="session_id" value="<?php echo $result['session_id']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <textarea class="form-control" name="remark"><?php echo $result['remark']; ?></textarea>
                    </div>
                
                    <button type="submit" class="btn btn-primary" id="simpanEditTransactionTemp">Simpan</button>
                </form>
                
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
    $("#formEditTransactionTemp").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'transaction_temp/transaction_temp.php?action=edit',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Sales</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data sales.
        Untuk info lengkap silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Sales</h6>
        </div>
        
        <div class="card-body">
        
            <div class="table-responsive">

                <?php
                include "../db.php";
                $id_sales = $_GET['id_sales'];
                $db = new db;

                $sales = $db->get_salesById($id_sales);
                $result = $sales->fetch_array();
                ?>
                <form method="POST" id="formEditSales">
                    
                    <input type="hidden" name="id_sales" value="<?php echo $result['id_sales']; ?>">

                    <div class="form-group">
                        <label>Tanggal Sales</label>
                        <input type="date" class="form-control" name="tgl_sales" value="<?php echo $result['tgl_sales']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Customer</label>
                        <select name="id_customer" class="form-control" required>
                            <option value="">-- Pilih Customer --</option>
                            <?php
                                $customers = $db->get_allCustomer();
                                while ($cust = $customers->fetch_array()) {
                                    $selected = ($cust['id_customer'] == $result['id_customer']) ? 'selected' : '';
                                    echo "<option value='{$cust['id_customer']}' $selected>{$cust['nama_customer']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>DO Number</label>
                        <input type="text" class="form-control" name="do_number" value="<?php echo $result['do_number']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="LUNAS" <?php if($result['status']=='LUNAS') echo 'selected'; ?>>LUNAS</option>
                            <option value="BELUM LUNAS" <?php if($result['status']=='BELUM LUNAS') echo 'selected'; ?>>BELUM LUNAS</option>
                        </select>
                    </div>
                
                    <button type="submit" class="btn btn-primary" id="simpanEditSales">Simpan</button>
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
    $("#formEditSales").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'sales/sales.php?action=edit',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

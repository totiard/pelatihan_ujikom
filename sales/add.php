<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Sales</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data sales.
        Untuk info lengkap silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Sales</h6>
        </div>
        
        <div class="card-body">
       
            <div class="table-responsive">
                <form method="POST" id="formSales">

                    <div class="form-group">
                        <label>Tanggal Sales</label>
                        <input type="date" class="form-control" name="tgl_sales" required>
                    </div>

                    <div class="form-group">
                        <label>Customer</label>
                        <select name="id_customer" class="form-control" required>
                            <option value="">-- Pilih Customer --</option>
                            <?php
                                include "../db.php";
                                $db = new db;
                                $customers = $db->get_allCustomer();
                                while ($result = $customers->fetch_array()) {
                                    echo "<option value='{$result['id_customer']}'>{$result['nama_customer']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>DO Number</label>
                        <input type="text" class="form-control" name="do_number" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="LUNAS">LUNAS</option>
                            <option value="BELUM LUNAS">BELUM LUNAS</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="simpanSales">Simpan</button>
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
    $("#formSales").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'sales/sales.php?action=save',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

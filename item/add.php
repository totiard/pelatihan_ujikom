<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Item</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menampilkan data item.
        Untuk info lengkap silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Item</h6>
        </div>
        
        <div class="card-body">
       
            <div class="table-responsive">
                <form method="POST" id="formItem">
                    
                    <div class="form-group">
                        <label>Nama Item</label>
                        <input type="text" class="form-control" name="nama_item" required>
                    </div>

                    <div class="form-group">
                        <label>Satuan (UOM)</label>
                        <input type="text" class="form-control" name="uom" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="simpanItem">Simpan</button>
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
    $("#formItem").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'item/action.php?action=save',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                alert(response);
                location.reload();
            }
        });
    });
</script>

<div class="container">
	<section>
		<div class="row pt-5">
			<div class="col-md-6">
				<h3 class="tema">Customer</h3>	
			</div>	
		</div>
	</section>

	<section>
		<div class="row pt-4">
			<div class="col-md-12">
				<div class="card shadow p-3 mb-5 bg-white rounded">
				  <div class="card-body">
				    <div class="row">
				    	<div class="col-md-12">
				    		<div>
				    			<h3 class="judulcard">Data Customer</h3>
				    			<hr>
				    		</div>
				    	</div>
				    </div>

				    <div class="row mt-4">
				    	<div class="col-md-12">
				    		<?php echo $this->session->flashdata('msg'); ?>
				    		<div class="mb-3">
				    			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Customer</button>
				    		</div>

				    		<table class="table table-hover" id="table_customer">
				    			<thead>
				    				<tr>
				    					<th>Kode</th>
				    					<th>Nama</th>
				    					<th>Telepon</th>
				    					<th>Aksi</th>
				    				</tr>
				    			</thead>
				    			<tbody>
				    				<?php foreach($data_customer as $datcus): ?>
				    				<tr>
				    					<td><?php echo $datcus->kode; ?></td>
				    					<td><?php echo $datcus->nama; ?></td>
				    					<td><?php echo $datcus->telp; ?></td>
				    	<td><button type="button" class="btn btn-primary btn_edit_cust" data-id="<?php echo $datcus->id; ?>" data-kode="<?php echo $datcus->kode; ?>" data-nama="<?php echo $datcus->nama; ?>" data-telepon="<?php echo $datcus->telp; ?>">Edit</button> &nbsp; <a href='<?php echo base_url()?>customer/hapus/<?php echo $datcus->id; ?>' class="btn btn-danger tombol-hapus">Hapus</a></td>
				    				</tr>
				    			<?php endforeach; ?>
				    			</tbody>
				    		</table>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
		</div>	
	</section>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah data Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12">
        		<form method="post" action="<?php echo base_url() ?>customer/tambah-customer">
        		<div class="form-group">
        			<label for="kode" class="subjudulcard">Kode</label>
        			<input type="text" class="form-control shadow-sm" name="kode" placeholder="Masukan kode customer" required="">
        		</div>
        		<div class="form-group pt-3">
        			<label for="nama" class="subjudulcard">Nama</label>
        			<input type="text" class="form-control shadow-sm" name="nama" placeholder="Masukan nama customer" required="">
        		</div>
        		<div class="form-group pt-3">
        			<label for="telepon" class="subjudulcard">Telepon</label>
        			<input type="number" class="form-control shadow-sm" name="telepon" placeholder="Masukan nomor telepon customer" required="">
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- modal edit -->
<!-- Modal -->
<div class="modal fade" id="EditCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit data customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12">
        		<form method="post" action="<?php echo base_url() ?>customer/edit-customer">

        		<input type="hidden" name="id" id="id" class="id">
        		<div class="form-group">
        			<label for="kode" class="subjudulcard">Kode</label>
        			<input type="text" id="kode" class="form-control shadow-sm data-kode" name="kode" required="">
        		</div>
        		<div class="form-group pt-3">
        			<label for="nama" class="subjudulcard">Nama</label>
        			<input type="text" id="nama" class="form-control shadow-sm data-nama" name="nama" required="">
        		</div>
        		<div class="form-group pt-3">
        			<label for="telepon" class="subjudulcard">Telepon</label>
        			<input type="number" id="telepon" class="form-control shadow-sm data-telepon" name="telepon" required="">
        		</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	
	<script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
$('#table_customer').DataTable();

	$('.btn_edit_cust').on('click', function(){
		const id = $(this).data('id');
		const kd = $(this).data('kode');
		const nama = $(this).data('nama');
		const telp = $(this).data('telepon');

		// set
		$('#id').val(id);
		$('#kode').val(kd);
		$('#nama').val(nama);
		$('#telepon').val(telp);

		$('#EditCustomer').modal('show');
	});

		$('.tombol-hapus').on('click', function(e){
 		e.preventDefault();


 		const href = $(this).attr('href');
 		Swal.fire({
  title: 'Apakah anda yakin?',
  text: "Data yang terhapus tidak bisa dikembalikan",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yakin ingin hapus!'
}).then((result) => {
  if (result.isConfirmed) {
    // Swal.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
      document.location.href = href
  }
})
 	});
});


	</script>

</body>
</html>
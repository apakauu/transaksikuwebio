<section>
	<div class="container">
		<div class="row pt-5">
			<div class="col-md-6">
				<h3 class="tema">Transaksi</h3>	
			</div>	
		</div>

		<div class="row pt-4">
			<?php echo  $this->session->flashdata('msg'); ?>
			
			<div class="col-md-12">
				<div class="card shadow p-3 mb-5 bg-white rounded">
				  <div class="card-body">
				    <div class="row">
				  		<div class="col-md-6">
				  		  	<div class="sec1 pt-3">
								<h5 class="judulcard">Data Transaksi</h5>
								<hr>
								<form method="post" action="<?php echo base_url() ?>transaksi/save-cust">
									<div class="form group">
										<label for="nomor" class="subjudulcard">No</label>
										<input type="number" name="nomor" id="nomor" class="form-control shadow-sm" value="<?php echo sprintf("%04s", $kode_transaksi); ?>">
									</div>
									<div class="form group pt-3">
										<label for="tanggal" class="subjudulcard">Tanggal</label>
										<input type="date" name="tanggal" id="tanggal" class="form-control shadow-sm" value="<?php echo $this->session->userdata('tanggal'); ?>">
									</div>
								
							</div>
				  		 </div>  

				  		 <div class="col-md-6">
				  		 	<div class="sec2 pt-3">
								<h5 class="judulcard">Data Customer</h5>
								<hr>
									<div class="form group">
										<label for="kode" class="subjudulcard">Kode</label>
										<input type="text" name="kode_cust" id="kode_cust" class="form-control shadow-sm" value="<?php echo $this->session->userdata('kode_cust');?>">

									</div>

									<div class="detail_cust" id="detail_cust"></div>
								
							</div>
				  		 </div>
				    </div>
				    	<hr class="mt-5 mb-3">
				  		 <button type="submit" class="btn <?php if ($this->session->userdata('nomor') == NULL){echo 'btn-success';} else { echo 'btn-primary';}?>"><?php if ($this->session->userdata('nomor') == NULL){echo 'Set Data';} else { echo 'Ubah data';}?></button>
						</form>	
				  </div>
				</div>
			</div>

		</div>

		<div class="card shadow p-3 mb-5 bg-white rounded">
			

		  <div class="card-body">
		  		<div class="row">
		  			<div class="col-md-12">
		  				<div class="sec1 pt-3">
		  					<h5 class="judulcard">Data Cart Barang</h5>
		  					<hr>
		  				</div>
		  				
		  				<div class="mt-5">
			<button type="button" class="btn btn-primary" <?php if ($this->session->userdata('kode_cust') == NULL) {
				echo 'disabled="disabled"';
			} ?>  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah barang</button>
		</div>

		<div class="card shadow-sm mt-3" id="cart">
			<?php echo $this->session->flashdata('trans'); ?>
		  <div class="card-body">
				<div class="row mt-3 mb-5">
			<div class="col-md-12">
				<div class="table-scrollable">
						 <table class="table table-hover" id="table_barang">
			  <thead>
				  	<tr>
				  	<th>No</th>
				  	<th>Kode Barang</th>
				  	<th>Nama Barang</th>
				  	<th>QTY</th>
				  	<th>Harga Bandrol</th>
				  	<th>Diskon %</th>
				  	<th>Diskon Harga</th>
				  	<th>Harga setelah diskon</th>
				  	<th>Total</th>
				  	<th>Aksi</th>
				  </tr>
				  </thead>
				  <tbody>
				 <?php $i= 1; ?>
				 <?php foreach($this->cart->contents() as $items): ?>
				 <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
				  <tr>
				  	<td><?php echo $i; ?></td>
				  	<td><?php echo $items['id'];?></td>
				  	<td><?php echo $items['name']; ?></td>
				  	<td><?php echo $items['qty']; ?></td>
				  	<td><?php echo $items['price']; ?></td>
				  	<td><?php echo $items['disc']; ?></td>
				  	<td><?php if($items['hardisk'] == 0 ){echo '-';} else {echo $items['hardisk'];} ?></td>
				  	<td><?php echo $items['totdisk']; ?></td>
				  	<td><?php echo $items['subtotal']; ?></td>
				  	<td><a href="<?php echo base_url().'transaksi/remove/'.$items['rowid']?> " class="btn btn-danger btn-sm tombol-hapus">Hapus</a></td>
				  </tr>
				  <?php $i++; ?>
				<?php endforeach; ?>
				</tbody>
				</table>
				</div>

			</div>
		</div>   
		  </div>
		</div>

		
		  			</div>
		  		</div>

		  		<div class="row">
		  			<div class="col-md-4">
		  				<form method="post" action="<?php echo base_url()?>transaksi/simpan-pesanan">
					<div class="form-group pt-3">
						<label for="subtot" class="subjudulcard">Sub Total</label>
						<input type="number" readonly name="subtot" class="form-control shadow-sm" id="subtot" value="<?php echo $this->cart->total(); ?>">
					</div>
					</div>

					<div class="col-md-4">
						<div class="form-group pt-3">
						<label for="diskon" class="subjudulcard">Diskon</label>
						<input type="number" name="diskon" class="form-control shadow-sm" id="diskon" min="0" placeholder="Tambahkan 0 jika tidak terdapat diskon" required="">
					</div>	
					</div>
					
					<div class="col-md-4">
						<div class="form-group pt-3">
						<label for="ongkir" class="subjudulcard">Ongkir</label>
						<input type="number" name="ongkir" class="form-control shadow-sm" id="ongkir" min="0" required="" placeholder="Masukan biaya ongkir">
					</div>	
					</div>

					<div class="col-md-4 offset-md-8">
						<div class="form-group pt-3">
						<label for="totbay" class="subjudulcard">Total Bayar</label>
						<input type="number" readonly name="totbay" class="form-control shadow-sm" id="totbay" value="<?php echo $this->cart->total(); ?>">
					</div>	
					
					<div class="my-3">
						<button type="submit" <?php if (empty($this->cart->contents())) {
							echo 'disabled="disabled"';
						} ?> class="btn btn-primary">Simpan</button>
					</div>
					</div>
				</form>
		  			
		  		</div>
		  </div>
		</div>

		

		<div class="row">
			<div class="col-md-6">
				
			</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Data barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12">
        		<table class="table table-hover" id="table_pesan">
				  <thead>
				  	<tr>
				  	<th>No</th>
				  	<th>Kode Barang</th>
				  	<th>Nama Barang</th>
				  	<th>Harga</th>
				  	<th>Aksi</th>
				  </tr>
				  </thead>

				  <tbody>
				 
				  <?php $nomor = 1; ?>
				  <?php foreach($list_barang as $lb): ?>
				  <tr>
				  	<td><?php echo $nomor; ?></td>
				  	<td><input type="hidden" name="kode" value="<?php echo $lb->kode; ?>"><?php echo $lb->kode; ?></td>
				  	<td><input type="hidden" name="barang" value="<?php echo $lb->barang; ?>"><?php echo $lb->barang; ?></td>
				  	<td><input type="hidden" name="harga" value="<?php echo $lb->harga; ?>"><?php echo $lb->harga; ?></td>
				  	<td><button type="button" class="btn btn-primary btn-tambah" data-kode="<?php echo $lb->kode; ?>" data-barang="<?php echo $lb->barang; ?>" data-harga="<?php echo $lb->harga; ?>">Tambah</button></td>
				  	</form>
				  </tr>
				  <?php $nomor++; ?>
				<?php endforeach; ?>
				</tbody>

				</table>

      	<div class="mt-4 mb-4">
      		<form method="post" action="transaksi/tambah-barang">
      	<div class="row">
      		<div class="col-md-4">
      			<input type="text" name="kode" class="form-control shadow-sm data-kode" placeholder="Data kode" readonly="">
      		</div>

      		<div class="col-md-4">
      			<input type="text" name="barang" class="form-control shadow-sm data-barang" placeholder="Data nama barang" readonly="">
      		</div>

      		<div class="col-md-4">
      			<input type="number" name="harga" class="form-control shadow-sm data-harga" placeholder="Data harga barang" readonly="">
      		</div>
      	</div>

      	<div class="row mt-4">
      		<div class="col-md-4 modal-isian-qty">
      			<input type="number" name="qty" class="form-control shadow-sm inpt" disabled="" placeholder="masukan jumlah" min="1" required="">
      		</div>

      		<div class="col-md-4">
      			<input type="number" name="disc" class="form-control shadow-sm inpt" disabled="" placeholder="masukan diskon persen" min="0" required="" placeholder="Masukan 0 jika tidak ada diskon">
      		</div>

      	</div>

      		<button type="submit" class="btn btn-success mt-5 mb-4">Tambah</button>
      	</form>
      	</div>
        	</div>
        </div>
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
	<!-- <script src="<?php echo base_url()?>assets/js/script.js"></script> -->

	<script type="text/javascript">
		$(document).ready(function(){

			$('#table_barang').DataTable({
				 rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
			});
			$('#table_pesan').DataTable();

			$(function(){
				
				
				$('#ongkir').on('input', function(){
					var diskon = $('#diskon').val();
					var ongkir = $('#ongkir').val();
					var subtot = $('#subtot').val();
					$('#totbay').val(parseInt(subtot) - parseInt(diskon) + parseInt(ongkir));	
				});

			})
			

	$('.btn-tambah').on('click', function(){
		const kode = $(this).data('kode');
		const barang = $(this).data('barang');
		const harga = $(this).data('harga');

		// set
		$('.data-kode').val(kode);
		$('.data-barang').val(barang);
		$('.data-harga').val(harga);

		$('.inpt').removeAttr('disabled');

	});

	$("#kode_cust").on("click change input",function(){
                var detail_cust = {kode_cust:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'transaksi/get-cust';?>",
               data: detail_cust,
               success: function(msg){
               $('#detail_cust').html(msg);

               }
            });
       }); 

	$(function(){
		$('#kode_cust').autocomplete({
		source:function(request, response){
			$.ajax({
				url : "<?php echo site_url('Transaksi/data'); ?>",
				data : {kode_cust:$('#kode_cust').val()},
				dataType : 'json',
				type : 'POST',
				success : function(data){
					response(data);
				}
			});
		}
	});
	})

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
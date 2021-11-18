<div class="container">
	<section>
		<div class="row pt-5">
			<div class="col-md-6">
				<h3 class="tema">Dashboard</h3>	
			</div>	
		</div>
	</section>

	<section class="mt-5">
		<div class="row">
			<div class="col-md-4">
				<div class="card shadow-sm p-3 mb-5 rounded" id="jumlah_barang">
				  <div class="card-body">
				    <div class="row">
				    	<div class="col-md-12">
				    		<h5 class="jumlah_data"><?php echo $jumlah_barang; ?></h5>
				    		<p class="ket_data">Jumlah Barang</p>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card shadow-sm p-3 mb-5 rounded" id="jumlah_customer">
				  <div class="card-body">
				    <div class="row">
				    	<div class="col-md-12">
				    		<h5 class="jumlah_data"><?php echo $jumlah_customer; ?></h5>
				    		<p class="ket_data">Jumlah Customer</p>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card shadow-sm p-3 mb-5 rounded" id="jumlah_transaksi">
				  <div class="card-body">
				    <div class="row">
				    	<div class="col-md-12">
				    		<h5 class="jumlah_data"><?php echo $jumlah_transaksi; ?></h5>
				    		<p class="ket_data">Jumlah Transaksi</p>
				    	</div>
				    </div>
				  </div>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-12 col-12 col-sm-12">
				<div class="card shadow-sm p-3 mb-5 bg-white rounded">
				  <div class="card-body">
				  	<div class="table-scrollable">
					<table class="table table-hover col-md-12 col-12 col-sm-12" id="table_home">
				   	<thead>
				   		<tr>
				   			<th>No</th>
				   			<th>No Transaksi</th>
				   			<th>Tanggal</th>
				   			<th>Nama Customer</th>
				   			<th>Jumlah Barang</th>
				   			<th>Sub Total</th>
				   			<th>Diskon</th>
				   			<th>Ongkir</th>
				   			<th>Total</th>
				   		</tr>
				   	</thead>
				   	<tbody>
				   		<?php $nomor = 1; ?>
				   		<?php foreach($data_dashboard as $dd): ?>
				   		<tr>
				   			<td><?php echo $nomor; ?></td>
				   			<td><?php echo $dd->kode; ?></td>
				   			<td><?php $tgl = date('d-m-Y', strtotime($dd->tanggal)); echo $tgl;  ?></td>
				   			<td><?php echo $dd->custnama; ?></td>
				   			<td><?php echo $dd->qty; ?></td>
				   			<td><?php echo $dd->subtotal; ?></td>
				   			<td><?php echo $dd->diskon; ?></td>
				   			<td><?php echo $dd->ongkir; ?></td>
				   			<td><?php echo $dd->total_bayar; ?></td>
				   			<?php $nomor++; ?>
				   		</tr>
				   	<?php endforeach; ?>
				   	</tbody>
				   </table>				  		
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	
	<script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
	$('#table_home').DataTable();


});


	</script>

</body>
</html>
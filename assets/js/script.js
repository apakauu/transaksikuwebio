$(document).ready(function(){
	
	$('#table_home').DataTable();

	$('.btn-tambah').on('click', function(){
		const kode = $(this).data('kode');
		const barang = $(this).data('barang');
		const harga = $(this).data('harga');

		// set
		$('.data-kode').val(kode);
		$('.data-barang').val(barang);
		$('.data-harga').val(harga);
	});

	$('#kode_cust').autocomplete({
		source:function(request, response){
			$.ajax({
				url : "<?php echo site_url('Transaksi/data'); ?>",
				data : {kode:$('#kode_cust').val()},
				dataType : 'json',
				type : 'POST',
				success : function($data){
					response(data);
				}
			});
		}
	});

	$('#btn_edit_brg').on('click', function(){
		const kd = $(this).data('kode');
		const brg = $(this).data('nama');
		const hrg = $(this).data('harga');

		// set
		$('#kode').val(kd);
		$('#nama').val(brg);
		$('#harga').val(hrg);
	});
});
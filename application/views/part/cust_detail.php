				<?php $cst=$cust->row_array(); ?>

				<div class="form group pt-3">
							<label for="nama_cust" class="subjudulcard">Nama</label>
							<input type="text" name="nama_cust" id="nama_cust" class="form-control shadow-sm" value="<?php echo $cst['nama']; ?>">
						</div>
						<div class="form group pt-3">
							<label for="telp" class="subjudulcard">Telepon</label>
							<input type="text" name="telepon" id="telepon" class="form-control shadow-sm" value="<?php echo $cst['telp']; ?>">
						</div>
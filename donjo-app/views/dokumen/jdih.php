<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title"><?= $heading ?></h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<form>
					<div class="form-group">
						<label for="jenis_dokumen">Jenis Dokumen</label>
						<select class="form-control" name="kategori">
							<option value="">-Pilih Jenis Dokumen-</option>
							<?php foreach($kategori as $k => $s): ?>
								<option value="<?= $k ?>"><?= $s ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis_dokumen">Tahun</label>
						<select class="form-control" name="tahun">
							<option value="">-Pilih Tahun-</option>
							<?php foreach($tahun as $t): ?>
								<option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis_dokumen">Tentang</label>
						<input type="text" name="tentang" class="form-control">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6">
				<button class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-12"> -->
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nama Dokumen</th>
					<th>Jenis</th>
					<th>Tahun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="jdih-table">
				<?php foreach($main as $m): ?>
					<tr>
						<td><a href="<?= base_url('desa/upload/dokumen/') . $m['satuan'] ?>"><?= $m['nama'] ?></a></td>
						<td><?= $m['kategori'] ?></td>
						<td><?= $m['tahun'] ?></td>
						<td><a href="<?= base_url('desa/upload/dokumen/') . $m['satuan'] ?>"><i class="fa fa-download"></i> Unduh</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<!-- </div>	 -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#jdih-table').DataTable();
	} );
</script>
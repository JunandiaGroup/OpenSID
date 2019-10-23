<div class="col-md-3">
	<div class="box box-info">
		<div class="box-header with-border">
<<<<<<< HEAD
			<h3 class="box-title">Jenis Dokumen</h3>
=======
			<h3 class="box-title">Jenis Produk Hukum</h3>
>>>>>>> upstream/master
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body no-padding">
			<ul class="nav nav-pills nav-stacked">
<<<<<<< HEAD
				<?php foreach($submenu as $s): ?>
				<li <?php if ($_SESSION['submenu'] == $s['id']): ?>class="active"<?php endif; ?>><a href="<?= site_url('dokumen_sekretariat/peraturan_desa/'.$s['id'])?>"><?= $s['kategori'] ?></a></li>
				<?php endforeach;?>
=======
				<?php for ($i=1; $i < count($submenu); $i++): ?>
  				<li class="<?php ($_SESSION['submenu'] == $submenu[$i]['id']) and print('active') ?>"><a href="<?= site_url('dokumen_sekretariat/peraturan_desa/'.$submenu[$i]['id'])?>"><?= $submenu[$i]['nama'] ?></a></li>
				<?php endfor;?>
>>>>>>> upstream/master
			</ul>
		</div>
	</div>
</div>
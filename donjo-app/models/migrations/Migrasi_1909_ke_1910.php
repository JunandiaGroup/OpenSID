<?php
class Migrasi_1909_ke_1910 extends CI_model {

  public function up() {

  	// Perubahan Sub Menu pada Sekretariat > SK Kades dan Perdes menjadi Sekretariat > Produk Hukum
  	if ($this->db->table_exists('setting_modul'))
	{
		$array = array( 59, 60 );
		$this->db->where_in('id', $array);
		$this->db->delete('setting_modul');

		$object = array(
			'id' => 95,
			'modul' => 'Produk Hukum',
			'url' => 'dokumen_sekretariat/produk_hukum',
			'aktif' => 1,
			'ikon' => 'fa-balance-scale',
			'urut' => 3,
			'level' => 2,
			'hidden' => 0,
			'ikon_kecil' => '',
			'parent' => 15
		);
		$this->db->insert('setting_modul', $object);

	}

		// Tambah tabel asuransi
		if (!$this->db->table_exists('tweb_penduduk_asuransi'))
		{
			$query = "
				CREATE TABLE `tweb_penduduk_asuransi` (
					`id` tinyint(5) NOT NULL AUTO_INCREMENT,
					`nama` varchar(50) NOT NULL,
					PRIMARY KEY (id)
				)
			";

			$this->db->query($query);

			$query = "INSERT INTO tweb_penduduk_asuransi (`id`, `nama`) VALUES
				(1, 'Tidak/Belum Punya'),
				(2, 'BPJS Penerima Bantuan Iuran'),
				(3, 'BPJS Non Penerima Bantuan Iuran'),
				(99, 'Asuransi Lainnya')
			";

			$this->db->query($query);
		}
		// Tambah kolom no_asuransi, id_asuransi
  	if (!$this->db->field_exists('id_asuransi', 'tweb_penduduk'))
  	{
  		$fields = array();
  		$fields['id_asuransi'] = array(
	        	'type' => 'tinyint',
	        	'constraint' => 5,
	        	'null' => TRUE,
	        	'default' => NULL
	        );
			$this->dbforge->add_column('tweb_penduduk', $fields);
  	}
  	if (!$this->db->field_exists('no_asuransi', 'tweb_penduduk'))
  	{
  		$fields = array();
  		$fields['no_asuransi'] = array(
	        	'type' => 'char',
	        	'constraint' => 100,
	        	'null' => TRUE,
	        	'default' => NULL
	        );
			$this->dbforge->add_column('tweb_penduduk', $fields);
  	}
  	if (!$this->db->field_exists('updated_at', 'komentar'))
  	{
			$this->dbforge->add_column("komentar", "updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP");
		}
		// Tambah setting server untuk menentukan setting modul default
		$query = $this->db->select('1')->where('key', 'penggunaan_server')->get('setting_aplikasi');
		$query->result() OR	$this->db->insert('setting_aplikasi', array('key'=>'penggunaan_server', 'value'=>'1	', 'jenis'=>'int', 'keterangan'=>"Setting penggunaan server", 'kategori'=>'sistem'));
  }
}
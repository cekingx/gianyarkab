<?php

class KritikSaranSeeder extends Seeder
{
    private $table = 'ta_kritik_saran';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'kritik_saran_nama' => 'Dirga',
            'kritik_saran_alamat' => 'Sidan',
            'kritik_saran_email' => 'test@example.com',
            'kritik_saran_judul' => 'Kurang Responsif',
            'kritik_saran_isi' => 'Admin kurang responsif',
            'kritik_saran_foto' => 'default.jpg',
            'kritik_saran_tanggal' => '2020-09-07'
        ];

        $this->db->insert($this->table, $data);
    }
}
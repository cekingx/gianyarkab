<?php

class JabatanBupatiSeeder extends Seeder
{
    private $table = 'ref_jabatan_bupati';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'jabatan_bupati_nama' => 'Dirga',
            'jabatan_bupati_masa_jabatan' => '2020-2025',
            'jabatan_bupati_foto' => 'default.jpg'
        ];

        return $this->db->insert($this->table, $data);
    }
}
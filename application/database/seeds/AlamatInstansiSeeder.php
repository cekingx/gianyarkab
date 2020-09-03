<?php

class AlamatInstansiSeeder extends Seeder
{
    private $table = 'ref_alamat_instansi';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
            'alamat_instansi_telp' => '081234',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->db->insert($this->table, $data);
    }
}
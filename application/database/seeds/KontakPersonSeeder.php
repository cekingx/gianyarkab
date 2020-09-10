<?php

class KontakPersonSeeder extends Seeder
{
    private $table = 'ta_kontak_person';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'kontak_person_nama' => 'Dirga',
            'kontak_person_alamat' => 'Sidan Kelod',
            'kontak_person_email' => 'dirga@example.com',
            'kontak_person_judul' => 'Internet lemot',
            'kontak_person_isi_aduan' => 'Internet gianyar sangat lambat'
        ];

        $this->db->insert($this->table, $data);
    }
}
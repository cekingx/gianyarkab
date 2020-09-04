<?php

class SubDomainSeeder extends Seeder
{
    private $table = 'ref_sub_domain';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'sub_domain_link' => 'gianyarkab.go.id',
            'sub_domain_deskripsi' => 'Website resmi kabupaten gianyar'
        ];
        $this->db->insert($this->table, $data);
    }
}
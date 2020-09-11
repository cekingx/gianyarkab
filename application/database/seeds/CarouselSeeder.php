<?php

class CarouselSeeder extends Seeder
{
    private $table = 'ta_carousel';

    public function run()
    {
        $this->db->truncate($this->table);
        $data = [
            'carousel_judul' => 'Judul',
            'carousel_caption' => 'Caption',
            'carousel_foto' => 'default.jpg',
            'carousel_tanggal' => '2020-09-11'
        ];

        return $this->db->insert($this->table, $data);
    }
}
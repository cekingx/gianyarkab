<?php
    function parseDate($tanggal)
    {
        $bulan = [
            '01' => 'Januari',
            '02' => 'Pebruari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'Nopember',
            '12' => 'Desember'
        ];

        $exploded = explode("-", $tanggal);
        $exploded = array_reverse($exploded);
        $exploded[1] = $bulan[$exploded[1]];
        
        $new_date = implode(' ', $exploded);
        // var_dump($new_date);
        return $new_date;
    }
?>
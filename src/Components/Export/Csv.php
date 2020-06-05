<?php


namespace App\Components\Export;


class Csv
{
    /**
     * @param string $filename
     * @param array $data
     */
    public static function toFile(string $filename, array $data)
    {
        $file = fopen($filename, 'w');

        foreach ($data as $val) {
            fputcsv($file, $val);
        }

        fclose($file);
    }
}
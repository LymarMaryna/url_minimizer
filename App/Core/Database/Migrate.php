<?php


namespace App\Core\Database;


class Migrate extends DbAbstract
{
    private $migrateDir = __DIR__ . "/migrate/";

    public function run($file)
    {
        $path = $this->migrateDir . $file;
        $templine = '';
        $h = fopen($path, 'r');

        if ($h) {
            while (!feof($h)) {
                $line = fgets($h);
                if (substr($line, 0, 2) != '--' && $line != '') {
                    $templine .= $line;
                    if (substr(trim($line), -1, 1) == ';') {
                        try {
                            $query = $this->db->prepare($templine);
                            $res = $query->execute();
                        } catch (\Exception $e) {
                            $error = $e->getMessage();
                        }
                        if ($res) {
                            echo 'OK' . PHP_EOL;
                        } elseif ($error) {
                            echo $error . PHP_EOL . 'QUERY:' . PHP_EOL . $templine . PHP_EOL;
                        }
                        $templine = '';
                    }
                }
            }
        }
        fclose($h);
    }
}



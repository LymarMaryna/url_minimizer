<?php


namespace App\Core;


class Service
{
    static public function hashUrl($url)
    {
        return hash('crc32', $url . time());
    }
}
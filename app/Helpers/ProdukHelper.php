<?php

namespace App\Helpers;

class ProdukHelper
{
    public static function generateSKU($namaProduk)
    {
        $namaTanpaVokal = preg_replace('/[aeiouAEIOU]/', '', $namaProduk);
        $sku = strtoupper(substr($namaTanpaVokal, 0, 10)); // batasi panjang
        $jamMenit = date('Hi'); // Format 1530 untuk 15:30
        return $sku . $jamMenit;
    }

    public static function generateBarcode($idKategori, $sku)
    {
        $kategoriKode = 'KAT' . str_pad($idKategori, 3, '0', STR_PAD_LEFT);
        $randomAngka = mt_rand(100, 999);
        return $kategoriKode . $sku . $randomAngka;
    }
}

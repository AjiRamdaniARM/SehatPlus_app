<?php

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        if (!$tanggal || $tanggal === '0000-00-00 00:00:00') {
            return 'Tanggal tidak valid';
        }

        $timestamp = strtotime($tanggal);
        if (!$timestamp) {
            return 'Format salah';
        }

        $tgl = date('d', $timestamp);
        $bln = (int) date('m', $timestamp);
        $thn = date('Y', $timestamp);

        return $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
    }
}

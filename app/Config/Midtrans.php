<?php

namespace Config;

class Midtrans
{
    public static function config()
    {
        // Membaca konfigurasi dari .env
        \Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$clientKey = getenv('MIDTRANS_CLIENT_KEY');
        \Midtrans\Config::$isProduction = getenv('MIDTRANS_IS_PRODUCTION') === 'true'; // Mode Sandbox atau Production
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }
}

<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WhatsApp API Configuration (Fonnte)
    |--------------------------------------------------------------------------
    |
    | Fonnte adalah layanan WhatsApp Gateway yang digunakan untuk mengirim
    | notifikasi otomatis ke nomor pendaftar setelah verifikasi.
    |
    | Daftar gratis di: https://fonnte.com
    | Dapatkan API Key dari dashboard Fonnte.
    |
    */

    // API Key dari Fonnte
    'api_key' => env('WHATSAPP_API_KEY', ''),

    // Base URL Fonnte API
    'api_url' => 'https://api.fonnte.com/send',

    // Link grup WhatsApp untuk anggota baru
    'group_link' => env('WHATSAPP_GROUP_LINK', 'https://chat.whatsapp.com/FpNOQfL7SGV5ijSvgcYJak?s=cl&p=a&ilr=4'),

    // Nama pengirim (akan tampil di chat)
    'sender_name' => env('WHATSAPP_SENDER', 'IDA POLBAN'),

    // Aktifkan/nonaktifkan notifikasi WhatsApp
    // Set ke 'true' hanya jika akun Fonnte aktif dan tidak di-suspend
    'enabled' => env('WHATSAPP_ENABLED', false),
];


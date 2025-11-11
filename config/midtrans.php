<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Server Key & Client Key kamu diambil dari file .env agar aman.
    | Pastikan kamu sudah menambah:
    |
    | MIDTRANS_SERVER_KEY=SB-Mid-server-xxxxxxxxxxxx
    | MIDTRANS_CLIENT_KEY=SB-Mid-client-xxxxxxxxxxxx
    | MIDTRANS_IS_PRODUCTION=false
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY', null),

    'client_key' => env('MIDTRANS_CLIENT_KEY', null),

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    'is_sanitized' => true,

    'is_3ds' => true,
];

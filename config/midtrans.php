<?php

return [
  'client_key' => env('MIDTRANS_CLIENT_KEY'),
  'server_key' => env('MIDTRANS_SERVER_KEY'),
  'is_production' => env('MIDTRANS_IS_PRODUCTION', true),
  'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
  'is_3ds' => env('MIDTRANS_IS_3DS', true),

  'sandbox_client_key' => env('MIDTRANS_SB_CLIENT_KEY'),
  'sandbox_server_key' => env('MIDTRANS_SB_SERVER_KEY'),

  'snap_url' => 'https://app.sandbox.midtrans.com/snap/snap.js',
  'append_notif_url' => null,
  'override_notif_url' => null,
  'payment_idempotency_key' => null,

  'curl_options' => null,
];

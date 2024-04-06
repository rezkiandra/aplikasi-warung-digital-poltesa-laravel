<?php

return [
  'client_key' => env('MIDTRANS_CLIENT_KEY'),
  'server_key' => env('MIDTRANS_SERVER_KEY'),
  'is_production' => env('MIDTRANS_IS_PRODUCTION', true),
  'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
  'is_3ds' => env('MIDTRANS_IS_3DS', true),

  'append_notif_url' => null,
  'overrideNotifUrl' => null,
  'payment_idempotency_key' => null,

  'curl_options' => null,
];

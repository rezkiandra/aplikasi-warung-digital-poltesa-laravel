<?php

namespace Tests\Feature;

use Midtrans\Snap;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
  use WithFaker, RefreshDatabase;
  /** @test */
  public function processPaymentTest()
  {
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;
    \Midtrans\Config::$serverKey = 'SB-Mid-server-JcehLQa0BTugY2VI1YfKoTCj';

    $params = [
      'transaction_details' => [
        'order_id' => 'order-123',
        'gross_amount' => 10000
      ],
      'customer_details' => [
        'first_name' => 'Andi',
        'last_name' => 'Pratama'
      ],
      'enabled_payments' => [
        'bank_transfer',
      ],
      'item_details' => [
        [
          'id' => 'a1',
          'price' => 10000,
          'quantity' => 1,
          'name' => 'Product 1'
        ],
      ],
    ];

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $response = $this->withHeaders([
      'Accept' => 'application/json',
      'Authorization' => 'Bearer ' . $snapToken
    ])
      ->json('POST', '/api/midtrans-callback', [
        'order_id' => 'order-123',
        'status_code' => 200,
        'gross_amount' => 10000,
        'payment_type' => 'bank_transfer',
        'transaction_time' => 1609404800,
        'transaction_status' => 'settlement',
        'fraud_status' => 'accept',
      ]);

    $response->assertStatus(200);
  }

  /** @test */
  public function cancelledPayment()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
    ])
      ->json('POST', '/api/midtrans-callback', [
        'order_id' => 'order-123',
        'status_code' => 200,
        'gross_amount' => 10000,
        'payment_type' => 'bank_transfer',
        'transaction_time' => 1609404800,
        'transaction_status' => 'cancel',
        'fraud_status' => 'accept',
      ]);
    $response->assertStatus(200);
  }

  /** @test */
  public function failedPayment()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
    ])
      ->json('POST', '/api/midtrans-callback', [
        'order_id' => 'order-123',
        'status_code' => 200,
        'gross_amount' => 10000,
        'payment_type' => 'bank_transfer',
        'transaction_time' => 1609404800,
        'transaction_status' => 'deny',
        'fraud_status' => 'accept',
      ]);
    $response->assertStatus(200);
  }

  /** @test */
  public function successPayment()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
    ])
      ->json('POST', '/api/midtrans-callback', [
        'order_id' => 'order-123',
        'status_code' => 200,
        'gross_amount' => 10000,
        'payment_type' => 'bank_transfer',
        'transaction_time' => 1609404800,
        'transaction_status' => 'capture',
        'fraud_status' => 'accept',
      ]);
    $response->assertStatus(200);
  }

  /** @test */
  public function pendingPayment()
  {
    $response = $this->withHeaders([
      'Accept' => 'application/json',
    ])
      ->json('POST', '/api/midtrans-callback', [
        'order_id' => 'order-123',
        'status_code' => 200,
        'gross_amount' => 10000,
        'payment_type' => 'bank_transfer',
        'transaction_time' => 1609404800,
        'transaction_status' => 'pending',
        'fraud_status' => 'accept',
      ]);
    $response->assertStatus(200);
  }
}

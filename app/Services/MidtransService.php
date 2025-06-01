<?php

namespace App\Services;

use App\Models\Transaction;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction(Transaction $transaction)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->code,
                'gross_amount' => (int) $transaction->total_amount,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
            ],
            'item_details' => [
                [
                    'id' => $transaction->room_id,
                    'price' => (int) $transaction->total_amount,
                    'quantity' => 1,
                    'name' => "Sewa Kamar {$transaction->room->name} - {$transaction->boardingHouse->name}",
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return $snapToken;
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Midtrans transaction: ' . $e->getMessage());
        }
    }

    public function handleCallback($payload)
    {
        $transactionStatus = $payload->transaction_status;
        $orderId = $payload->order_id;
        $fraudStatus = $payload->fraud_status;
        $signatureKey = $payload->signature_key;

        // Verify signature key
        $hashed = hash('sha512', $orderId . $payload->status_code . $payload->gross_amount . config('midtrans.server_key'));
        if ($signatureKey != $hashed) {
            throw new \Exception('Invalid signature key');
        }

        $transaction = Transaction::where('code', $orderId)->first();

        if (!$transaction) {
            throw new \Exception('Transaction not found');
        }

        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'challenge') {
                $transaction->payment_status = 'pending';
            } else if ($fraudStatus == 'accept') {
                $transaction->payment_status = 'paid';
            }
        } else if ($transactionStatus == 'settlement') {
            $transaction->payment_status = 'paid';
        } else if ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $transaction->payment_status = 'failed';
        } else if ($transactionStatus == 'pending') {
            $transaction->payment_status = 'pending';
        }

        $transaction->save();
        return $transaction;
    }
}

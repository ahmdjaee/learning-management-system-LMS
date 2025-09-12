<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService
{
   
    public static function storeOrder(
        string $transactionId,
        int $buyerId,
        string $status,
        float $totalAmount,
        float $paidAmount,
        string $currency,
        string $paymentMethod
    ) {
        $order = new Order();

        $order->transaction_id = $transactionId;
        $order->invoice_id = strtoupper(uniqid());
        $order->buyer_id = $buyerId;
        $order->status = $status;
        $order->total_amount = $totalAmount;
        $order->paid_amount = $paidAmount;
        $order->currency = $currency;
        $order->payment_method = $paymentMethod;
        $order->save();

        /** store order items */
        $cartItems = Cart::where('user_id', $buyerId)->get();

        foreach ($cartItems as $cart) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->course_id = $cart->course_id;
                    $orderItem->price = $cart->course->price;
                    $orderItem->save();

        }

    }
}

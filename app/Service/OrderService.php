<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\Enrollment;
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
        try {
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
            $carts = Cart::where('user_id', $buyerId);
            $cartItems = $carts->get();

            foreach ($cartItems as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->course_id = $item->course_id;
                $orderItem->price = $item->course->price;
                $orderItem->save();

                /** store enrollment */
                $enrollment = new Enrollment();
                $enrollment->user_id = $buyerId;
                $enrollment->course_id = $item->course_id;
                $enrollment->instructor_id = $item->course->instructor_id;
                $enrollment->save();

            }

            $carts->delete();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

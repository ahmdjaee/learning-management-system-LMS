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
                $orderItem->commission_rate = config('settings.commission_rate');
                $orderItem->price = $item->course->discount > 0 ? $item->course->discount : $item->course->price;
                $orderItem->save();

                /** store enrollment */
                $enrollment = new Enrollment();
                $enrollment->user_id = $buyerId;
                $enrollment->course_id = $item->course_id;
                $enrollment->instructor_id = $item->course->instructor_id;
                $enrollment->save();

                /** add commission to instructor wallet */
                $instructor = $item->course->instructor;
                $instructor->wallet += calcCommission($item->course->discount > 0 ? $item->course->discount : $item->course->price, config('settings.commission_rate'));
                $instructor->save();

            }

            $carts->delete();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

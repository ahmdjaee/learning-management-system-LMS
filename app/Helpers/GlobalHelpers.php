<?php

/**
 * Convert minutes to hours
 */

use App\Models\Cart;

if (!function_exists('convertMinutesToHours')) {
    function convertMinutesToHours(int $minutes): string
    {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return sprintF('%dh %02dm', $hours, $minutes); // Return format : 1h 30m
    }
}

/**
 * Calculate cart total
 */
if (!function_exists('cartTotal')) {
    function cartTotal()
    {
        $total = 0;

        $cart = Cart::where('user_id', auth('web')->id())->get();

        foreach ($cart as $item) {
            if ($item->course->discount > 0) {
                $total += $item->course->discount;
            } else {
                $total += $item->course->price;
            }
        }

        return $total;
    }
}


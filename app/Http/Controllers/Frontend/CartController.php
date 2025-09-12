<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $carts = Cart::with('course')->where(['user_id' => auth()->id()])->paginate();

        return view('frontend.pages.cart', compact('carts'));
    }

    public function addToCart(int $courseId): Response
    {
        if (!Auth::guard('web')->check()) {
            return response(['message' => 'Please login first!',], 401);
        }

        $course = Course::findOrFail($courseId);
        $cart = new Cart();

        if ($cart->where(['course_id' => $courseId, 'user_id' => auth('web')->id()])->exists()) {
            return response(['message' => 'Already added!'], 401);
        }

        $cart->user_id = auth('web')->id();
        $cart->course_id = $course->id;

        $cart->save();

        $cartCount = cartCount();

        return response(['message' => 'Added successfully', 'cart_count' => $cartCount], 200);

    }

    public function removeFromCart(int $id): RedirectResponse
    {
        $cart = Cart::where(['id' => $id, 'user_id' => auth('web')->id()])->firstOrFail();
        $cart->delete();

        notyf()->success('Removed successfully');

        return redirect()->back();
    }
}

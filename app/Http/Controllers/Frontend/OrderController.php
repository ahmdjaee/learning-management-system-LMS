<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index() : View {

        $orderItems= OrderItem::with(['order', 'course'])->whereHas('course', function(Builder $q){
            $q->where('instructor_id', auth()->id());
        })->paginate(15);
        

        return view('frontend.instructor-dashboard.order.index', compact('orderItems'));
    
    }
}

@extends('frontend.layouts.master')

@section('content')
  <!--===========================
        BREADCRUMB START
    ============================-->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Shopping Cart</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
        BREADCRUMB END
    ============================-->


    <!--===========================
        CART VIEW START
    ============================-->
    <section class="wsus__cart_view mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            @if (count($carts)  > 0)
                <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="cart_list">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="pro_img">Product</th>

                                        <th class="pro_name"></th>

                                        <th class="pro_tk">Price</th>

                                        <th class="pro_icon">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($carts as $item)
                                        <tr>
                                        <td class="pro_img">
                                            <img src="{{ $item->course->thumbnail }}" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="pro_name">
                                            <a href="{{ route('courses.show', $item->course->slug) }}">{{ $item->course->title }}</a>
                                        </td>
                                        <td class="pro_tk">
                                            <h6>
                                                @if ($item->course->price == 0)
                                                    FREE
                                                @elseif ($item->course->discount > 0)
                                                    <del>${{$item->course->price}}</del>
                                                    ${{ $item->course->discount }}
                                                @else
                                                    ${{ $item->course->price }}
                                                @endif  
                                            </h6>
                                        </td>

                                        <td class="pro_icon">
                                            <a href="{{ route('remove-from-cart', $item->id) }}"><i class="fal fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-xxl-7 col-md-5 col-lg-6 wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="continue_shopping">
                        <a href="#" class="common_btn">continue shopping</a>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-7 col-lg-6 wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="total_price">
                        <div class="subtotal_area">
                            <h5>Total<span>${{ cartTotal() }}</span></h5>
                            <a href="checkout.html" class="common_btn">proceed checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center">
                <img style="width: 200px !important" src="{{ asset('default-files/empty-cart.png') }}" alt="empty cart">
                <h4 class="text-secondary my-3">Your cart is empty.</h4>
                <a href="{{ route('courses.index') }}" class="common_btn">Return to courses</a>
            </div>
            @endif
            
        </div>
    </section>
    <!--===========================
        CART VIEW END
    ============================-->
@endsection
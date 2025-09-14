@extends('frontend.layouts.master')

@push('header_scripts')
    <style>
        .success-wrapper {
            margin-top: 6rem;
            max-width: 500px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px; /* Slightly more rounded corners */
            text-align: center;
        }
        .success-icon {
            font-size: 4rem; /* Slightly smaller icon */
            color: #198754; /* A darker shade of green for contrast */
            margin-bottom: 20px;
            animation: bounceIn 0.8s;
        }
        .main-heading {
            font-weight: 600;
            color: #212529; /* Darker text for better readability */
        }
        .sub-text {
            color: #6c757d;
            font-size: 1rem;
        }
        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 500;
        }
        .detail-value {
            font-weight: 400;
        }

        /* Keyframe for a subtle bounce animation on the icon */
        @keyframes bounceIn {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }
    </style>
@endpush
@section('content')
<div class="container success-wrapper">
    <i class="fas fa-check-circle success-icon"></i>
    
    <h2 class="main-heading mb-3">Payment Successful!</h2>
    
    <p class="sub-text mb-4">
        Thank you, your transaction was processed successfully. A receipt has been sent to your email.
    </p>
    
    <div class="transaction-details text-start mb-4">
        <div class="detail-item">
            <span class="detail-label">Transaction ID:</span>
            <span class="detail-value">TXN123456789</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Date:</span>
            <span class="detail-value">September 13, 2025</span>
        </div>
        <div class="detail-item">
            <span class="detail-label">Amount:</span>
            <span class="detail-value">$45.00</span>
        </div>
    </div>
    
    <div class="d-grid gap-2">
        <a href="#" class="btn btn-success btn-lg">View My Orders</a>
        <a href="#" class="btn btn-outline-secondary btn-lg">Return to Homepage</a>
    </div>
</div>
@endsection
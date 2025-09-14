@extends('frontend.layouts.master')

@push('header_scripts')
    <style>
        .failed-wrapper {
            margin-top: 6rem;
            max-width: 500px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 12px;
            text-align: center;
        }
        .failed-icon {
            font-size: 4rem;
            color: #dc3545; /* Bootstrap's red color for danger */
            margin-bottom: 20px;
            animation: shake 0.8s; /* A subtle shake animation for a failure state */
        }
        .main-heading {
            font-weight: 600;
            color: #212529;
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
        /* Keyframe for a subtle shake animation on the icon */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
        }
    </style>
@endpush
@section('content')
<div class="container failed-wrapper">
    <i class="fas fa-exclamation-circle failed-icon"></i>
    
    <h2 class="main-heading text-danger mb-3">Payment Failed!</h2>
    
    <p class="sub-text mb-4">
        Unfortunately, your transaction could not be processed. Please check your payment details or try again.
    </p>
    
    <div class="alert alert-danger mb-4" role="alert">
        <i class="fas fa-info-circle me-2"></i> Insufficient funds or card details are incorrect.
    </div>

    <div class="transaction-details text-start mb-4">
        <div class="detail-item">
            <span class="detail-label">Attempted ID:</span>
            <span class="detail-value">TXN_FAIL987654</span>
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
        <a href="#" class="btn btn-danger btn-lg">Try Again</a>
        <a href="#" class="btn btn-outline-secondary btn-lg">Return to Homepage</a>
    </div>
</div>
@endsection
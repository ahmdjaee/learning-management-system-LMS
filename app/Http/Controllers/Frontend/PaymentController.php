<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function payWithPaypal()
    {
        $provider = new PayPalClient();
        $provider->getAccessToken();

        $payableAmount = cartTotal();

        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency'),
                        'value' => $payableAmount
                    ]
                ]
            ]
        ]);

        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link["href"]);
                }
            }
        }
    }

    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient();
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $capture = $response['purchase_units'][0]["payments"]["captures"];

            $transactionId = $capture[0]['id'];
            $paidAmount = $capture[0]['amount']['value'];
            $currencyCode = $capture[0]['amount']['currency_code'];

            try {
                OrderService::storeOrder(
                    $transactionId,
                    auth('web')->id(),
                    'approved',
                    $paidAmount,
                    $paidAmount,
                    $currencyCode,
                    'paypal'
                );
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
}

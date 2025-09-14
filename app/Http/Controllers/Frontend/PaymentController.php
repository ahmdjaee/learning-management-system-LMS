<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function orderSuccess()
    {
        return view('frontend.pages.order-success');
    }

    public function orderFailed()
    {
        return view('frontend.pages.order-failed');
    }

      public function paypalConfig(): array
    {
        return [
            'mode' => config('gateway_settings.paypal_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id' => config('gateway_settings.paypal_client_id'),
                'client_secret' => config('gateway_settings.paypal_client_secret'),
                'app_id' => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id' => config('gateway_settings.paypal_client_id'),
                'client_secret' => config('gateway_settings.paypal_client_secret'),
                'app_id' => config('gateway_settings.paypal_app_id'),
            ],

            'payment_action' =>"Sale", // Can only be 'Sale', 'Authorization' or 'Order'
            'currency' => config('gateway_settings.paypal_currency'),
            'notify_url' => '', // Change this accordingly for your application.
            'locale' => "en_US", // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl' => true, // Validate SSL when creating api client.
        ];
    }

    public function payWithPaypal()
    {
        $provider = new PayPalClient($this->paypalConfig());
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
        $provider = new PayPalClient($this->paypalConfig());
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

                return redirect()->route('order.success');
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return redirect()->route('order.failed');

    }
}

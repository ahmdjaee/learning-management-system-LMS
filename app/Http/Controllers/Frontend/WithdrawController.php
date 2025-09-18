<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index(): View
    {
        return view('frontend.instructor-dashboard.withdraw.index');
    }

    public function createRequestPayout(): View
    {
        $currentBalance = auth()->user()->wallet;
        $pendingBalance = Withdraw::where('instructor_id', auth()->id())->where('status', 'pending')->sum('amount');
        $totalPayout = Withdraw::where('instructor_id', auth()->id())->where('status', 'approved')->sum('amount');
        $currencyIcon = config('settings.currency_icon');

        return view('frontend.instructor-dashboard.withdraw.request-payout', compact(
            'currentBalance',
            'pendingBalance',
            'totalPayout',
            'currencyIcon'
        ));
    }

    public function storeRequestPayout(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => ['required', 'numeric']
        ]);

        if (auth('web')->user()->wallet < $request->amount) {
            notyf()->error('Insufficient Balance!');
            return redirect()->back();
        }

        if (Withdraw::where('instructor_id', auth('web')->user()->id)->where('status', 'pending')->exists()) {
            notyf()->error('Withdraw request already pending!');
            return redirect()->back();
        }

        $withdraw = new Withdraw();
        $withdraw->instructor_id = auth()->id();
        $withdraw->amount = $request->amount;
        $withdraw->save();

        notyf()->success('Withdraw request sent!');
        return redirect()->back();
    }
}

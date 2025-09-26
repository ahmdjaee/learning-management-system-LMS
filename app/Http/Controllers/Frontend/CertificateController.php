<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CertificateBuilder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()  {
        $certificate = CertificateBuilder::first();

        // return view('frontend.student-dashboard.enrolled-course.certificate', compact('certificate'));
            return Pdf::loadView('frontend.student-dashboard.enrolled-course.certificate', compact('certificate'))
            ->setPaper('a4', 'landscape')->stream('certificate.pdf');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CertificateBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index() :View {
        $certificate = CertificateBuilder::first();

        return view('frontend.student-dashboard.enrolled-course.certificate', compact('certificate'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CertificateBuilder;
use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function download(Course $course)
    {
        $certificate = CertificateBuilder::first();

        $html = view('frontend.student-dashboard.enrolled-course.certificate', compact('certificate'))->render();

        $html = str_replace(
            [
                '[student_name]',
                '[date]',
                '[platform_name]',
                '[course_title]',
                '[instructor_name]'
            ],
            [
                auth()->user()->name,
                date('d F, Y'),
                'Edu Core',
                $course->title,
                $course->instructor->name,
            ],
            $html
        );

        return Pdf::loadHTML($html)->setPaper('a4', 'landscape')->download('certificate.pdf');
    }
}

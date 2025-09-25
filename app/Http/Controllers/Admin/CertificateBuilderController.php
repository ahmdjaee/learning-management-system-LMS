<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificateBuilderUpdateRequest;
use App\Models\CertificateBuilder;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificateBuilderController extends Controller
{
    use FileUpload;

    public function index(): View
    {
        $certificate = CertificateBuilder::first();

        return view('admin.certificate-builder.index', compact('certificate'));
    }

    public function update(CertificateBuilderUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        // Validation rules
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'background' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'title_x' => 'required|integer',
        //     'title_y' => 'required|integer',
        //     'title_color' => 'required|string',
        //     'subtitle_x' => 'required|integer',
        //     'subtitle_y' => 'required|integer',
        //     'subtitle_color' => 'required|string',
        //     'description_x' => 'required|integer',
        //     'description_y' => 'required|integer',
        //     'description_color' => 'required|string',
        //     'signature_x' => 'required|integer',
        //     'signature_y' => 'required|integer',
        //     'show_grid' => 'boolean',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        try {
            // Get or create certificate record
            $certificate = CertificateBuilder::first();
            if (!$certificate) {
                $certificate = new CertificateBuilder();
            }

            // Handle file uploads
            $backgroundPath = $certificate->background;
            $signaturePath = $certificate->signature;

            if ($request->hasFile('background')) {
                // Delete old background if exists
                $this->deleteFile($backgroundPath);

                $backgroundPath = $this->uploadFile($request->file('background'));
                ;
            }

            if ($request->hasFile('signature')) {
                // Delete old signature if exists
                $this->deleteFile($signaturePath);

                $signaturePath = $this->uploadFile($request->file('signature'));
            }

            // Update certificate data
            $certificate->fill([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'background' => $backgroundPath,
                'signature' => $signaturePath,
                'title_x' => $request->title_x,
                'title_y' => $request->title_y,
                'title_color' => $request->title_color,
                'subtitle_x' => $request->subtitle_x,
                'subtitle_y' => $request->subtitle_y,
                'subtitle_color' => $request->subtitle_color,
                'description_x' => $request->description_x,
                'description_y' => $request->description_y,
                'description_color' => $request->description_color,
                'signature_x' => $request->signature_x,
                'signature_y' => $request->signature_y,
                'show_grid' => $request->has('show_grid') ? true : false,
            ]);

            $certificate->save();

            notyf()->success('Updated Successfully!');

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update certificate: ' . $e->getMessage())
                ->withInput();
        }
    }
}

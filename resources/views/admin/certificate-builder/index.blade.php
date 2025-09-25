{{-- @extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Content</h3>
            </div>
            <div class="card-body">
              <form
                action="{{ route('admin.certificate-builder.update') }}"
                method="post"
                enctype="multipart/form-data"
              >
                @csrf
                <div class="mb-3">
                  <label class="form-label">Certificate Title</label>
                  <input
                    class="form-control"
                    id=""
                    name="title"
                    type="text"
                    value="{{ old('title') ?? $certificate?->title }}"
                    placeholder="Enter certificate title"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Certificate Subtitle</label>
                  <input
                    class="form-control"
                    id=""
                    name="sub_title"
                    type="text"
                    value="{{ old('sub_title') ?? $certificate?->sub_title }}"
                    placeholder="Enter certificate sub title"
                  >
                  <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Certificate Description</label>
                  <textarea
                    class="form-control"
                    name="description"
                    placeholder="Enter certificate description"
                  >{{ old('description') ?? $certificate?->description }}</textarea>
                  <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <div class="mb-3">
                  <x-input-file-block
                    name="background"
                    accept="image/*"
                    label="Certificate Background"
                    :value="old('background') ?? $certificate?->background"
                  />
                </div>
                <div class="mb-3">
                  <x-input-file-block
                    name="signature"
                    accept="image/*"
                    label="Certificate Signature"
                    :value="old('signature') ?? $certificate?->signature"
                  />
                </div>

                <div class="d-flex gap-2">
                  <button class="btn btn-light" type="reset">Reset</button>
                  <button class="btn btn-primary" type="submit">
                    <i class="ti ti-device-floppy me-2" style="font-size: 24px;"></i>
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Builder</h3>
            </div>
            <div class="card-body">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection --}}

{{-- @extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <form
        class="row form-certificate"
        action="{{ route('admin.certificate-builder.update') }}"
        method="post"
        enctype="multipart/form-data"
      >
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Content</h3>
            </div>
            <div class="card-body">
              @csrf
              <div class="mb-3">
                <label class="form-label">Certificate Title</label>
                <div class="d-flex gap-2">
                  <input
                    class="form-control"
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title') ?? $certificate?->title }}"
                    placeholder="Enter certificate title"
                  >
                  <input
                    class="form-control form-control-color"
                    id="title-color"
                    type="color"
                    value="#000000"
                    title="Choose title color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
              </div>
              <div class="mb-3">
                <label class="form-label">Certificate Subtitle</label>
                <div class="d-flex gap-2">
                  <input
                    class="form-control"
                    id="sub_title"
                    name="sub_title"
                    type="text"
                    value="{{ old('sub_title') ?? $certificate?->sub_title }}"
                    placeholder="Enter certificate sub title"
                  >
                  <input
                    class="form-control form-control-color"
                    id="subtitle-color"
                    type="color"
                    value="#666666"
                    title="Choose subtitle color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
              </div>
              <div class="mb-3">
                <label class="form-label">Certificate Description</label>
                <div class="d-flex gap-2">
                  <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    placeholder="Enter certificate description"
                  >{{ old('description') ?? $certificate?->description }}</textarea>
                  <input
                    class="form-control form-control-color"
                    id="description-color"
                    type="color"
                    value="#333333"
                    title="Choose description color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
              </div>
              <div class="mb-3">
                <x-input-file-block
                  id="background-input"
                  name="background"
                  accept="image/*"
                  label="Certificate Background"
                  :value="old('background') ?? $certificate?->background"
                />
              </div>
              <div class="mb-3">
                <x-input-file-block
                  id="signature-input"
                  name="signature"
                  accept="image/*"
                  label="Certificate Signature"
                  :value="old('signature') ?? $certificate?->signature"
                />
              </div>

              <div class="mb-3">
                <label class="form-label">Grid Options</label>
                <div class="form-check form-switch">
                  <input
                    class="form-check-input"
                    id="show-grid"
                    type="checkbox"
                    checked
                  >
                  <label class="form-check-label" for="show-grid">Show Grid</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Builder</h3>
              <div class="card-actions">
                <button
                  class="btn btn-sm btn-secondary"
                  type="button"
                  onclick="resetPositions()"
                >Reset
                  Positions</button>
                <button class="btn btn-sm btn-secondary reset-data" type="button">Reset
                  Changes</button>
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="ti ti-device-floppy me-1" style="font-size: 14px;"></i>
                  Save
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="certificate-preview" id="certificate-preview">
                <!-- Grid overlay -->
                <div class="grid-overlay" id="grid-overlay"></div>

                <!-- Certificate background -->
                <div class="certificate-bg" id="certificate-bg"></div>

                <!-- Draggable elements -->
                <div
                  class="draggable-text title-text"
                  id="draggable-title"
                  style="top: 150px; left: 50%; transform: translateX(-50%);"
                >
                  <span class="text-content">Certificate Title</span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-text subtitle-text"
                  id="draggable-subtitle"
                  style="top: 200px; left: 50%; transform: translateX(-50%);"
                >
                  <span class="text-content">Certificate Subtitle</span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-text description-text"
                  id="draggable-description"
                  style="top: 350px; left: 50%; transform: translateX(-50%);"
                >
                  <span class="text-content">Certificate Description</span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-signature"
                  id="draggable-signature"
                  style="bottom: 100px; right: 150px;"
                >
                  <img
                    src=""
                    alt="Signature"
                    style="max-width: 150px; max-height: 80px;"
                  >
                  <div class="drag-handle"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-warning mt-3" style="background-color: var(--tblr-bg-surface)">
            Don't forget to save, or your changes will be lost.</div>
        </div>
      </form>
    </div>
  </div>

  <style>
    .certificate-preview {
      width: 100%;
      aspect-ratio: 16 / 9;
      position: relative;
      /* border: 2px solid #ddd; */
      background: #fff;
      margin: 0 auto;
      overflow: hidden;
      cursor: crosshair;
    }

    .certificate-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .grid-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
      background-image:
        linear-gradient(to right, rgba(0, 0, 0, 0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 1px, transparent 1px);
      background-size: 20px 20px;
    }

    .draggable-text {
      position: absolute;
      cursor: move;
      z-index: 10;
      text-align: center;
      user-select: none;
      padding: 5px;
      border: 2px dashed transparent;
      transition: border-color 0.2s;
    }

    .draggable-text:hover {
      border-color: #007bff;
    }

    .draggable-text.active {
      border-color: #dc3545;
    }

    .draggable-signature {
      position: absolute;
      cursor: move;
      z-index: 10;
      border: 2px dashed transparent;
      transition: border-color 0.2s;
      padding: 5px;
    }

    .draggable-signature:hover {
      border-color: #007bff;
    }

    .draggable-signature.active {
      border-color: #dc3545;
    }

    .title-text .text-content {
      font-size: 36px;
      font-weight: bold;
      font-family: 'Times New Roman', serif;
      color: #000;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .subtitle-text .text-content {
      font-size: 24px;
      font-weight: normal;
      font-family: 'Times New Roman', serif;
      color: #666;
    }

    .description-text .text-content {
      font-size: 16px;
      font-weight: normal;
      font-family: Arial, sans-serif;
      color: #333;
      max-width: 600px;
      line-height: 1.4;
    }

    .drag-handle {
      position: absolute;
      top: -5px;
      right: -5px;
      width: 15px;
      height: 15px;
      background: #007bff;
      border-radius: 50%;
      opacity: 0;
      transition: opacity 0.2s;
      cursor: move;
    }

    .draggable-text:hover .drag-handle,
    .draggable-signature:hover .drag-handle {
      opacity: 1;
    }

    .grid-overlay.hidden {
      display: none;
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
      .certificate-preview {
        transform: scale(0.8);
        transform-origin: top center;
      }
    }

    @media (max-width: 992px) {
      .certificate-preview {
        transform: scale(0.6);
        transform-origin: top center;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let isDragging = false;
      let currentElement = null;
      let startX, startY, startLeft, startTop;

      // Initialize draggable functionality
      initializeDraggables();

      // Handle input changes
      setupInputHandlers();

      // Handle file uploads
      setupFileHandlers();

      // Handle grid toggle
      setupGridToggle();

      // Init value
      initValue()

      // Load existing background and signature if available
      loadCertificateImage()

      $('.reset-data').on('click', function() {
        $('.form-certificate').trigger('reset');
        initValue();
        loadCertificateImage();
      })

      function initializeDraggables() {
        const draggables = document.querySelectorAll('.draggable-text, .draggable-signature');

        draggables.forEach(element => {
          element.addEventListener('mousedown', startDrag);
        });

        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', stopDrag);
      }

      function startDrag(e) {
        isDragging = true;
        currentElement = e.currentTarget;
        currentElement.classList.add('active');

        startX = e.clientX;
        startY = e.clientY;

        const rect = currentElement.getBoundingClientRect();
        const parentRect = currentElement.parentElement.getBoundingClientRect();

        startLeft = rect.left - parentRect.left;
        startTop = rect.top - parentRect.top;

        e.preventDefault();
      }

      function drag(e) {
        if (!isDragging || !currentElement) return;
        
        const deltaX = e.clientX - startX;
        const deltaY = e.clientY - startY;

        const newLeft = startLeft + deltaX;
        const newTop = startTop + deltaY;

        // Constrain to preview area
        const preview = document.getElementById('certificate-preview');
        const maxLeft = preview.offsetWidth - currentElement.offsetWidth;
        const maxTop = preview.offsetHeight - currentElement.offsetHeight;

        const constrainedLeft = Math.max(0, Math.min(newLeft, maxLeft));
        const constrainedTop = Math.max(0, Math.min(newTop, maxTop));

        currentElement.style.left = constrainedLeft + 'px';
        currentElement.style.top = constrainedTop + 'px';
        currentElement.style.transform = 'none';
        console.log("🚀 ~ drag ~ currentElement:", currentElement.id, constrainedLeft + 'px')

      }

      function stopDrag() {
        if (currentElement) {
          currentElement.classList.remove('active');
          currentElement = null;
        }
        isDragging = false;
      }

      function setupInputHandlers() {
        // Title input
        const titleInput = document.getElementById('title');
        const titleElement = document.querySelector('#draggable-title .text-content');
        const titleColor = document.getElementById('title-color');

        titleInput.addEventListener('input', function() {
          titleElement.textContent = this.value || 'Certificate Title';
        });

        titleColor.addEventListener('change', function() {
          titleElement.style.color = this.value;
        });

        // Subtitle input
        const subtitleInput = document.getElementById('sub_title');
        const subtitleElement = document.querySelector('#draggable-subtitle .text-content');
        const subtitleColor = document.getElementById('subtitle-color');

        subtitleInput.addEventListener('input', function() {
          subtitleElement.textContent = this.value || 'Certificate Subtitle';
        });

        subtitleColor.addEventListener('change', function() {
          subtitleElement.style.color = this.value;
        });

        // Description input
        const descriptionInput = document.getElementById('description');
        const descriptionElement = document.querySelector('#draggable-description .text-content');
        const descriptionColor = document.getElementById('description-color');

        descriptionInput.addEventListener('input', function() {
          descriptionElement.textContent = this.value || 'Certificate Description';
        });

        descriptionColor.addEventListener('change', function() {
          descriptionElement.style.color = this.value;
        });
      }

      function setupFileHandlers() {
        // Background image handler
        const backgroundInput = document.querySelector('input[name="background"]');
        if (backgroundInput) {
          backgroundInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                document.getElementById('certificate-bg').style.backgroundImage =
                  `url(${e.target.result})`;
              };
              reader.readAsDataURL(file);
            }
          });
        }

        // Signature image handler
        const signatureInput = document.querySelector('input[name="signature"]');
        if (signatureInput) {
          signatureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                const signatureImg = document.querySelector('#draggable-signature img');
                signatureImg.src = e.target.result;
                signatureImg.style.display = 'block';
              };
              reader.readAsDataURL(file);
            }
          });
        }
      }

      function setupGridToggle() {
        const gridToggle = document.getElementById('show-grid');
        const gridOverlay = document.getElementById('grid-overlay');

        gridToggle.addEventListener('change', function() {
          if (this.checked) {
            gridOverlay.classList.remove('hidden');
          } else {
            gridOverlay.classList.add('hidden');
          }
        });
      }

      // Global function for reset button
      window.resetPositions = function() {
        const titleEl = document.getElementById('draggable-title');
        const subtitleEl = document.getElementById('draggable-subtitle');
        const descriptionEl = document.getElementById('draggable-description');
        const signatureEl = document.getElementById('draggable-signature');

        titleEl.style.top = '150px';
        titleEl.style.left = '50%';
        titleEl.style.transform = 'translateX(-50%)';

        subtitleEl.style.top = '200px';
        subtitleEl.style.left = '50%';
        subtitleEl.style.transform = 'translateX(-50%)';

        descriptionEl.style.top = '350px';
        descriptionEl.style.left = '50%';
        descriptionEl.style.transform = 'translateX(-50%)';

        signatureEl.style.bottom = '100px';
        signatureEl.style.right = '150px';
        signatureEl.style.top = 'auto';
        signatureEl.style.left = 'auto';
        signatureEl.style.transform = 'none';
      };

      // Initialize with existing values if any
      function initValue() {
        const titleInput = document.getElementById('title');
        const subtitleInput = document.getElementById('sub_title');
        const descriptionInput = document.getElementById('description');

        if (titleInput.value) {
          document.querySelector('#draggable-title .text-content').textContent = titleInput.value;
        }
        if (subtitleInput.value) {
          document.querySelector('#draggable-subtitle .text-content').textContent = subtitleInput
            .value;
        }
        if (descriptionInput.value) {
          document.querySelector('#draggable-description .text-content').textContent =
            descriptionInput.value;
        }
      }

      function loadCertificateImage() {
        @if (isset($certificate) && $certificate->background)
          document.getElementById('certificate-bg').style.backgroundImage =
            `url({{ asset($certificate->background) }})`;
        @endif

        @if (isset($certificate) && $certificate->signature)
          const signatureImg = document.querySelector('#draggable-signature img');
          signatureImg.src = '{{ asset($certificate->signature) }}';
          signatureImg.style.display = 'block';
        @endif
      }
    });
  </script>
@endsection --}}


@extends('admin.layouts.master')

@section('content')
  <div class="page-body">
    <div class="container-xl">
      <form
        class="row form-certificate"
        action="{{ route('admin.certificate-builder.update') }}"
        method="post"
        enctype="multipart/form-data"
      >
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Content</h3>
            </div>
            <div class="card-body">
              @csrf
              
              <!-- Hidden inputs for position data -->
              <input type="hidden" id="title_x" name="title_x" value="{{ old('title_x') ?? $certificate?->title_x ?? 50 }}">
              <input type="hidden" id="title_y" name="title_y" value="{{ old('title_y') ?? $certificate?->title_y ?? 150 }}">
              <input type="hidden" id="subtitle_x" name="subtitle_x" value="{{ old('subtitle_x') ?? $certificate?->subtitle_x ?? 50 }}">
              <input type="hidden" id="subtitle_y" name="subtitle_y" value="{{ old('subtitle_y') ?? $certificate?->subtitle_y ?? 200 }}">
              <input type="hidden" id="description_x" name="description_x" value="{{ old('description_x') ?? $certificate?->description_x ?? 50 }}">
              <input type="hidden" id="description_y" name="description_y" value="{{ old('description_y') ?? $certificate?->description_y ?? 350 }}">
              <input type="hidden" id="signature_x" name="signature_x" value="{{ old('signature_x') ?? $certificate?->signature_x ?? 150 }}">
              <input type="hidden" id="signature_y" name="signature_y" value="{{ old('signature_y') ?? $certificate?->signature_y ?? 100 }}">
              <input type="hidden" id="show_grid_hidden" name="show_grid" value="1">

              <div class="mb-3">
                <label class="form-label">Certificate Title</label>
                <div class="d-flex gap-2">
                  <input
                    class="form-control"
                    id="title"
                    name="title"
                    type="text"
                    value="{{ old('title') ?? $certificate?->title }}"
                    placeholder="Enter certificate title"
                  >
                  <input
                    class="form-control form-control-color"
                    id="title-color"
                    name="title_color"
                    type="color"
                    value="{{ old('title_color') ?? $certificate?->title_color ?? '#000000' }}"
                    title="Choose title color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
              </div>
              
              <div class="mb-3">
                <label class="form-label">Certificate Subtitle</label>
                <div class="d-flex gap-2">
                  <input
                    class="form-control"
                    id="sub_title"
                    name="sub_title"
                    type="text"
                    value="{{ old('sub_title') ?? $certificate?->sub_title }}"
                    placeholder="Enter certificate sub title"
                  >
                  <input
                    class="form-control form-control-color"
                    id="subtitle-color"
                    name="subtitle_color"
                    type="color"
                    value="{{ old('subtitle_color') ?? $certificate?->subtitle_color ?? '#666666' }}"
                    title="Choose subtitle color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('sub_title')" />
              </div>
              
              <div class="mb-3">
                <label class="form-label">Certificate Description</label>
                <div class="d-flex gap-2">
                  <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    placeholder="Enter certificate description"
                  >{{ old('description') ?? $certificate?->description }}</textarea>
                  <input
                    class="form-control form-control-color"
                    id="description-color"
                    name="description_color"
                    type="color"
                    value="{{ old('description_color') ?? $certificate?->description_color ?? '#333333' }}"
                    title="Choose description color"
                  >
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
              </div>
              
              <div class="mb-3">
                <x-input-file-block
                  id="background-input"
                  name="background"
                  accept="image/*"
                  label="Certificate Background"
                  :value="old('background') ?? $certificate?->background"
                />
              </div>
              
              <div class="mb-3">
                <x-input-file-block
                  id="signature-input"
                  name="signature"
                  accept="image/*"
                  label="Certificate Signature"
                  :value="old('signature') ?? $certificate?->signature"
                />
              </div>

              <div class="mb-3">
                <label class="form-label">Grid Options</label>
                <div class="form-check form-switch">
                  <input
                    class="form-check-input"
                    id="show-grid"
                    type="checkbox"
                    {{ (old('show_grid') ?? $certificate?->show_grid ?? true) ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="show-grid">Show Grid</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Certificate Builder</h3>
              <div class="card-actions">
                <button
                  class="btn btn-sm btn-secondary"
                  type="button"
                  onclick="resetPositions()"
                >Reset Positions</button>
                <button class="btn btn-sm btn-secondary reset-data" type="button">Reset Changes</button>
                <button class="btn btn-sm btn-primary" type="submit">
                  <i class="ti ti-device-floppy me-1" style="font-size: 14px;"></i>
                  Save
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="certificate-preview" id="certificate-preview">
                <!-- Grid overlay -->
                <div class="grid-overlay" id="grid-overlay"></div>

                <!-- Certificate background -->
                <div class="certificate-bg" id="certificate-bg"></div>

                <!-- Draggable elements -->
                <div
                  class="draggable-text title-text"
                  id="draggable-title"
                  style="top: {{ $certificate?->title_y ?? 150 }}px; left: {{ $certificate?->title_x ?? 50 }}px;"
                >
                  <span class="text-content" style="color: {{ $certificate?->title_color ?? '#000000' }}">
                    {{ $certificate?->title ?? 'Certificate Title' }}
                  </span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-text subtitle-text"
                  id="draggable-subtitle"
                  style="top: {{ $certificate?->subtitle_y ?? 200 }}px; left: {{ $certificate?->subtitle_x ?? 50 }}px;"
                >
                  <span class="text-content" style="color: {{ $certificate?->subtitle_color ?? '#666666' }}">
                    {{ $certificate?->sub_title ?? 'Certificate Subtitle' }}
                  </span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-text description-text"
                  id="draggable-description"
                  style="top: {{ $certificate?->description_y ?? 350 }}px; left: {{ $certificate?->description_x ?? 50 }}px;"
                >
                  <span class="text-content" style="color: {{ $certificate?->description_color ?? '#333333' }}">
                    {{ $certificate?->description ?? 'Certificate Description' }}
                  </span>
                  <div class="drag-handle"></div>
                </div>

                <div
                  class="draggable-signature"
                  id="draggable-signature"
                  style="bottom: {{ $certificate?->signature_y ?? 100 }}px; right: {{ $certificate?->signature_x ?? 150 }}px;"
                >
                  <img
                    src="{{ $certificate?->signature_url ?? '' }}"
                    alt="Signature"
                    style="max-width: 150px; max-height: 80px; {{ $certificate?->signature ? '' : 'display: none;' }}"
                  >
                  <div class="drag-handle"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-warning mt-3" style="background-color: var(--tblr-bg-surface)">
            Don't forget to save, or your changes will be lost.
          </div>
        </div>
      </form>
    </div>
  </div>

  <style>
    .certificate-preview {
      width: 100%;
      aspect-ratio: 16 / 9;
      position: relative;
      background: #fff;
      margin: 0 auto;
      overflow: hidden;
      cursor: crosshair;
    }

    .certificate-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .grid-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
      background-image:
        linear-gradient(to right, rgba(0, 0, 0, 0.1) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 1px, transparent 1px);
      background-size: 20px 20px;
    }

    .draggable-text {
      position: absolute;
      cursor: move;
      z-index: 10;
      text-align: center;
      user-select: none;
      padding: 5px;
      border: 2px dashed transparent;
      transition: border-color 0.2s;
    }

    .draggable-text:hover {
      border-color: #007bff;
    }

    .draggable-text.active {
      border-color: #dc3545;
    }

    .draggable-signature {
      position: absolute;
      cursor: move;
      z-index: 10;
      border: 2px dashed transparent;
      transition: border-color 0.2s;
      padding: 5px;
    }

    .draggable-signature:hover {
      border-color: #007bff;
    }

    .draggable-signature.active {
      border-color: #dc3545;
    }

    .title-text .text-content {
      font-size: 36px;
      font-weight: bold;
      font-family: 'Times New Roman', serif;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .subtitle-text .text-content {
      font-size: 24px;
      font-weight: normal;
      font-family: 'Times New Roman', serif;
    }

    .description-text .text-content {
      font-size: 16px;
      font-weight: normal;
      font-family: Arial, sans-serif;
      max-width: 600px;
      line-height: 1.4;
    }

    .drag-handle {
      position: absolute;
      top: -5px;
      right: -5px;
      width: 15px;
      height: 15px;
      background: #007bff;
      border-radius: 50%;
      opacity: 0;
      transition: opacity 0.2s;
      cursor: move;
    }

    .draggable-text:hover .drag-handle,
    .draggable-signature:hover .drag-handle {
      opacity: 1;
    }

    .grid-overlay.hidden {
      display: none;
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
      .certificate-preview {
        transform: scale(0.8);
        transform-origin: top center;
      }
    }

    @media (max-width: 992px) {
      .certificate-preview {
        transform: scale(0.6);
        transform-origin: top center;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let isDragging = false;
      let currentElement = null;
      let startX, startY, startLeft, startTop;

      // Initialize draggable functionality
      initializeDraggables();
      setupInputHandlers();
      setupFileHandlers();
      setupGridToggle();
      initValue();
      loadCertificateImage();

      $('.reset-data').on('click', function() {
        $('.form-certificate').trigger('reset');
        initValue();
        loadCertificateImage();
        resetPositions();
      });

      function initializeDraggables() {
        const draggables = document.querySelectorAll('.draggable-text, .draggable-signature');

        draggables.forEach(element => {
          element.addEventListener('mousedown', startDrag);
        });

        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', stopDrag);
      }

      function startDrag(e) {
        isDragging = true;
        currentElement = e.currentTarget;
        currentElement.classList.add('active');

        startX = e.clientX;
        startY = e.clientY;

        const rect = currentElement.getBoundingClientRect();
        const parentRect = currentElement.parentElement.getBoundingClientRect();

        startLeft = rect.left - parentRect.left;
        startTop = rect.top - parentRect.top;

        e.preventDefault();
      }

      function drag(e) {
        if (!isDragging || !currentElement) return;
        
        const deltaX = e.clientX - startX;
        const deltaY = e.clientY - startY;

        const newLeft = startLeft + deltaX;
        const newTop = startTop + deltaY;

        // Constrain to preview area
        const preview = document.getElementById('certificate-preview');
        const maxLeft = preview.offsetWidth - currentElement.offsetWidth;
        const maxTop = preview.offsetHeight - currentElement.offsetHeight;

        const constrainedLeft = Math.max(0, Math.min(newLeft, maxLeft));
        const constrainedTop = Math.max(0, Math.min(newTop, maxTop));

        currentElement.style.left = constrainedLeft + 'px';
        currentElement.style.top = constrainedTop + 'px';
        currentElement.style.transform = 'none';
        
        // Update hidden inputs with position data
        updatePositionInputs(currentElement, constrainedLeft, constrainedTop);
      }

      function stopDrag() {
        if (currentElement) {
          currentElement.classList.remove('active');
          currentElement = null;
        }
        isDragging = false;
      }

        function updatePositionInputs(element, left, top) {
        const preview = document.getElementById('certificate-preview');
        const previewWidth = preview.offsetWidth;
        
        if (element.id === 'draggable-title') {
          document.getElementById('title_x').value = Math.round(left );
          document.getElementById('title_y').value = Math.round(top);
        } else if (element.id === 'draggable-subtitle') {
          document.getElementById('subtitle_x').value = Math.round(left );
          document.getElementById('subtitle_y').value = Math.round(top);
        } else if (element.id === 'draggable-description') {
          document.getElementById('description_x').value = Math.round(left );
          document.getElementById('description_y').value = Math.round(top);
        } else if (element.id === 'draggable-signature') {
          // For signature, we calculate from right and bottom
          const rightPos = previewWidth - left - element.offsetWidth;
          const bottomPos = preview.offsetHeight - top - element.offsetHeight;
          document.getElementById('signature_x').value = Math.round(rightPos);
          document.getElementById('signature_y').value = Math.round(bottomPos);
        }
      }
      function setupInputHandlers() {
        // Title input
        const titleInput = document.getElementById('title');
        const titleElement = document.querySelector('#draggable-title .text-content');
        const titleColor = document.getElementById('title-color');

        titleInput.addEventListener('input', function() {
          titleElement.textContent = this.value || 'Certificate Title';
        });

        titleColor.addEventListener('change', function() {
          titleElement.style.color = this.value;
        });

        // Subtitle input
        const subtitleInput = document.getElementById('sub_title');
        const subtitleElement = document.querySelector('#draggable-subtitle .text-content');
        const subtitleColor = document.getElementById('subtitle-color');

        subtitleInput.addEventListener('input', function() {
          subtitleElement.textContent = this.value || 'Certificate Subtitle';
        });

        subtitleColor.addEventListener('change', function() {
          subtitleElement.style.color = this.value;
        });

        // Description input
        const descriptionInput = document.getElementById('description');
        const descriptionElement = document.querySelector('#draggable-description .text-content');
        const descriptionColor = document.getElementById('description-color');

        descriptionInput.addEventListener('input', function() {
          descriptionElement.textContent = this.value || 'Certificate Description';
        });

        descriptionColor.addEventListener('change', function() {
          descriptionElement.style.color = this.value;
        });
      }

      function setupFileHandlers() {
        // Background image handler
        const backgroundInput = document.querySelector('input[name="background"]');
        if (backgroundInput) {
          backgroundInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                document.getElementById('certificate-bg').style.backgroundImage =
                  `url(${e.target.result})`;
              };
              reader.readAsDataURL(file);
            }
          });
        }

        // Signature image handler
        const signatureInput = document.querySelector('input[name="signature"]');
        if (signatureInput) {
          signatureInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                const signatureImg = document.querySelector('#draggable-signature img');
                signatureImg.src = e.target.result;
                signatureImg.style.display = 'block';
              };
              reader.readAsDataURL(file);
            }
          });
        }
      }

      function setupGridToggle() {
        const gridToggle = document.getElementById('show-grid');
        const gridOverlay = document.getElementById('grid-overlay');

        gridToggle.addEventListener('change', function() {
          document.getElementById('show_grid_hidden').value = this.checked ? '1' : '0';
          if (this.checked) {
            gridOverlay.classList.remove('hidden');
          } else {
            gridOverlay.classList.add('hidden');
          }
        });
      }

      // Global function for reset button
      window.resetPositions = function() {
        const titleEl = document.getElementById('draggable-title');
        const subtitleEl = document.getElementById('draggable-subtitle');
        const descriptionEl = document.getElementById('draggable-description');
        const signatureEl = document.getElementById('draggable-signature');

        titleEl.style.top = '150px';
        titleEl.style.left = '200px';
        // titleEl.style.transform = 'translateX(-50%)';

        subtitleEl.style.top = '200px';
        subtitleEl.style.left = '200px';
        // subtitleEl.style.transform = 'translateX(-50%)';

        descriptionEl.style.top = '250px';
        descriptionEl.style.left = '200px';
        // descriptionEl.style.transform = 'translateX(-50%)';

        signatureEl.style.bottom = '100px';
        signatureEl.style.right = '150px';
        signatureEl.style.top = 'auto';
        signatureEl.style.left = 'auto';
        // signatureEl.style.transform = 'none';

        // Reset hidden inputs
        document.getElementById('title_x').value = 200;
        document.getElementById('title_y').value = 150;
        document.getElementById('subtitle_x').value = 200;
        document.getElementById('subtitle_y').value = 200;
        document.getElementById('description_x').value = 200;
        document.getElementById('description_y').value = 250;
        document.getElementById('signature_x').value = 150;
        document.getElementById('signature_y').value = 100;
      };

      // Initialize with existing values
      function initValue() {
        const titleInput = document.getElementById('title');
        const subtitleInput = document.getElementById('sub_title');
        const descriptionInput = document.getElementById('description');

        if (titleInput.value) {
          document.querySelector('#draggable-title .text-content').textContent = titleInput.value;
        }
        if (subtitleInput.value) {
          document.querySelector('#draggable-subtitle .text-content').textContent = subtitleInput.value;
        }
        if (descriptionInput.value) {
          document.querySelector('#draggable-description .text-content').textContent = descriptionInput.value;
        }
      }

      function loadCertificateImage() {
        @if (isset($certificate) && $certificate->background)
          document.getElementById('certificate-bg').style.backgroundImage =
            `url({{ asset($certificate->background) }})`;
        @endif

        @if (isset($certificate) && $certificate->signature)
          const signatureImg = document.querySelector('#draggable-signature img');
          signatureImg.src = '{{ asset($certificate->signature) }}';
          signatureImg.style.display = 'block';
        @endif
      }
    });
  </script>
@endsection
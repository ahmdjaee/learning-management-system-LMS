@push('header-scripts')
  <style>
    .file-uploaded {
      box-shadow: inset 0 40px 40px -25px rgba(0, 167, 22, 0.76);
      background-color: #151f2c;
      animation: uploaded 0.5s ease-in-out;
    }

    @keyframes uploaded {
      from {
        background-color: #1c293a;
        box-shadow: inset 0 30px 30px -10px rgba(0, 167, 22, 0);
      }

      to {
        background-color: #151f2c;
        box-shadow: inset 0 40px 40px -25px rgba(0, 167, 22, 0.76);
      }
    }
  </style>
@endpush
<div class="mb-3 position-relative">
  <small class="position-absolute text-white file-name-{{ $name }} text-truncate"
    style="top: 34px; left: 10px;"
  >{{ $value }}</small>
  <label class="form-label text-capitalize">{{ $label ?? $name }}</label>

  <!-- Wrapper -->
  <div
    class="p-3 text-center form-control wrapper-{{ $name }} {{ $value ? 'file-uploaded' : '' }}"
    id="{{ $name }}"
    style="cursor:pointer;"
  >
    <img
      class="img-fluid my-2 rounded "
      id="preview-{{ $name }}"
      src="{{ $value }}"
      style="max-height: 200px; object-fit: contain;"
    />

      <p class="text-muted mb-0">Click to choose image</p>

  </div>

  <!-- Input file hidden -->
  <input
    class="form-control d-none"
    id="file-{{ $name }}"
    name="{{ $name }}"
    type="file"
    accept="{{ $accept ?? 'image/*' }}"
    @if (!empty($required)) required @endif
  >

  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>

@push('bottom-scripts')
  <script>
    document.addEventListener('reset', function() {
      document.getElementById("preview-{{ $name }}").src = "{{ $value }}";
    })
    document.getElementById("{{ $name }}").addEventListener("click", function() {
      document.getElementById("file-{{ $name }}").click();
    });

    document.getElementById("file-{{ $name }}").addEventListener("change", function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(evt) {
          document.getElementById("preview-{{ $name }}").src = evt.target.result;
          document.querySelector(".file-name-{{ $name }}").textContent = file.name;
          document.querySelector(".wrapper-{{ $name }}").classList.add(
            "file-uploaded");
        }
        reader.readAsDataURL(file);
      }
    });
  </script>
@endpush

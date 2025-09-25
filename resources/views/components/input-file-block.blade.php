{{-- <div class="mb-3">
  <label class="form-label text-capitalize">{{ $label ?? $name }}</label>
  <input
    class="form-control"
    name="{{ $name }}"
    type="file"
    value="{{ $value }}"
    accept="{{ $accept }}"
    required={{ $required }}
  >
  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div> --}}
<div class="mb-3">
  <label class="form-label text-capitalize">{{ $label ?? $name }}</label>

  <!-- Wrapper -->
  <div
    class="p-3 text-center form-control"
    id="{{ $name }}"
    style="cursor:pointer;"
  >
    <img
      class="img-fluid mb-2 rounded"
      id="preview-{{ $name }}"
      src="{{ $value }}"
      style="max-height: 200px; object-fit: contain;"
    />

    <p class="text-muted mb-0">Klik untuk pilih gambar</p>
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

<script>
  document.addEventListener('reset', function(){
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
      }
      reader.readAsDataURL(file);
    }
  });
</script>

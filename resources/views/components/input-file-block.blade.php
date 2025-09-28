<style>
  .file-uploaded {
    box-shadow: inset 0 40px 40px -25px rgba(0, 167, 22, 0.76);
    background-color: #222;
    animation: uploaded 0.5s ease-in-out;
  }

  @keyframes uploaded {
    from {
      background-color: #333;
      box-shadow: inset 0 30px 30px -10px rgba(0, 167, 22, 0);
    }

    to {
      background-color: #222;
      box-shadow: inset 0 40px 40px -25px rgba(0, 167, 22, 0.76);
    }
  }
</style>
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
      class="img-fluid my-2 rounded"
      id="preview-{{ $name }}"
      src="{{ $value }}"
      style="max-height: 200px; object-fit: contain;"
    />

    @if (!$value)
      <p class="text-muted mb-0">Klik untuk pilih gambar</p>
    @endif
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

<div class="mb-3">
  <label class="form-label text-capitalize">{{ $label ? $label : $name }}</label>
  <input
    class="form-control"
    name="{{ $name }}"
    type="text"
    placeholder="{{ $placeholder }}"
    autofocus
    required={{ $required }}
    value="{{ $value }}"
  >
  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>

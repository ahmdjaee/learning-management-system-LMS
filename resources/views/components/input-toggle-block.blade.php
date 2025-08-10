<div class="mb-3">
  <div class="form-label text-capitalize">{{ $label ? $label : $name }}</div>
  <label class="form-check form-switch">
    <input
      class="form-check-input"
      name="{{ $name }}"
      type="checkbox"
      @if (!empty($value)) value="{{ $value }}" @endif
      @checked($checked)
    >
    <span class="form-check-label">{{ $formCheckLabel }}</span>
  </label>
  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>

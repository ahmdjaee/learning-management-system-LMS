<div class="mb-3 show-modal-icon" style="cursor: pointer">
  <label class="form-label">{{ $label ? $label : $name }}</label>
  <div class="input-group mb-2">
    <span class="input-group-text">
      Choose Icon
    </span>
    <input
      class="form-control"
      id="iconText"
      name="{{ $name }}"
      type="text"
      style="cursor: pointer"
      {{ $required }}
      placeholder="No icon chosen"
      onkeydown="return false;"
      onpaste="return false;"
      value="{{ $value }}"
    >
    {{-- <div class="form-control" id="iconText"></div> --}}
  </div>
  <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>

@push('bottom-section')
  <div
    class="modal modal-blur fade"
    id="iconModal"
    role="dialog"
    aria-hidden="true"
    tabindex="-1"
  >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title">Icon lists</h5> --}}
          <button
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <x-icon-list />
        </div>
      </div>
    </div>
  </div>
@endpush

@push('bottom-scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let modalEl = document.getElementById("iconModal")
      document.addEventListener("click", function(e) {
        let target = e.target.closest("a[data-icon]");
        if (target) {
          let iconName = target.getAttribute("data-icon");

          document.querySelector("input[name=icon]").value = iconName;
          document.getElementById("iconText").value = iconName;

          const modal = bootstrap.Modal.getInstance(modalEl);
          modal.hide();
          modalEl.addEventListener('hidden.bs.modal', () => {
            modal.dispose();
          }, {
            once: true
          });
        }
      });
    })
  </script>
@endpush

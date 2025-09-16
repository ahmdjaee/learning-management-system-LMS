<div class="col-12 col-md-3 border-end">
  <div class="card-body">
    <h4 class="subheader">Business settings</h4>
    <div class="list-group list-group-transparent">
      <a class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}"
        href="{{ route('admin.settings.index') }}"
      >General Settings</a>
      <a class="list-group-item list-group-item-action d-flex align-items-center {{ request()->routeIs('admin.commission-settings') ? 'active' : '' }}"
        href="{{ route('admin.commission-settings') }}"
      >
        Commission Settings</a>
      <a class="list-group-item list-group-item-action d-flex align-items-center"
        href="#">Connected Apps</a>
      <a class="list-group-item list-group-item-action d-flex align-items-center"
        href="./settings-plan.html"
      >Plans</a>
      <a class="list-group-item list-group-item-action d-flex align-items-center"
        href="#">Billing &amp; Invoices</a>
    </div>
    <h4 class="subheader mt-4">Experience</h4>
    <div class="list-group list-group-transparent">
      <a class="list-group-item list-group-item-action" href="#">Give Feedback</a>
    </div>
  </div>
</div>

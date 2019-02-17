@extends('layout')

@section('title', 'Settings')

@section('main')
  <h1 class="mb-3">Settings</h1>
  <form method="post">
    @csrf
    <div class="form-check">
      @if ($maintenanceActive)
        <input class="form-check-input" type="checkbox" checked="checked" id="maintenance">
      @else
        <input class="form-check-input" type="checkbox" value="" id="maintenance">
      @endif
      <label class="form-check-label" for="maintenance">
        Maintenance Mode
      </label>
      <small class="form-text text-muted">
        If this box is checked, the site will be in maintenance mode.
      </small>
    </div>
    <input type="submit" value="Save" class="btn btn-primary mt-3">
  </form>
@endsection

@extends(backpack_user() && (starts_with(\Request::path(), config('backpack.base.route_prefix'))) ? 'backpack::layouts.top_left' : 'backpack::layouts.plain')
{{-- show error using sidebar layout if looged in AND on an admin page; otherwise use a blank page --}}

@php
  $title = 'Error '.$error_number;
@endphp

@section('after_styles')
  <style>
    .error_number {
      font-size: 156px;
      font-weight: 600;
      line-height: 100px;
    }
    .error_number small {
      font-size: 56px;
      font-weight: 700;
    }

    .error_number hr {
      margin-top: 60px;
      margin-bottom: 0;
      width: 50px;
    }

    .error_title {
      margin-top: 40px;
      font-size: 36px;
      font-weight: 400;
    }

    .error_description {
      font-size: 24px;
      font-weight: 400;
    }
  </style>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 text-center">
    <div class="error_number">
      <small>ERROR</small><br>
      {{ $error_number }}
      <hr>
    </div>
    <div class="error_title text-muted">
      @yield('title')
    </div>
    <div class="error_description text-muted">
      <small>
        @yield('description')
     </small>
    </div>
  </div>
</div>
@endsection
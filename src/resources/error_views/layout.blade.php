@extends(backpack_user() && (starts_with(\Request::path(), config('backpack.base.route_prefix'))) ? 'backpack::layout' : 'backpack::layout_guest')
{{-- show error using sidebar layout if looged in AND on an admin page; otherwise use a blank page --}}

@php
  $title = 'Error '.$error_number;
@endphp

@section('content')
<div class="page">
  <div class="page-content">
    <div class="container text-center">
      <div class="display-1 text-muted mb-5"><i class="si si-exclamation"></i> {{ $error_number }}</div>
      <h1 class="h2 mb-3">
        @yield('title')
      </h1>
      <p class="h4 text-muted font-weight-normal mb-7">
        @yield('description')
      </p>
      <a class="btn btn-primary" href="javascript:history.back()">
        <i class="fe fe-arrow-left mr-2"></i>Go back
      </a>
    </div>
  </div>
</div>
@endsection
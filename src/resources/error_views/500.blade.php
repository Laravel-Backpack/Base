@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ 'admin' }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">500 error</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow text-center" style="font-size: 180px; float: none;"> 500</h2>

        <div class="text-center m-l-0">
          <h3 class="m-t-0"><i class="fa fa-warning text-yellow"></i> It's not you, it's me.</h3>

          <p>
            <?php
                $default_error_message = "An internal server error has occurred. If the error persists please contact the development team.";
            ?>
            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
@endsection

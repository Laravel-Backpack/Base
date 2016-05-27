@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ 'admin' }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">503 error</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="error-page">
        <h2 class="headline text-yellow text-center" style="font-size: 180px; float: none;"> 503</h2>

        <div class="text-center m-l-0">
          <h3 class="m-t-0"><i class="fa fa-warning text-yellow"></i> It's not you, it's me.</h3>

          <p>
            <?php
                $default_error_message = "The server is overloaded or down for maintenance. Please try again later.";
            ?>
            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
@endsection

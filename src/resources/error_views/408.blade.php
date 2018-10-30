@extends('errors.layout')

@section('error_number')
  408
@endsection

@section('title')
  Request timeout.
@endsection

@section('description')
  @php
    $default_error_message = "Please <a href='javascript:history.back()''>go back</a>, refresh the page and tru again.";

  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection
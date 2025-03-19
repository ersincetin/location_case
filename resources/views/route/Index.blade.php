@extends('layout.layout')
@section('Title','Location List')
@section('Meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('Css')
@endsection
@section('Content')
    @include('route.Body')
@endsection
@section('JavaScript')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSXcawvXc9FJ3FQkIUcUiduiVdmw1PHf8&loading=async&libraries=marker&callback=initMap" async="async" defer="defer" type="text/javascript"></script>
    @include('route.MapScript')
@endsection

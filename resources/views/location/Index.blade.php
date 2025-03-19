@extends('layout.layout')
@section('Title','Location List')
@section('Meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('Css')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('Content')
    @include('location.DataTable')
    @include('location.Modal')
@endsection
@section('JavaScript')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSXcawvXc9FJ3FQkIUcUiduiVdmw1PHf8&loading=async&libraries=marker&callback=initMap" async="async" defer="defer" type="text/javascript"></script>
    @include('location.Script')
    @include('location.MapScript')
@endsection

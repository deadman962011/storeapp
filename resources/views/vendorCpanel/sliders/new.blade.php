@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Sliders', 'Add New slider'];
    $page = $breadcrumb[count($breadcrumb)-1];
@endphp
@section('title')
<title> {{$page}} </title>
@endSection

@section('content')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                @include('widgets.pageHeader')
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <form action="{{ route('slider.new.post') }}" method="POST">
                            {{-- @include('vendorCpanel.categories.form.type') --}}
                            @include('vendorCpanel.sliders.form.general')
                            {{ csrf_field() }}
                            <input type="submit" value="Save" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

@section('script')
    <!-- Select2 -->
    {{-- <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script> --}}

    <script>
        $(function() {


        })
    </script>
@endSection

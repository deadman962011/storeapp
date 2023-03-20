@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Sliders', $slider->slider_name];
    $page = $breadcrumb[count($breadcrumb) - 1];
@endphp
@section('title')
    <title> {{ $page }} </title>
@endSection

@section('content')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                @include('widgets.pageHeader')
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-12 d-flex justify-content-end  my-2">
                                <a href="{{route('slide.new.get',['id'=>$slider->id])}}" class="btn btn-primary">+ Add new Slide</a>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Slide</th>
                                                    <th>Slide Action</th>
                                                    <th>Languages</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($slider->slides) > 0)
                                                    @foreach ($slider->slides as $item)
                                                        <tr>
                                                            <td>xxxx</td>
                                                            <td>Redirect to test tag </td>
                                                            <td>  @foreach ($configs['language'] as $language) <a href="{{route('slide.edit.get',['id'=>$slider->id,'slideId'=>$item->id,'lang'=>$language->config_key])}}">{{$language->config_key}}</a>    @endforeach  </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-primary dropdown-toggle"
                                                                        type="button" id="dropdownMenuButton"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <div class="dropdown-menu"
                                                                        aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">suspend</a>
                                                                        <a class="dropdown-item" href="#">delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        {{-- <form action="{{ route('slider.new.post') }}" method="POST">
                           
                            @include('vendorCpanel.sliders.form.general')
                            {{ csrf_field() }}
                            <input type="submit" value="Save" class="btn btn-primary">
                        </form> --}}
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

@extends('layout')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Categories', 'Properties List'];
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
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion" id="accordionProperty">
                                    @foreach ($properties as $property)
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between" id="heading{{$property->id}}">
                                                {{$property->strings['property_name']}}
                                                <div class="">
                                                    <a class="btn btn-info" href="{{ route('property.add-child.get',['id'=>$property->id]) }}">+</a>
                                                    <button class="btn btn-warning"
                                                        data-toggle="collapse" 
                                                        data-target="#collapse{{$property->id}}" 
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{$property->id}}"
                                                    >
                                                        <i class="fas fa-angle-left right"  ></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div id="collapse{{$property->id}}" class="collapse" aria-labelledby="heading{{$property->id}}"
                                                data-parent="#accordionProperty">
                                                <div class="card-body">
                                                    @foreach ($property->childs as $item)
                                                        {{$item->strings['property_name']}}
                                                        {{$item->property_value}}
                                                        <br>
                                                    @endforeach
                                                    {{-- {{$property->childs}} --}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

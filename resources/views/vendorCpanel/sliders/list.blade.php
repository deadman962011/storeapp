@extends('layout')
@section('style')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <style>
        
    </style>

@endSection

@php
    $breadcrumb = ['Dashboard', 'Sliders', 'Sliders list'];
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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Slider name</th>
                                                    <th>Slides count</th>
                                                    {{-- <th>Languages</th> --}}
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sliders as $item)
                                                    <tr>
                                                        <td>{{$item->slider_name}}</td>
                                                        <td>4</td>
                                                        <td >
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a class="dropdown-item" href="{{route('slider.show',['id'=>$item->id])}}">manage slides</a>
                                                                    <a class="dropdown-item" href="#">suspend</a>
                                                                    <a class="dropdown-item" href="#">delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                     
                                                    </tr>
                                                @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection

@section('script')


<script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {


      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        // processing: true,
        // serverSide: true,
        // ajax: url,
        // columns: [
        //     {
        //         data: 'category_permalink',
        //         name: 'Category thumbnail',
        //         orderable: true, 
        //         searchable: true
        //     },
            
        //     {
        //         data: 'strings.category_name',
        //         name: 'Category name',
        //         orderable: true, 
        //         searchable: true
        //     },
        //     {
        //         data: 'productsCount',
        //         name: 'Category products count',
        //         orderable: true, 
        //         searchable: true
            
        //     },
        //     {
        //         data:'languages',
        //         name:'Languages',
        //         orderable: true, 
        //         searchable: true
        //     },
        //     {
        //         data: 'action', 
        //         name: 'Actions', 
        //         orderable: true, 
        //         searchable: true
        //     },
        // ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });



    $(document).on('click','.testReload',function(){
        $('#example1').DataTable().ajax.reload()
    })
  </script>
@endSection
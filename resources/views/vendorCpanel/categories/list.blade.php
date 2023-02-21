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
    $breadcrumb = ['Dashboard', 'Categories', 'Categories List'];
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
                                                    <th>Category thumbnail</th>
                                                    <th>Category name</th>
                                                    <th>Category products count</th>
                                                    <th>Languages</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($categories as $item)
                                                    <tr>
                                                        <td>#</td>
                                                        <td>{{$item->strings['category_name']}}
                                                        </td>
                                                        <td>{{$item->category_type}}</td>
                                                        <td> 4</td>
                                                        <td class="d-flex">
                                                            <div class="btn btn-warning mx-2">#</div>
                                                            <div class="btn btn-danger">#</div>
                                                        </td>
                                                     
                                                    </tr>
                                                @endforeach --}}
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

        var type='{{$type}}';
        var url="{{ route('category.datatables',['type'=>':type']) }}";
        url = url.replace(':type',type);
        console.log(type)

      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        processing: true,
        // serverSide: true,
        ajax: url,
        columns: [
            {
                data: 'category_permalink',
                name: 'Category thumbnail',
                orderable: true, 
                searchable: true
            },
            
            {
                data: 'strings.category_name',
                name: 'Category name',
                orderable: true, 
                searchable: true
            },
            {
                data: 'productsCount',
                name: 'Category products count',
                orderable: true, 
                searchable: true
            
            },
            {
                data:'languages',
                name:'Languages',
                orderable: true, 
                searchable: true
            },
            {
                data: 'action', 
                name: 'Actions', 
                orderable: true, 
                searchable: true
            },
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });



    $(document).on('click','.testReload',function(){
        $('#example1').DataTable().ajax.reload()
    })
  </script>
@endSection
@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        #slider_section,#products_list_section{
            display: none;
        }
    </style>

@endSection

@php
    $breadcrumb = ['Dashboard', 'Layouts', 'Add New layout item'];
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
                        <form action="{{ route('layout.item.add.post',['permalink'=>$layout->layout_permalink]) }}" method="POST">
                            {{-- @include('vendorCpanel.categories.form.type') --}}
                            @include('vendorCpanel.layoutItems.form.general')
                            @include('vendorCpanel.layoutItems.form.slider')
                            @include('vendorCpanel.layoutItems.form.products-list')
                            <input type="hidden" value="{{$layout->id}}" name="layoutIdI">
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
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


            $(document).on('change', '#item_type', function() {
                if ($(this).val() === 'slider') {
                    //display inventory section
                    $('#slider_section').show()
                    //hide properties section
                    $('#products_list_section').hide()

                } else if ($(this).val() === 'list') {
                    //display properties section
                    $('#products_list_section').show()
                    //hide inventory section
                    $('#slider_section').hide()
                }
            })

            $(document).on('change', '#item-taxonomy', function() {
                if ($(this).val() === 'category') {
                    //get categories 
                    var url="{{route('api.category.all',['lang'=>'en','breakpoint'=>'all'])}}";
                    var titleName='category_name';
                } else if ($(this).val() === 'brand') {
                    //get brands
                    var url="{{route('api.brand.all',['lang'=>'en','breakpoint'=>'all'])}}";
                    var titleName='brand_name';
                }
                else if($(this).val() ==='tag'){

                    
                }

                $.get({url,success(data){
                    if(data.success){
                        var taxonomyInput=$("#taxonomy_id");
                        taxonomyInput.prop("disabled", false);
                        //remove select2 old options
                        taxonomyInput.select2('destroy').empty()
                        var options=[{id:0,text:'please select taxonomy'}];
                        
                        data.payload.forEach(item => {
                            options.push({id:item.id,text:item.strings[titleName]})
                        });
                        taxonomyInput.select2({data:options})
                    }
                }})
            })



        })
    </script>
@endSection

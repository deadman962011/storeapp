@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style>
        #slide_action_value_section div #action_value_text_input,
        #slide_action_value_section div .select2  {
            display: none;
        }
    </style>

@endSection

@php
    $breadcrumb = ['Dashboard', 'Sliders',$slider->slider_name,'Add New slide'];
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
                        <form action="{{ route('slide.new.post',['id'=>$slider->id]) }}" method="POST">
                            {{-- @include('vendorCpanel.categories.form.type') --}}
                            @include('vendorCpanel.sliders.form.generalSlide')
                            @include('vendorCpanel.sliders.form.actionSlide')
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

            //Category Type Checking
            $(document).on('change','#slide_action_type',function(){
                $('#slide_action_value_section').removeClass('d-none');
                var selectInput=$('#slide_action_value_section').find('.select2');
                var linkInput=$('#slide_action_value_section').find('input#action_value_text_input')
                if($(this).val()==='link'){
                    linkInput.show()
                    selectInput.hide()
                }
                else {
                    selectInput.show()
                    linkInput.hide()

                    if($(this).val()==='category'){
                        var url="{{route('api.category.all')}}";
                        var stringName='category_name';
                    }
                    else if($(this).val()==='brand'){
                        var url="{{route('api.brand.all')}}";
                        var stringName='brand_name';
                    }
                    else if($(this).val()==='tag'){
                        var url="";
                        var stringName='tag_name';
                    }

                    $.ajax({
                        url,
                        method:'GET',
                        success:function(resp){
                            if(resp.success){
                                $('#action_value_select_input').empty();
                                var items=resp.payload
                                if(items.length > 0){
                                    items.forEach(item => {
                                        var option=`<option value='${item.id}'>${item.strings[stringName]}</option`;
                                        $('#action_value_select_input').append(option)
                                    });
                                }
                            }
                        }
                    })
                }
            })
        })
    </script>
@endSection

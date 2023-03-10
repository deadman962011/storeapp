@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Configs', 'Add New config'];
    $page = $breadcrumb[count($breadcrumb)-1];
    $update=false;
@endphp
@section('title')
<title> {{$page}} </title>
@endSection

@section('content')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                @php
                    $page = 'Add new category ';
                    $breadcrumb = ['Dashboard', 'Categories', 'Add New Category'];
                @endphp
                @include('widgets.pageHeader')
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <form action="{{ route('category.new.post') }}" method="POST">
                            @include('vendorCpanel.categories.form.type')
                            @include('vendorCpanel.categories.form.general')
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
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Category Type Checking
            $(document).on('change','#category_type',function(){
                if($(this).val()==='main'){
                    $('#sub_cat_section').addClass('d-none');
                    $('#parent_cat_section').addClass('d-none');
                }
                else if($(this).val()==='sub'){
                    $('#sub_cat_section').addClass('d-none');
                    $('#parent_cat_section').removeClass('d-none')
                }
                else if($(this).val()==='child'){
                    $('#parent_cat_section').removeClass('d-none')
                    $('#sub_cat_section').removeClass('d-none')
                }

            })
            
            //set category sub option when parent selected
            $('#parent_select_input').on("select2:select", function(e) { 
                if($('#category_type:checked').val()==='child'){

                    //get child catgegories
                    var parentId=$('#parent_select_input').val();
                    var url=`{{route('fetch.subCategories',['parentId'=>":id"])}}`;
                    url = url.replace(':id',parentId);
                    $.ajax({
                        url,
                        method:'GET',
                        success:function(resp){
                            if(resp.success){
                                var categories=resp.payload.categories
                                if(categories.length > 0){
                                    categories.forEach(category => {
                                        var option=`<option value='${category.id}'>${category.strings['category_name']}</option`;
                                        $('#sub_select_input').append(option)
                                    });
                                }
                            }
                        }
                    })
                }
            });
        })
    </script>
@endSection

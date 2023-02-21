@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Properties', 'Add New property'];
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
                        <form action="{{ route('property.new.post') }}" method="POST">
                            {{-- @include('vendorCpanel.properties.form.type') --}}
                            @include('vendorCpanel.properties.form.general')
                            <input type="hidden" name="propertyTypeI" value="parent">
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

            //property Type Checking
            $(document).on('change','#property_type',function(){
                if($(this).val()==='main'){
                    $('#sub_prop_section').addClass('d-none');
                    $('#parent_prop_section').addClass('d-none');
                }
                else if($(this).val()==='sub'){
                    $('#sub_prop_section').addClass('d-none');
                    $('#parent_prop_section').removeClass('d-none')
                }

            })
            
            //set property sub option when parent selected
            $('#parent_select_input').on("select2:select", function(e) { 
                if($('#property_type:checked').val()==='child'){

                    //get child properties
                    var parentId=$('#parent_select_input').val();
                    var url=`{{route('fetch.subCategories',['parentId'=>":id"])}}`;
                    url = url.replace(':id',parentId);
                    $.ajax({
                        url,
                        method:'GET',
                        success:function(resp){
                            if(resp.success){
                                var properties=resp.payload.properties
                                if(properties.length > 0){
                                    properties.forEach(property => {
                                        var option=`<option value='${property.id}'>${property.strings['property_name']}</option`;
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

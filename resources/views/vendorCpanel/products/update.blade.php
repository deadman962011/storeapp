@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Products', 'Update '.old('productPermalinkI').' Product'];
    $page = $breadcrumb[count($breadcrumb) - 1];
    $update=true;
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
                        <form action="{{ route('product.edit.post',['productId'=>old('itemId'),'lang'=>old('language')] ) }}" method="POST">
                            @include('vendorCpanel.products.form.type')
                            @include('vendorCpanel.products.form.general')
                            @include('vendorCpanel.products.form.taxonomies')
                            @include('vendorCpanel.products.form.inventory')
                            @include('vendorCpanel.products.form.shipping')
                            @include('vendorCpanel.products.form.properties')
                            {{ csrf_field() }}
                            <input type="submit" value="Update" class="btn btn-warning">
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


        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        $('document').ready(function(){

            var brandVal=`{{old('productBrandI')}}`;
            var catVal=`{{old('productCatI')}}`;
            if(brandVal){
                console.log(brandVal)
                $("#product_brand_select2").select2('val',brandVal)
            }
            if(catVal){
                $("#product_cat_select2").select2('val',catVal)
            }
            
            var productType=$('#product_type:checked').val();
            if(productType && productType==='variable'){
                //display properties section
                $('#propties_section').show()

                //hide inventory section
                $('#inventory_section,#shipping_section').hide()

                //set properties
                var arr="{{old('productPropsI')}}"
                var props=JSON.parse(arr)
                $("#product_props_select2").val(props)
                $('#product_props_select2').trigger('change');

            }
            else if(productType==='simple'){
                //display inventory section
                $('#inventory_section,#shipping_section').show()
                //hide properties section
                $('#propties_section').hide()
            }
            else{
                $('#inventory_section,#shipping_section,#propties_section').hide()
            }


        })

    </script>
@endSection

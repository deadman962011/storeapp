@extends('layout')

@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endSection

@php
    $breadcrumb = ['Dashboard', 'Layouts', $layout->layout_name];
    $page = $breadcrumb[count($breadcrumb) - 1];
    $items = $layout->items->groupBy('item_breakpoint');
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
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="">Desktop/laptop</div>
                                        </div>
                                        <div id="desktop_list" class="row ">
                                            @if ( count($items) >0 && count($items['desktop']) > 0)
                                                @foreach ($items['desktop'] as $item)
                                                    <div class="col-sm-12 item-swap" data-id="{{$item->id}}">
                                                        <div class="card ">
                                                            <div class="card-body d-flex">
                                                                <div class="item-handler mx-2"><i class="fa fa-align-justify"></i></div>
                                                                @if ($item->attachment_type==='category')
                                                                    {{$item->attachment->strings['category_name']}}
                                                                @endif
                                                                @if ($item->attachment_type==='brand')
                                                                    {{$item->attachment->strings['brand_name']}}
                                                                @endif
                                                                @if ($item->attachment_type==='slider')
                                                                    {{$item->attachment->slider_name}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <a href="{{ route('layout.item.add.get', ['permalink' => $layout->layout_permalink]) }}">+Add new item</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <div class="">Mobile</div>
                                        </div>
                                        {{-- <div class="row">
                                            @if ( count($items) >0 && count($items['mobile']) > 0)
                                                @foreach ($items['mobile'] as $item)
                                                    <div class="col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                @if ($item->attachment_type==='category')
                                                                    {{$item->attachment->strings['category_name']}}
                                                                @endif
                                                                @if ($item->attachment_type==='brand')
                                                                    {{$item->attachment->strings['brand_name']}}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <a href="{{ route('layout.item.add.get', ['permalink' => $layout->layout_permalink]) }}">+Add new item</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.11/lib/draggable.bundle.js"></script>
    <script>

        var desktopList=document.querySelectorAll("#desktop_list")
        const sortableDesktop = new Draggable.Sortable(
            desktopList,
            { draggable: ".item-swap", handle: ".item-handler" }
        );

        sortableDesktop.on('sortable:stop', ()=>{

            //get new sort
            console.log(desktopList)


        });
    </script>

@endsection

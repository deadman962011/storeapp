<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/img/user3-128x128.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('vendor.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layouts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top rated page</p>
                            </a>
                        </li> --}}
                        @php
                            $layouts=\App\models\storeLayout::all();
                        @endphp
                        @foreach ($layouts as $layout)
                            <li class="nav-item">
                                <a href="{{route('layout.show.get',['permalink'=>$layout->layout_permalink])}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{$layout->layout_name}}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="{{route('layout.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new layout</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.byCondintion.get',['type'=>'simple','status'=>'all'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.byCondintion.get',['type'=>'variable','status'=>'all'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Variable products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.byCondintion.get',['type'=>'all','status'=>'0'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suspended products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.byType.get',['type'=>'main'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.byType.get',['type'=>'sub'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.byType.get',['type'=>'child'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Child Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('category.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            brands
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('brand.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new brand</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Properties
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('property.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('property.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new porperty</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Sliders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('slider.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Configs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('config.byType.get',['type'=>'all'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>all</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('config.byType.get',['type'=>'general'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('config.byType.get',['type'=>'currency'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Currencies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('config.byType.get',['type'=>'language'])}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Languages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('config.new.get')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add new config</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

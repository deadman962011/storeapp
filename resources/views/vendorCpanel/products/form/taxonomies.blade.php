<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Product Taxonomies</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group @error('productCatI') has-error @enderror">
                    <label>category</label>
                    <select id="product_cat_select2" class="form-control @error('productCatI') is-invalid @enderror select2" name="productCatI" style="width: 100%;">
                        <option value="0" selected="selected">Please select category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"  >
                                @if ($category->category_type ==='main')
                                    {{$category->strings['category_name']}}
                                @endif
                                @if ($category->category_type ==='sub')
                                    {{$category->parent->strings['category_name']}} >> {{$category->strings['category_name']}}
                                @endif
                                @if ($category->category_type ==='child')
                                    {{$category->parent->parent->strings['category_name']}} >> {{$category->parent->strings['category_name']}} >> {{$category->strings['category_name']}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('productCatI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group @error('productBrandI') has-error @enderror">
                    <label>brand</label>
                    <select id="product_brand_select2" class="form-control @error('productBrandI') is-invalid @enderror select2" name="productBrandI" style="width: 100%;">
                        <option value="0" selected="selected">Please select brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->strings['brand_name']}}</option>
                        @endforeach
                    </select>
                    @error('productBrandI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
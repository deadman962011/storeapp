<div id="products_list_section" class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Products list Layout Item </h3>
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
                <div class="form-group">
                    <label>Taxonomy type</label>
                    <select name="layoutItemTaxonomyI" id="item-taxonomy" class="form-select @error('layoutItemTaxonomyI') is-invalid @enderror" required>
                        <option >select taxonomy type</option>
                        <option value="category">category</option>
                        <option value="brand">brand</option>
                        <option value="category">tag</option>
                    </select>
                    @error('layoutItemTaxonomyI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group @error('layoutItemTaxonomyIdI') has-error @enderror">
                    <label>Taxonomy name</label>
                    <select id="taxonomy_id" class="select2bs4 form-control  @error('layoutItemTaxonomyIdI') is-invalid @enderror" name="layoutItemTaxonomyIdI" disabled>
                        {{-- @foreach ($properties as $property)
                            <option value="{{$property->id}}">{{$property->strings['property_name']}}</option>
                        @endforeach --}}
                    </select>
                    @error('layoutItemTaxonomyIdI')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product count</label>
                    <input type="number" min="1" value="6" name="productCountI"  class="form-control @error('productCountI') is-invalid @enderror">
                    @error('productCountI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
</div>

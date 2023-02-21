<div id="inventory_section" class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Product inventory</h3>
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
                    <label>Product price</label>
                    <input type="number" name="productPriceI" value="{{old('productPriceI')}}" class="form-control  @error('productPriceI') is-invalid @enderror">
                    @error('productPriceI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product sale price</label>
                    <input type="number" name="productSalePriceI" value="{{old('productSalePriceI')}}" class="form-control @error('productSalePriceI') is-invalid @enderror">
                    @error('productSalePriceI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product sku</label>
                    <input type="text" name="productSkuI" value="{{old('productSkuI')}}" class="form-control @error('productSkuI') is-invalid @enderror">
                    @error('productSkuI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product quantity</label>
                    <input type="text" name="productQtyI" value="{{old('productQtyI')}}" class="form-control @error('productQtyI') is-invalid @enderror">
                    @error('productQtyI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product stock status</label>
                    <select name="productInStockI" class="form-select @error('productInStockI') is-invalid @enderror">
                        <option value="1">in stock</option>
                        <option value="0">out of stock</option>
                        <option value="2">pre-order</option>
                    </select>
                    @error('productInStockI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" name="productSoldindividuallyI" id="soldindividuallyI" class="form-check-input">
                    <label for="#soldindividuallyI">Product sold individually</label>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
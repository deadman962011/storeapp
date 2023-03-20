<form action="{{ route('product.edit.post', ['productId' => $variation->id, 'lang' => old('language')]) }}"
    method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Product price</label>
                <input type="number" name="productPriceI" value="{{ $variation->regPrice }}"
                    class="form-control  @error('productPriceI') is-invalid @enderror">
                <span class="text-normal"> {{ $variation->price }} </span>
                @error('productPriceI')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Product sale price</label>
                <input type="number" name="productSalePriceI" value="{{ $variation->regSalePrice }}"
                    class="form-control @error('productSalePriceI') is-invalid @enderror">
                @error('productSalePriceI')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Product sku</label>
                <input type="text" name="productSkuI" value="{{ $variation->sku }}"
                    class="form-control @error('productSkuI') is-invalid @enderror">
                @error('productSkuI')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Product quantity</label>
                <input type="text" name="productQtyI" value="{{ $variation->quantity }}"
                    class="form-control @error('productQtyI') is-invalid @enderror">
                @error('productQtyI')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Product stock status</label>
                <select name="productInStockI" class="form-select @error('productInStockI') is-invalid @enderror">
                    <option value="1" @if ($variation->inStock === '1') selected @endif>in stock</option>
                    <option value="0" @if ($variation->inStock === '0') selected @endif>out of stock</option>
                    <option value="2" @if ($variation->inStock === '2') selected @endif>pre-order</option>
                </select>
                @error('productInStockI')
                    <span class="text-danger">{{ $message }}</span>
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
                <input type="checkbox" name="productSoldindividuallyI" id="soldindividuallyI" class="form-check-input"
                    @if (old('productSoldindividuallyI')) checked @endif>
                <label for="#soldindividuallyI">Product sold individually</label>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Product shipping collections</label>
                <select name="productShippingClassI" class="form-select select2">

                </select>
                {{-- <input type="text" name="3" id="3" class="form-control"> --}}
            </div>
            <!-- /.form-group -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Product shipping weight</label>
                <input type="text" value="{{ $variation->shpinigWeight }}" name="productShippingWeightI"
                    class="form-control">
            </div>
            <!-- /.form-group -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Product shipping length</label>
                <input type="text" value="{{ $variation->shpinigLength }}" name="productShippingLengthI"
                    value="" class="form-control">
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Product shipping width</label>
                <input type="text" value="{{ $variation->shipingWidth }}" name="productShippingWidthI"
                    value="" class="form-control">
            </div>
            <!-- /.form-group -->
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Product shipping height</label>
                <input type="text" value="{{ $variation->shipingHeight }}" name="productShippingHeightI"
                    value="" class="form-control">
            </div>
            <!-- /.form-group -->
        </div>
    </div>
    <!-- /.row -->


    <input type="hidden" name="productPermalinkI" value="{{ $variation->product_permalink }}">
    <input type="hidden" name="productCatI" value="{{ $variation->category->id }}">
    <input type="hidden" name="productBrandI" value="{{ $variation->brand->id }}">
    {{ csrf_field() }}

    <input type="submit" value="Update" class="btn btn-warning">
</form>

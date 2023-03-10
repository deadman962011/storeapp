<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Product Type</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Product type</label>
                    <div class="radio-group d-flex">
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="product_type" type="radio" name="productTypeI"
                                value="simple" @if (old('productTypeI') === 'simple') checked @endif
                                @if ($update) disabled @endif>
                            <label class="form-check-label">simple</label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="product_type" type="radio" name="productTypeI"
                                value="variable" @if (old('productTypeI') === 'variable') checked @endif
                                @if ($update) disabled @endif>
                            <label class="form-check-label">variable</label>
                        </div>
                    </div>
                    @error('productTypeI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>

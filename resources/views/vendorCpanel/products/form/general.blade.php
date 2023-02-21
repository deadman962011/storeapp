<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Product General Informations</h3>
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
                    <label>Product name</label>
                    <input type="text" name="productNameI" value="{{old('productNameI')}}"  class="form-control @error('productNameI') is-invalid @enderror">
                    @error('productNameI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Product permalink</label>
                    <input type="text" name="productPermalinkI" value="{{old('productPermalinkI')}}"   class="form-control @error('productPermalinkI') is-invalid @enderror">
                    @error('productPermalinkI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Product short description</label>
                    <textarea name="productShortDescI"  cols="30" rows="6" class="form-control  @error('productShortDescI') is-invalid @enderror">{{old('productShortDescI')}}</textarea>
                    @error('productShortDescI')
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
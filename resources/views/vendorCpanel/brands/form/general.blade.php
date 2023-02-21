<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Brand General Informations</h3>
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
                    <label>Brand name</label>
                    <input type="text" name="brandNameI"  class="form-control @error('brandNameI') is-invalid @enderror">
                    @error('brandNameI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Category permalink</label>
                    <input type="text" name="brandPermalinkI"  class="form-control @error('brandPermalinkI') is-invalid @enderror">
                    @error('brandPermalinkI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Brand description</label>
                    <textarea name="brandDescI" id="" cols="30" rows="6" class="form-control @error('brandDescI') is-invalid @enderror"></textarea>
                    @error('brandDescI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

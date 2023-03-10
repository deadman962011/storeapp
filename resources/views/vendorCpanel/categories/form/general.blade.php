<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Category General Informations</h3>
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
                    <label>Category name</label>
                    <input type="text" name="categoryNameI" value="{{old('categoryNameI')}}"  class="form-control @error('categoryNameI') is-invalid @enderror">
                    @error('categoryNameI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Category permalink</label>
                    <input type="text" name="categoryPermalinkI" value="{{old('categoryPermalinkI')}}"   class="form-control @error('categoryPermalinkI') is-invalid @enderror">
                    @error('categoryPermalinkI')
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
                    <label>Category description</label>
                    <textarea name="categoryDescI" id="" cols="30" rows="6" class="form-control @error('categoryDescI') is-invalid @enderror">{{old('categoryDescI')}}</textarea>
                    @error('categoryDescI')
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

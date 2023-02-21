<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">General Layout Item Informations</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label>Layout item name</label>
                    <input name="layoutItemNameI" class="form-control @error('layoutItemTypeI') is-invalid @enderror" required />
                    @error('layoutItemTypeI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->    
            </div> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label>Layout item type</label>
                    <select name="layoutItemTypeI" id="item_type" class="form-select @error('layoutItemTypeI') is-invalid @enderror" required>
                        <option >select layout type</option>
                        <option value="slider">slider</option>
                        <option value="list">products list</option>
                    </select>
                    @error('layoutItemTypeI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Layout item breakpoint</label>
                    <select name="layoutItemBreakpointI" class="form-select @error('layoutItemBreakpointI') is-invalid @enderror" required>
                        <option >select layout breakpoint</option>
                        <option value="desktop">Desktop</option>
                        <option value="mobile">Mobile</option>
                    </select>
                    @error('layoutItemBreakpointI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Config General Informations</h3>
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
                    <label>Config name</label>
                    <input type="text" name="configNameI" value="{{old('configNameI')}}"
                        class="form-control @error('configNameI') is-invalid @enderror">
                    @error('configNameI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Config type</label>
                    <select class="form-select @error('configTypeI') is-invalid @enderror" name="configTypeI" style="width: 100%;">
                        <option @if (!old('configTypeI')) selected="selected" @endif >Please select config type</option>
                        <option value="general" @if (old('configTypeI')==='general') selected @endif >General</option>
                        <option value="currency" @if (old('configTypeI')==='currency') selected @endif>Currencies</option>
                        <option value="language" @if (old('configTypeI')==='language') selected @endif>Languages</option>
                    </select>
                    @error('configTypeI')
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
                <div class="form-group">
                    <label>Config key</label>
                    <input type="text" name="configKeyI" value="{{old('configKeyI')}}"
                        class="form-control @error('configKeyI') is-invalid @enderror">
                    @error('configKeyI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Config value</label>
                    <input type="text" name="configValueI" value="{{old('configValueI')}}"
                        class="form-control @error('configValueI') is-invalid @enderror">
                    @error('configValueI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Config sub value</label>
                    <input type="text" name="configSubValueI" value="{{old('configSubValueI')}}"
                        class="form-control @error('configSubValueI') is-invalid @enderror">
                    @error('configSubValueI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Config description</label>
                    <textarea name="configDescI" id="" cols="30" rows="6"
                        class="form-control @error('configDescI') is-invalid @enderror">{{old('configDescI')}}</textarea>
                    @error('configDescI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

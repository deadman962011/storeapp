<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Slide Action Informations</h3>
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
                    <label>Slide Action</label>
                    <select id="slide_action_type" name="slideActionI" class="form-select @error('slideActionI') is-invalid @enderror">
                        <option selected >Please select slide action</option>
                        <option value="link" @if (old('slideActionI') === 'link') selected @endif >link</option>
                        <option value="category" @if (old('slideActionI') === 'category') selected @endif>redirect to category</option>
                        {{-- <option value="tag">redirect to tag</option> --}}
                        <option value="brand" @if (old('slideActionI') === 'brand') selected @endif>redirect to brand</option>
                    </select>
                    @error('slideActionI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div id="slide_action_value_section" class="col-md-6 d-none">
                <div class="form-group ">
                    <label>Slide Action value</label>
                    <input id="action_value_text_input" @if (old('slideActionI')==='link') value="{{old('slideActionValueI')}}"  @endif type="text" class="form-control @error('slideActionValueI') is-invalid @enderror" name="slideActionValueI">
                    <select id="action_value_select_input" class="form-control select2 @error('slideActionValueI') is-invalid @enderror" name="slideActionValueI"
                        style="width: 100%;">
                    </select>
                    @error('slideActionValueI')
                        <span class="text-danger">{{ $message }}</span>
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

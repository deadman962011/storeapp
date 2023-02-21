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
                        <option selected="selected">Please select slide action</option>
                        <option value="link">link</option>
                        <option value="category">redirect to category</option>
                        {{-- <option value="tag">redirect to tag</option> --}}
                        <option value="brand">redirect to brand</option>
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
                    <input id="action_value_text_input" type="text" class="form-control @error('slideActionValueI') is-invalid @enderror" name="slideActionValueI">
                    <select id="action_value_select_input" class="form-control select2bs4 @error('slideActionValueI') is-invalid @enderror" name="slideActionValueI"
                        style="width: 100%;">
                        
                        {{-- <option selected="selected">Please select parent category</option> --}}
                        {{-- @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->strings['category_name'] }}</option>
                        @endforeach --}}
                        {{-- <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option> --}}
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

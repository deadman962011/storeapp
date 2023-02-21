<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Property Type</h3>
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
                    <label>Property type</label>
                    <div class="radio-group d-flex">
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="property_type" type="radio" name="propertyTypeI"
                                value="main" checked>
                            <label class="form-check-label">Main</label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="property_type" type="radio" name="propertyTypeI"
                                value="sub">
                            <label class="form-check-label">Sub</label>
                        </div>
                        @error('propertyTypeI')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div  class="row ">
            <div id="parent_prop_section" class="col-md-6 d-none">
                <div class="form-group">
                    <label>Parent property</label>
                    <select id="parent_select_input" class="form-control select2 @error('propertyParentI') is-invalid @enderror" name="propertyParentI"
                        style="width: 100%;">
                        <option selected="selected">Please select parent property</option>
                        {{-- @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->strings['property_name'] }}</option>
                        @endforeach --}}
                        {{-- <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option> --}}
                    </select>
                    @error('propertyParentI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div id="sub_prop_section" class="col-md-6 d-none">
                <div class="form-group">
                    <label>Sub property</label>
                    <select id="sub_select_input" class="form-control select2 @error('propertySubI') is-invalid @enderror" name="propertySubI"
                        style="width: 100%;">
                        <option selected="selected">Please select sub property</option>
                        {{-- @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->strings['property_name'] }}</option>
                        @endforeach --}}
                        {{-- <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option> --}}
                    </select>
                    @error('propertySubI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>

<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Category Type</h3>
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
                    <label>Category type</label>
                    <div class="radio-group d-flex">
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="category_type" type="radio" name="categoryTypeI"
                                value="main" checked>
                            <label class="form-check-label">Main</label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="category_type" type="radio" name="categoryTypeI"
                                value="sub">
                            <label class="form-check-label">Sub</label>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" id="category_type" type="radio" name="categoryTypeI"
                                value="child">
                            <label class="form-check-label">Child</label>
                        </div>
                        @error('categoryTypeI')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div  class="row ">
            <div id="parent_cat_section" class="col-md-6 d-none">
                <div class="form-group">
                    <label>Parent category</label>
                    <select id="parent_select_input" class="form-control select2 @error('categoryParentI') is-invalid @enderror" name="categoryParentI"
                        style="width: 100%;">
                        <option selected="selected">Please select parent category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->strings['category_name'] }}</option>
                        @endforeach
                        {{-- <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option> --}}
                    </select>
                    @error('categoryParentI')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div id="sub_cat_section" class="col-md-6 d-none">
                <div class="form-group">
                    <label>Sub category</label>
                    <select id="sub_select_input" class="form-control select2 @error('categorySubI') is-invalid @enderror" name="categorySubI"
                        style="width: 100%;">
                        <option selected="selected">Please select sub category</option>
                        {{-- @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->strings['category_name'] }}</option>
                        @endforeach --}}
                        {{-- <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option> --}}
                    </select>
                    @error('categorySubI')
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

<div id="slider_section" class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Slider Layout Item </h3>
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
                    <label>Taxonomy type</label>
                    <select name="layoutItemSliderIdI" id="item-taxonomy" class="form-select @error('layoutItemSliderIdI') is-invalid @enderror" required>
                        <option >select slider</option>
                        @foreach ($sliders as $slider)
                            <option value="{{$slider->id}}">{{$slider->slider_name}}</option>
                        @endforeach
                        {{-- <option value="category">category</option>
                        <option value="brand">brand</option>
                        <option value="category">tag</option> --}}
                    </select>
                    @error('layoutItemSliderIdI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
</div>

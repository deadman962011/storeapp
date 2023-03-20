<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Slide General Informations</h3>
        {{-- {{dd(old())}} --}}
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
                    <label>Slide title</label>
                    {{-- {{dd(old())}} --}}
                    <input type="text" name="sliderTitleI" value="{{old('sliderTitleI')}}"  class="form-control @error('sliderTitleI') is-invalid @enderror">
                    @error('sliderTitleI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Slide Button Position</label>
                    <select name="slideBtnPositionI" class="form-select @error('slideBtnPositionI') is-invalid @enderror">
                        <option value="start"  @if(old('slideBtnPositionI') ==='start')  selected @endif >start</option>
                        <option value="center" @if(old('slideBtnPositionI') ==='center')  selected @endif>center</option>
                        <option value="end" @if(old('slideBtnPositionI')  ==='end')  selected @endif>end</option>
                        <option value="none" @if(old('slideBtnPositionI')  ==='none')  selected @endif>none</option>
                    </select>
                    @error('slideBtnPositionI')
                        <span class="text-danger">{{ $message }}</span>
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
                    <label>Slide text</label>
                    <textarea name="sliderTextI" id="" cols="30" rows="6" class="form-control @error('sliderTextI') is-invalid @enderror">{{old('sliderTextI')}}</textarea>
                    @error('sliderTextI')
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

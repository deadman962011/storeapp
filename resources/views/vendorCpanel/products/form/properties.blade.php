<div id="propties_section" class="card card-default ">
    <div class="card-header">
        <h3 class="card-title">Product Properties</h3>
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
                <div class="form-group @error('productPropsI') has-error @enderror">
                    <label>Properties</label>
                    <select class="select2bs4 form-control  @error('productPropsI') is-invalid @enderror" name="productPropsI[]" multiple="multiple">
                        @foreach ($properties as $property)
                            <option value="{{$property->id}}">{{$property->strings['property_name']}}</option>
                        @endforeach
                    </select>
                    @error('productPropsI')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

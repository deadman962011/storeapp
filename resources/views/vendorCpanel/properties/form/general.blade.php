<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Property General Informations</h3>
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
                    <label>Property name</label>
                    <input type="text" name="propertyNameI"  class="form-control @error('propertyNameI') is-invalid @enderror">
                    @error('propertyNameI')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    
                    @if ($page==='Add New property')
                        <label>Property type</label>
                        <select name="propertyValueI" class="form-select @error('propertyValueI') is-invalid @enderror">
                            <option value="color">colors</option>
                            <option value="size">sizes</option>
                            <option value="mstorage">memory storage</option>
                            <option value="others">others</option>
                        </select>
                        @error('propertyValueI')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    @endif
                    @if ($page==='Add New Child property')

                        @if ($property->property_value==='mstorage')
                            <label>Storage Value</label>
                            <select name="propertyValueI" class="form-select @error('propertyValueI') is-invalid @enderror">
                                <option value="32">32</option>
                                <option value="64">64</option>
                                <option value="128">128</option>
                                <option value="256">256</option>
                                <option value="512">512</option>
                                <option value="1Tera">1 Tera</option>
                            </select>
                        @endif
                        @if ($property->property_value==='color')
                            <label>Color Value</label>
                            <input type="color" name="propertyValueI"  class="form-control @error('propertyValueI') is-invalid @enderror">
                            @error('propertyValueI')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        @endif
                        @if ($property->property_value==='others')
                            <label> Value</label>
                            <input type="text" name="propertyValueI"  class="form-control @error('propertyValueI') is-invalid @enderror">
                            @error('propertyValueI')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        @endif
                        {{$property->property_value}}

                        {{-- <input type="text" name="propertyValueI"  class="form-control @error('propertyValueI') is-invalid @enderror">
                        @error('propertyValueI')
                            <span class="text-danger">{{$message}}</span>
                        @enderror --}}
                    @endif
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Property description</label>
                    <textarea name="propertyDescI" id="" cols="30" rows="6" class="form-control @error('propertyDescI') is-invalid @enderror"></textarea>
                    @error('propertyDescI')
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

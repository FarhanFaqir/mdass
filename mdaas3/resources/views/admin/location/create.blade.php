@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div>
            <ol class="breadcrumb mb-2 d-flex justify-content-between">
                <li class="breadcrumb-item active font-weight-bold text-dark">Add Location</li>

                <!-- Add Back Button -->
                <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-backward"></i></Button></a>
            </ol>
        </div>

        <div class=" m-auto">
            <div class="card">
                <div class="card-title"></div>
                <div class="card-body">
                    <form action="{{ route('location.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Location Name &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <input type="text" name="location_name" id="location_name" value="{{ old('location_name') }}" class="form-control" />
                                    @if ($errors->has('location_name'))
                                    <span class="text-danger">{{ $errors->first('location_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Division &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <select name="division" id="division" class=" form-control">
                                        <option value="">Select Division</option>
                                        <option value="Gilgit">Gilgit</option>
                                        <option value="Baltistan">Baltistan</option>
                                        <option value="Hunza">Hunza</option>
                                        <option value="Diamer">Diamer</option>
                                    </select>
                                    @if ($errors->has('division'))
                                    <span class="text-danger">{{ $errors->first('division') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">District &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <select name="district" id="district" class=" form-control">
                                        <option value="">Select District</option>
                                        <option value="Hunza">Hunza</option>
                                        <option value="Ghizer">Ghizer</option>
                                        <option value="Diamer">Diamer</option>
                                        <option value="Astore">Astore</option>
                                        <option value="Nagar">Nagar</option>
                                    </select>
                                    @if ($errors->has('district'))
                                    <span class="text-danger">{{ $errors->first('district') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Tehsil &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <select name="tehsil" id="tehsil" class=" form-control">
                                        <option value="">Select Tehsil</option>
                                        <option value="Aliabad">Aliabad</option>
                                        <option value="Danyore">Danyore</option>
                                    </select>
                                    @if ($errors->has('tehsil'))
                                    <span class="text-danger">{{ $errors->first('tehsil') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Mineral &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <select name="mineral" id="mineral" class=" form-control">
                                        <option value="">Select Mineral</option>
                                        <option value="Topas">Topas</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Ruby">Ruby</option>
                                        <option value="Cooper">Cooper</option>
                                        <option value="Aquamarine">Aquamarine</option>
                                    </select>
                                    @if ($errors->has('mineral'))
                                    <span class="text-danger">{{ $errors->first('mineral') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Latitute &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <input type="number" name="latitude" id="latitude" value="{{ old('latitude') }}" step="any" class="form-control" placeholder="0.00" />
                                    @if ($errors->has('latitude'))
                                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Longitude &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <input type="number" name="longitude" id="longitude" value="{{ old('longitude') }}" step="any" class="form-control" min="0" placeholder="0.00" />
                                    @if ($errors->has('longitude'))
                                    <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Description </label>
                                    <textarea class="form-control mt-0" id="description" name="description" rows="1">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <input type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;" value='Submit Location'>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</main>


@endsection
@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Room</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #0f172b; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>
        <div>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Add Room</li>
            </ol>
        </div>

        <div class=" m-auto">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <!-- left input elements -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 control-label font-weight-bold">Room Code &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="col-md-8">
                                                 <input type="text" name="room_code" id="room_code" placeholder="Room Code" value="{{ old('room_code') }}" class="form-control" />
                                                 @if ($errors->has('room_code'))
                                                    <span class="text-danger">{{ $errors->first('room_code') }}</span>
                                                 @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 control-label font-weight-bold">Floor &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="col-md-8">
                                                <select name="floor" class=" form-control">
                                                @if(!empty(old('floor')))
                                                    <option value="{{ old('floor') }}" selected>{{ old('floor') }}</option>
                                                @endif
                                                    <option value="">Please select floor</option>
                                                    <option value="Ground Floor">Ground Floor</option>
                                                    <option value="First Floor">First Floor</option>
                                                    <option value="Second Floor">Second Floor</option>
                                                    <option value="Third Floor">Third Floor</option>
                                                    <option value="Fourth Floor">Fourth Floor</option>
                                                </select>
                                                @if ($errors->has('floor'))
                                                    <span class="text-danger">{{ $errors->first('floor') }}</span>
                                                 @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 control-label font-weight-bold">Room Type &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="col-md-8">
                                                <select name="type" class="form-control">
                                                @if(!empty(old('type')))
                                                    <option value="{{ old('type') }}" selected>{{ old('type') }}</option>
                                                @endif
                                                    <option value="">Pleas select room type</option>
                                                    <option value="Single">Single Room</option>
                                                    <option value="Double">Double Room</option>
                                                    <option value="Three Beded">Three Beded Room</option>
                                                    <option value="Four Beded">Four Beded Room</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                                 @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 control-label font-weight-bold">Room Capacity &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="col-md-8">
                                                <input type="number" min="0" name="capacity" id="capacity" placeholder="0" value="{{ old('capacity') }}" class="form-control" />
                                                @if ($errors->has('capacity'))
                                                    <span class="text-danger">{{ $errors->first('capacity') }}</span>
                                                 @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                            <label class="col-md-4 control-label font-weight-bold">Price &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="col-md-8">
                                                <input type="number" name="fare" id="fare" value="{{ old('fare') }}" placeholder="0.00" min="0" class="form-control" />
                                                @if ($errors->has('fare'))
                                                    <span class="text-danger">{{ $errors->first('fare') }}</span>
                                                 @endif
                                            </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-4 control-label font-weight-bold">Image &nbsp<span style="color: red; font-size: 12px">*</span> </label>
                                            <div class="input-group col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control" id="">
                                                </div>
                                                @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right input elements -->
                                <div class="col-sm-6">
                                    <strong>SERVICES</strong>
                                    <br>
                                    <ul class="todo-list ui-sortable" style="max-height:175px;overflow-y: scroll;">
                                    @foreach($services as $service)
                                        <li class="" style="background:#f4f4f4; margin-bottom:2px; color: #444; padding: 2px; border-radius:2px">
                                            <input type="checkbox"  name="services[]" value="{{ $service->title }}">
                                            <small class="badge" style="color:#fff; background-color:#333">
                                                <i class="{{ $service->icon }}" aria-hidden="true"></i> 
                                            </small>
                                            {{ $service->title}}
                                        </li>
                                    @endforeach
                                    </ul>
                                    <div class="form-group mt-4">
                                        <label for="exampleFormControlTextarea1" class="font-weight-bold">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" name="submit" id="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



    </div>
</main>


@endsection
@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Food</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #0f172b; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>
        <div>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Add Food</li>
            </ol>
        </div>

        <div class=" m-auto">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Code &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="code" id="code" value="{{ old('code') }}" class="form-control" />
                                        @if ($errors->has('code'))
                                            <span class="text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Food Name &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="food_name" id="food_name" value="{{ old('food_name') }}" class="form-control" />
                                        @if ($errors->has('food_name'))
                                            <span class="text-danger">{{ $errors->first('food_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Cost &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="number" name="cost" id="cost" value="{{ old('cost') }}" class="form-control" min="0" step="0.01" placeholder="0" />
                                        @if ($errors->has('cost'))
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Price &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control" min="0" step="0.01" placeholder="0" />
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Category &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id" style="height: 38px;">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Unit &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="unit" id="unit" value="{{ old('unit') }}" class="form-control" />
                                        @if ($errors->has('unit'))
                                            <span class="text-danger">{{ $errors->first('unit') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Quantity Available &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="number" name="qty" id="qty" value="{{ old('qty') }}" class="form-control" min="0" placeholder="0" />
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Is Ready? &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <select class="form-control" name="is_ready" id="is_ready" style="height: 38px;">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                        </select>
                                        @if ($errors->has('is_ready'))
                                            <span class="text-danger">{{ $errors->first('is_ready') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Prepration Duration<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="time" name="duration" id="duration" value="{{ old('duration') }}" class="form-control"/>
                                        @if ($errors->has('duration'))
                                            <span class="text-danger">{{ $errors->first('duration') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;" value='Add Food'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



    </div>
</main>


@endsection
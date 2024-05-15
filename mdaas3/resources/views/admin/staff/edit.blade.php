@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Staff</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #4A6FDC; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>
        <div>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Edit Staff</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('admin/staff/update')}}/{{ $staff->id }}">
                            @csrf
                            <div class="form-group mb-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Staff Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="staff_name" required class="form-control" id="staff_name" value='{{ $staff->staff_name }}'>
                                    </div>
                                </div>
                                @if ($errors->has('staff_name'))
                                <span class="text-danger">{{ $errors->first('staff_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Designation</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="designation" required value="{{ $staff->designation }}" class="form-control" id="designation" value="{{ old('designation') }}">
                                    </div>
                                </div>
                                @if ($errors->has('designation'))
                                <span class="text-danger">{{ $errors->first('designation') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Pay Rate </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pay_rate" required value="{{ $staff->pay_rate }}" class="form-control" id="pay_rate" value="{{ old('pay_rate') }}">
                                    </div>
                                </div>
                                @if ($errors->has('pay_rate'))
                                <span class="text-danger">{{ $errors->first('pay_rate') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Fixed Amount </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fixed_amount" required value="{{ $staff->fixed_amount }}" class="form-control" id="fixed_amount" value="{{ old('fixed_amount') }}">
                                    </div>
                                </div>
                                @if ($errors->has('fixed_amount'))
                                <span class="text-danger">{{ $errors->first('fixed_amount') }}</span>
                                @endif
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary m-b-30 m-t-30">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</main>


@endsection
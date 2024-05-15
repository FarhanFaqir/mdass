@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Customer</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #0f172b; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>
        <div>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Add Customer</li>
            </ol>
        </div>

        <div class=" m-auto">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Name &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" class="form-control" />
                                        @if ($errors->has('customer_name'))
                                            <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">CNIC/PASSPORT # &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="cnic_passport" id="cnic_passport" value="{{ old('cnic_passport') }}" class="form-control" />
                                        @if ($errors->has('cnic_passport'))
                                            <span class="text-danger">{{ $errors->first('cnic_passport') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" class="form-control" />
                                        @if ($errors->has('telephone'))
                                            <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">City &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="city" id="city" value="{{ old('city') }}" class="form-control" />
                                        @if ($errors->has('city'))
                                            <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Mobile # &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control"/>
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Email &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Country &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <input type="text" name="country" id="country" value="{{ old('country') }}" class="form-control" />
                                        @if ($errors->has('country'))
                                            <span class="text-danger">{{ $errors->first('country') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Address &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                        <textarea class="form-control" id="description" name="address" rows="2">{{ old('address') }}</textarea>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label font-weight-bold">Notes</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="2">{{ old('notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;" value='Add Customer'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



    </div>
</main>


@endsection
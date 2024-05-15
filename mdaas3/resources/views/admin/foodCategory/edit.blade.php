@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Revenue</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #4A6FDC; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>
        <div>
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item active">Edit Revenue</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-title"></div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{url('admin/revenue/update')}}/{{$revenue->id}}">
                            @csrf
                            <div class="form-row">
                                <!-- clinic name -->
                                <div class="col-sm-12 col-md-6 p-2">
                                    <select name="clinic_name" id="" class="form-control">
                                        @if(!empty($revenue->clinic_name))
                                        <option value="{{ $revenue->clinic_name }}" selected>{{ $revenue->clinic_name }}</option>
                                        @endif
                                        @if(!empty(old('clinic_name')))
                                        <option value="{{ old('clinic_name') }}" selected>{{ old('clinic_name') }}</option>
                                        @endif
                                        <option value="">Select Clinic</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->name }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('clinic_name'))
                                    <span class="text-danger">{{ $errors->first('clinic_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <!-- no of patients -->
                                    <input type="number" name="no_of_patients" id="no_of_patients" value="{{ $revenue->no_of_patients }}" class="form-control" placeholder="No of Patients">
                                    @if ($errors->has('no_of_patients'))
                                    <span class="text-danger">{{ $errors->first('no_of_patients') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 p-2">
                                    <!-- date -->
                                    <input type="date" id="date" name="date" value="{{ $revenue->date }}" class="form-control" placeholder="Date">
                                    @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <!-- cash -->
                                    <input type="text" id="cash" name="cash" value="{{ $revenue->cash }}" class="form-control" placeholder="Cash">
                                </div>
                                <div class="col-sm-12 col-md-6 p-2">
                                    <!-- credit -->
                                    <input type="text" id="credit" name="credit" value="{{ $revenue->credit }}" class="form-control" placeholder="Credit Card">
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <!-- cheque -->
                                    <input type="text" id="cheque" name="cheque" value="{{ $revenue->cheque }}" class="form-control" placeholder="Cheque">
                                </div>
                                <div class="col-sm-12 col-md-6 p-2">
                                    <!-- care credit -->
                                    <input type="text" id="care_credit" name="care_credit" value="{{ $revenue->care_credit }}" class="form-control" placeholder="Care Credit">
                                </div>

                            </div>

                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <input type="number" id="other" name="other" oninput='handleClick(this);' value="{{ $revenue->other }}" class="form-control" placeholder="Other">
                                </div>
                                <div class="col-sm-12 col-md-6 p-2">
                                    <input type="text" id="description" name="description" value="{{ $revenue->description }}" class="form-control {{ $revenue->other ? '' : 'd-none'}}" placeholder="Description">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm m-b-30 m-t-30">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</main>

<script>
    
       function handleClick() {
        var element = document.getElementById("description");
        element.classList.remove("d-none");
        // element.classList.add("required");
    }
</script>


@endsection
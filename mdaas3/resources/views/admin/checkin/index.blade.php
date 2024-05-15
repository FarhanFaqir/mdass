@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid">

        <!-- <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active font-weight-bold">Check In</li>
        </ol> -->

        <div class="card">
            <form class="row" action="{{ url('admin/checkin') }}" method="POST">
                @csrf
                <div class="col-md-6 col-lg-6">
                    <h4 class="text-center font-weight-bold"><u>Check In Details</u></h4>
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Room &nbsp<span style="color: red; font-size: 12px">*</span></label>
                        <select name="room" id="room" class=" form-control">
                            <option value="">Please select room</option>
                            @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->floor }}-{{ $room->room_code }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('room'))
                        <span class="text-danger">{{ $errors->first('room') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Date &nbsp<span style="color: red; font-size: 12px">*</span></label>
                            <input type="date" id="date" name="date" class="form-control" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Time &nbsp<span style="color: red; font-size: 12px">*</span></label>
                            <input type="time" id="time" name="time" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Duration of Stay(Days) </label>
                            <input type="number" id="duration_days" name="duration_days" value="{{ old('duration_days') }}" class="form-control" min="0" placeholder="0" />
                            @if ($errors->has('duration_days'))
                            <span class="text-danger">{{ $errors->first('duration_days') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Duration of Stay(Hours) </label>
                            <input type="number" id="duration_hours" name="duration_hours" value="{{ old('duration_hours') }}" class="form-control" min="0" placeholder="0" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Adults </label>
                            <input type="number" id="adults" name="adults" value="{{ old('adults') }}" class="form-control" min="0" placeholder="0" />
                            @if ($errors->has('adults'))
                            <span class="text-danger">{{ $errors->first('adults') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Childrens </label>
                            <input type="number" id="childrens" name="childrens" value="{{ old('childrens') }}" class="form-control" min="0" placeholder="0" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Deposite </label>
                            <input type="number" id="deposite" name="deposite" step="0.01" value="{{ old('deposite') }}" class="form-control" min="0" placeholder="0" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label font-weight-bold">Vehical No </label>
                            <input type="text" id="vehicle_no" name="vehicle_no" value="{{ old('vehicle_no') }}" class="form-control" min="0" placeholder="0" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h4 class="text-center font-weight-bold"><u>Customer Details</u></h4>
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Choose Customer Type</label>
                        <select name="" id="customer_type" class=" form-control" onchange="selectCustomerList(event);">
                            <option value="1">Existing Customer</option>
                            <option value="2">New Customer</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="control-label font-weight-bold">Select Customer &nbsp<span style="color: red; font-size: 12px">*</span></label>
                        <select name="customer" id="customerlist" class=" form-control">
                            <option value="">Please select customer</option>
                        </select>
                        @if ($errors->has('customer'))
                        <span class="text-danger">{{ $errors->first('customer') }}</span>
                        @endif
                    </div>

                    <div class="form-group  mt-4">
                        <label class="control-label font-weight-bold">Reference </label>
                        <input type="text" name="reference" id="reference" value="{{ old('reference') }}" class="form-control mt-2" />
                    </div>
                    <div class="form-group mt-0">
                        <label for="exampleFormControlTextarea1" class="font-weight-bold mt-0">Description</label>
                        <textarea class="form-control mt-0" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;" value="Save Details">
                    </div>

                </div>
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal hide fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-center">
                    <h5 class="text-center font-weight-bold pt-3" id="exampleModalLongTitle"><u>New Customer Details</u></h5>

                </div>
                <div class="modal-body">
                    <form id="ajax_add_customer" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Name &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <input type="text" name="customer_name" required id="customer_name" value="{{ old('customer_name') }}" class="form-control" />
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
                                    <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" class="form-control" />
                                    @if ($errors->has('mobile'))
                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Email &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" />
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
                                    <textarea class="form-control" id="description" name="address" rows="1">{{ old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-weight-bold">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="1">{{ old('notes') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm ml-2" style="background-color: #0f172b; color: #fff;" onclick="addCustomer(event)">Add Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</main>

<script>
    var date = new Date();
    document.getElementById('date').valueAsDate = date;
    document.getElementById('time').value = date.toTimeString().substring(0, 5);
</script>

<script>
    function selectCustomerList(event) {
        //   console.log(event.target);
        if (event.target.value == "2")
            $('#addcustomer').modal();
    }

    function addCustomer(event) {
        $.post('/admin/customer/', $('#ajax_add_customer').serialize())
            .done(function(response) {
                if (response) {
                    document.getElementById("customerlist").options.length = 1;
                    $.get("/admin/customer/getCustomers", function(data, status) {
                        customerlist = document.querySelector('#customerlist');
                        //   list = JSON.parse(data);
                        //   keys= Object.keys(data);

                        //   console.log(data.lenght)

                        for (i = 0; i < data.length; i++) {
                            var item = document.createElement('option');
                            item.value = data[i].id;
                            item.innerHTML = data[i].customer_name;
                            customerlist.appendChild(item);
                        }
                    });
                    toastr.success('Customer Added Successfully.');
                    document.querySelector('#ajax_add_customer').reset();
                    $('#addcustomer').modal('hide')
                } else {
                    toastr.error('Something wrong.');
                }
            })
            .fail(function(response) {
                var err = JSON.parse(response.responseText);
                var errors = err.errors;
                for (const key in errors) {
                    // console.log(`${key}: ${errors[key]}`);
                    toastr.error(`${errors[key]}`);
                }
            });
    }

    $(document).ready(function() {
        document.getElementById("customerlist").options.length = 1;
        $.get("/admin/customer/getCustomers", function(data, status) {
            customerlist = document.querySelector('#customerlist');
            //   list = JSON.parse(data);
            //   keys= Object.keys(data);

            //   console.log(data.lenght)

            for (i = 0; i < data.length; i++) {
                var item = document.createElement('option');
                item.value = data[i].id;
                item.innerHTML = data[i].customer_name;
                customerlist.appendChild(item);
            }
        });
    })
</script>

@endsection
@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>

    <div class="container-fluid p-0 pl-3">
        <h2 class="">Check Out</h2>
    </div>


    <div class="contanier-fluid pl-3 pr-3">
        <ul class="nav nav-tabs card-header" style="background-color: #1d253e;">
            <li class=" p-1 font-weight-bold"><a class="active" href="#tab_billing_info" data-toggle="tab" aria-expanded="true">Billing Entry</a></li>
            <li class="p-1 ml-1 font-weight-bold"><a href="#tab_billing_room" data-toggle="tab" aria-expanded="false">Room Services</a></li>
            <li class="p-1 font-weight-bold ml-1"><a href="#tab_billing_details" data-toggle="tab" aria-expanded="false">Food Services</a></li>
            <li class="p-1 font-weight-bold ml-1"><a href="#tab_billing_complete" data-toggle="tab" aria-expanded="false">Finalize</a></li>
            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
        </ul>
        <form method="POST" id="checkout_form" onsubmit="validate(event);">
            @csrf
            <div class="tab-content mt-0 shadow">
                <div class="tab-pane active" id="tab_billing_info">
                    <br>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="mb-5">
                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label class="control-label font-weight-bold">Room &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                                <select name="checkout[ROOM_ID]" class=" form-control" style="height: 38px;" onchange="getCheckoutData(event);">
                                                    <option value="0">Please select room</option>
                                                    @foreach($reservations as $reservation)
                                                    <option value="{{ $reservation->room->id }}" data-cid="{{ $reservation->customer->id }}" data-roomid="{{ $reservation->room->id }}">{{ $reservation->room->floor }}/{{ $reservation->room->room_code }}/{{ $reservation->customer->customer_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('room'))
                                                <span class="text-danger">{{ $errors->first('room') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label class="control-label font-weight-bold">Billed To</label>
                                                <select class="form-control" style="height: 38px;">
                                                    <option value="Self">Self</option>
                                                    <option value="Organization">Organization/3rd Party</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label class="control-label font-weight-bold">Checkout Date &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                                <input type="date" id="date" name="checkout[checkout_date]" class="form-control" style="height: 37px;" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label class="control-label font-weight-bold">Checkout Time &nbsp<span style="color: red; font-size: 12px">*</span></label>
                                                <input type="time" id="time" name="checkout[checkout_time]" class="form-control" style="height: 37px;" />
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label class="control-label text-center ">.</label>
                                                <div id="main_total_view" class="text-center" style="font-size: 22px; ">
                                                    0.00 PKR
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card">
                                            <div class="form-row">
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee Name</label>
                                                    <input type="text" name="checkout[payeename]" class="form-control" style="height: 33px;" placeholder="Enter payee's name" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Phone Number</label>
                                                    <input type="text" name="checkout[phonenumber]" class="form-control" style="height: 33px;" placeholder="Enter phone number" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee Email</label>
                                                    <input type="text" name="checkout[email]" class="form-control" style="height: 33px;" placeholder="Enter payee's email" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee Postal Code</label>
                                                    <input type="text" name="checkout[zipcode]" class="form-control" style="height: 33px;" placeholder="Postal code" />
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee City</label>
                                                    <input type="text" name="checkout[city]" class="form-control" style="height: 33px;" placeholder="Enter city" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee State</label>
                                                    <input type="text" name="checkout[state]" class="form-control" style="height: 33px;" placeholder="Enter payee's state" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee Country</label>
                                                    <input type="text" name="checkout[country]" class="form-control" style="height: 33px;" placeholder="Enter payee's country" />
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label class="control-label font-weight-bold" style="font-size: 15px">Payee Address</label>
                                                    <input type="text" name="checkout[address]" class="form-control" style="height: 33px;" placeholder="Enter payees's address" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_billing_room">
                    <br>
                    <table id="service_room" class="table table-responsive pl-3 pr-3" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Checkin Date</th>
                                <th>Checkin Time</th>
                                <th>Checkout Date</th>
                                <th>Checkout Time</th>
                                <th>Fare/Day</th>
                                <th>Days</th>
                                <th>Hours</th>
                                <th>Minutes</th>
                                <th class="text-left">Sub Total </th>
                            </tr>
                        </thead>
                        <tbody id="service_room_table_body">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>Rs <span id="roomcharges_view">0.00</span>/-</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_billing_details">
                    <br>
                    <table id="service_orders" class="table table-responsive pl-3 pr-3">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th class="text-left">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody id="service_order_table_body">
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th>Rs <span id="foodcharges_view">0.00</span>/-</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane card mt-0" id="tab_billing_complete">
                    <table id="" class="table mb-3">
                        <thead style="background-color: #e0e0e0">
                            <tr>
                                <th style="border: 2px solid #000; color: #000" class="font-weight-bold">Category</th>
                                <th style="border: 2px solid #000; color: #000" class="text-left font-weight-bold">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style=" line-height: 20px; border: 2px solid #000; color: #000">Room Charges (A)</td>
                                <td style=" line-height: 20px; border: 2px solid #000; color: #000" class="text-left"><span id="roomcharges">3352.00</span> PKR</td>
                            </tr>
                            <tr>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000">Food Charges (B)</td>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-left"><span id="foodcharges">3352.00</span> PKR</td>
                            </tr>
                            <tr>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-right text-bold">Tax (C)</td>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-left">
                                    <span id="taxcharges">0.00</span> PKR
                                </td>
                            </tr>
                            <tr>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-right text-bold">Deposit (D)</td>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-left"><span id="room_advance">0.00</span> PKR</td>
                            </tr>
                            <tr>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-right text-bold">Sub Total (A+B+C)</td>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-left font-weight-bold text-dark"><span id="subtotal">0.00</span> PKR</td>
                            </tr>
                            <tr>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-right text-bold">Total (A+B+C-D)</td>
                                <td style="line-height: 20px; border: 2px solid #000; color: #000" class="text-left font-weight-bold text-dark">
                                    <span id="totalcharges">3352.00</span> PKR
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <label class="control-label font-weight-bold" style="font-size: 15px">Tax Type</label>
                            <select class="form-control" style="height: 37px;" name="checkout[tax_type]" onchange="applyTax();">
                                <option value="none">N/A</option>
                                <option value="fixed">Fixed</option>
                                <option value="percent">%age</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="control-label font-weight-bold" style="font-size: 15px">Tax Amount</label>
                            <input onchange="applyTax();" type="number" step="0.01" min="0" class="form-control" style="height: 37px;" name="checkout[tax_amount]" placeholder="0.0">
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="control-label font-weight-bold" style="font-size: 15px">Payment Mode</label>
                            <select class="form-control" style="height: 37px;" name="checkout[payment_mode]">
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                                <option value="Online Payment">Online Payment</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="control-label font-weight-bold" style="font-size: 15px">Amount Paid</label>
                            <input onchange="showReturn(event)" style="height: 37px;" type="number" step="0.01" min="0" class="form-control" name="checkout[amount_paid]" placeholder="0.0">
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="checkout[note]" placeholder="Additional Notes"></textarea>
                        </div>
                        <div class="col-md-9 text-right mt-4">
                            <div class="">
                                Return : <span id="returncharges">00.00</span> PKR
                            </div>
                        </div>
                        <div class="col-md-3  text-right mt-3">

                            <input type="hidden" name="checkout[food_total]">
                            <input type="hidden" name="checkout[room_total]">
                            <input type="hidden" name="checkout[tax_charges]">
                            <input type="hidden" name="checkout[billing_total]">
                            <input type="hidden" name="checkout[room_advance]">
                            <input type="hidden" name="CID">
                            <input type="hidden" name="RID">
                            <input type="submit" class="btn" style="background-color: #0f172b; color: #fff;" value="Complete Checkout">
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->


            </div>
        </form>
        <!-- /.tab-content -->

    </div>



</main>

<script>
    var date = new Date();
    document.getElementById('date').valueAsDate = date;
    document.getElementById('time').value = date.toTimeString().substring(0, 5);
</script>

<script>
    var food_total = 0;
    var room_total = 0;
    var billing_total = 0;
    var taxcalculated = 0;
    var advance = 0;


    function validate(event) {
        let message = "";
        if ($('select[name="checkout[ROOM_ID]"]').val() == 0) {
            message = "Please Select Room\n";
        }
        //     else if($('input[name="checkout[payeename]"]').value.length <= 0){
        //        message = "Invalid Payee Name\n";
        //    }

        // console.log($('select[name="checkout[payment_mode]"]').val())
        // console.log(parseFloat($('input[name="checkout[amount_paid]"]').val()))
        else if ($('select[name="checkout[payment_mode]"]').val() !== "Credit" && parseFloat($('input[name="checkout[amount_paid]"]').val()) <= 0) {
            message = "Invalid Amount Paid. Please Select Payment Mode to \"Credit\" where applicable.\n";
        }

        if (message != "") {
            toastr.error(message);
            event.preventDefault();
            return false;
        }
        event.preventDefault();
        return false;
    }

    function getCheckoutData(event) {
        target = event.target;
        option = target.querySelectorAll('option')[target.selectedIndex];
        $('input[name="CID"]').value = option.getAttribute('data-cid');
        $('input[name="RID"]').value = target.value;
        advance = 0;
        data = "CID=" + option.getAttribute('data-cid') + "&RID=" + target.value + "&ROOM_ID=" + option.getAttribute('data-roomid');
        var CID = option.getAttribute('data-cid');
        var RID = target.value;
        var ROOM_ID = option.getAttribute('data-roomid');

        $.post('checkout/ajaxcheckout', {
                "_token": "{{ csrf_token() }}",
                data: JSON.stringify({
                    CID: CID,
                    RID: RID,
                    ROOM_ID: ROOM_ID
                })
            })
            .done(function(response) {

                var payee = response.reservation[0].customer;
                // console.log(payee.customer_name)
                //     resetData();
                //     checkoutdata = JSON.parse(response);
                // if (Object.keys(checkoutdata).indexOf('data') > -1) {

                //         payee = checkoutdata.data.customer;


                $('input[name="checkout[payeename]"]').val(payee.customer_name);
                $('input[name="checkout[phonenumber]"]').val(payee.mobile);
                $('input[name="checkout[email]"]').val(payee.email);

                $('input[name="checkout[city]"]').val(payee.city);
                // _e('input[name="checkout[state]"]').value = payee.state;
                $('input[name="checkout[country]"]').val(payee.country);

                $('input[name="checkout[address]"]').val(payee.address);

                var service_orders = response.service_order;
                // console.log(service_orders[0])
                var counter = 1;
                for (i = 0; i < service_orders.length; i++) {
                    addServiceOrder(counter, service_orders[i]);
                    food_total = parseFloat(food_total) + (parseFloat(service_orders[i].price) * parseFloat(service_orders[i].qty) - service_orders[i].discount);
                    counter++;
                }
                food_total = parseFloat(food_total).toFixed(2);

                checkout_date = $("input[name='checkout[checkout_date]']").val();
                checkout_time = $("input[name='checkout[checkout_time]']").val();
                // console.log(response.reservation[0].deposite)

                advance = parseFloat(response.reservation[0].deposite);
                cin_date = new Date(response.reservation[0].checkin_date + " " + response.reservation[0].checkin_time);
                cout_date = new Date(checkout_date + " " + checkout_time);
                // console.log(cin_date)
                // console.log(cout_date)

                // diff = new Date(cout_date.getTime() - cin_date.getTime());
                days = parseInt((cout_date.getTime() - cin_date.getTime()) / (24 * 3600 * 1000));
                hours = parseInt((cout_date.getTime() - cin_date.getTime()) / 3600000);
                minutes = parseInt((cout_date.getTime() - cin_date.getTime()) / 60000);
                if (hours < 0) {
                    hours = 24 - (-1 * hours);
                    days = days - 1;
                }
                // console.log((cout_date.getTime() - cin_date.getTime()) / (24 * 3600 * 1000))
                if (minutes < 0) minutes = 60 + (-1 * minutes);
                stay = days + " Day(s) " + hours + " Hour(s) " + minutes + " Minute(s)";
                subtotal = parseFloat((cout_date.getTime() - cin_date.getTime()) / (24 * 3600 * 1000)) * parseFloat(response.reservation[0].room.fare);
                room_total = parseFloat(subtotal).toFixed(2);
                // console.log(room_total)

                res = {
                    'checkin_time': response.reservation[0].checkin_time,
                    'checkin_date': response.reservation[0].checkin_date,
                    'checkout_time': checkout_time,
                    'checkout_date': checkout_date,
                    'fare': response.reservation[0].room.fare,
                    'days': days,
                    'hours' : hours,
                    'minutes' : minutes,
                    'subtotal': subtotal
                };

                addServiceRoom(1, res);
                updateTotal()


                //         ;
                //     } else {
                //         showMessage("error", "Error occoured please retry.")
                //     }
            });


    }

    function addServiceOrder(i, service) {
        // service_orders = $('#service_orders');
        var service_orders = document.querySelector('#service_orders');
        var tr = document.createElement("tr");
        tr.innerHTML = "<td>" + i + "</td><td>" + service.name + "</td><td>" + service.price + "</td><td>" + service.qty + "</td>" +
            "<td>" + service.discount + "</td><td>" + service.sub_total + "</td>";

        service_orders.appendChild(tr);

    }

    function addServiceRoom(i, service) {
        console.log(service)
        // service_room= _e('#service_room');
        var service_room = document.querySelector('#service_room');
        var tr = document.createElement("tr");
        tr.innerHTML = "<td>" + i + "</td><td>" + service.checkin_date + "</td><td>" + service.checkin_time +
            "</td><td>" + service.checkout_date + "</td><td>" + service.checkout_time + "</td>" +
            "<td>" + service.fare + "</td><td>" + service.days + "</td><td>" + service.hours + "</td><td>" + service.minutes + "</td><td>" + service.subtotal + "</td>";

        service_room.appendChild(tr);

    }

    function updateTotal() {
        $("#foodcharges").html(food_total);
        $("#foodcharges_view").html(food_total);
        $("#roomcharges").html(room_total);
        $("#roomcharges_view").html(room_total);
        $("#room_advance").html(advance);
        $("input[name='checkout[food_total]']").val(food_total);
        $("input[name='checkout[room_total]']").val(room_total);

        $("input[name='checkout[tax_charges]']").val(parseFloat(taxcalculated).toFixed(2));

        $("input[name='checkout[room_advance]']").val(advance);

        total = (parseFloat(room_total) + parseFloat(food_total)).toFixed(2);
        total = parseFloat(total) + parseFloat(taxcalculated);

        $('#subtotal').html(total);
        total = total - advance;

        $("#main_total_view").html(parseFloat(total).toFixed(2) + " PKR");
        $("#totalcharges").html(parseFloat(total).toFixed(2));
        $("#taxcharges").html(parseFloat(taxcalculated).toFixed(2));


        billing_total = total;
        $("input[name='checkout[billing_total]']").val(billing_total);

        // amount_paid = $("input[name='checkout[amount_paid]']").val();
        // showReturn(amount_paid);

    }

    function showReturn(event) {
        target = event.target;
        console.log(target.value)
        var amount_paid = parseFloat(target.value);
        var amount = amount_paid - billing_total;
        console.log(amount)
        // if (amount > 0) {
        //     amount = amount * -1;
        // }
        // console.log(amount)
        $('#returncharges').html(parseFloat(amount).toFixed(2));

    }

    // function resetData(){
    //     var date = new Date();
    //     document.getElementById('date').valueAsDate = date;
    //     document.getElementById('time').value = date.toTimeString().substring(0, 5);

    //     var service_orders = document.querySelector('#service_order_table_body');
    //     var service_room = document.querySelector('#service_room_table_body');

    //     service_orders.innerHTML = "";
    //     service_room.innerHTML = "";

    //     food_total = 0.00;
    //     room_total = 0.00;

    //     updateTotal();
    // }
    // window.addEventListener('load', function () {
    //   resetData();
    // });
</script>

@endsection
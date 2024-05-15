@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Add Daily Breakup</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #4A6FDC; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>

        <div class="contanier">
            <div class="nav-tabs-custom card ">
                <ul class="nav nav-tabs card-header">
                    <li class="active"><a href="#services" data-toggle="tab" aria-expanded="true">Services</a></li>
                    <li class="ml-3"><a href="#doctors" data-toggle="tab" aria-expanded="false">Doctors</a></li>
                    <li class="ml-3"><a href="#expenses" data-toggle="tab" aria-expanded="false">Expenses</a></li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="services">
                        <br>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                            @csrf
                                            <div class="mb-5">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Date</label>
                                                        <input type="date" disabled id="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="Date">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Service Name </label>
                                                        <input type="text" id="service_name" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">No of Patients</label>
                                                        <input type="number" id="no_of_patients" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Collection </label>
                                                        <input type="number" id="collection" class="form-control " placeholder="">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary float-right" onclick="addServiceData()"> +Add </button>
                                            </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table" id="">
                                                    <thead class=" text-primary">
                                                        <!-- <tr> -->
                                                        <th>S.No</th>
                                                        <th>Date</th>
                                                        <th>Service Name</th>
                                                        <th>No of Patients</th>
                                                        <th>Collection</th>
                                                        <!-- </tr> -->
                                                    </thead>
                                                    <tbody id="serviceBreakupTable">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary float-right mt-3" onclick="insertData()"> Insert </button> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="doctors">
                        <br>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                            @csrf
                                            <div class="">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Doctor Name </label>
                                                        <input type="text" id="doctor_name" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">No of Patients</label>
                                                        <input type="number" id="doctor_patients" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Pay Rate </label>
                                                        <input type="number" id="pay_rate" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Total Hours </label>
                                                        <input type="number" id="total_hours" class="form-control " placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Per Day Cost</label>
                                                        <input type="number" id="per_day_cost" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Collection </label>
                                                        <input type="number" id="doctor_collection" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label labels">. </label>
                                                        <button type="button" class="btn btn-primary float-right" onclick="addDoctorData()"> +Add </button>
                                                    </div>
                                                </div>

                                            </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table" id="doctorBreakupTable">
                                                    <thead class=" text-primary">
                                                        <!-- <tr> -->
                                                        <th>S.No</th>
                                                        <th>Date</th>
                                                        <th>Doctor Name</th>
                                                        <th>No of Patients</th>
                                                        <th>Pay Rate</th>
                                                        <th>Total Hours</th>
                                                        <th>Per Day Cost</th>
                                                        <th>Collection</th>
                                                        <!-- </tr> -->
                                                    </thead>
                                                    <tbody id="doctorBreakup">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- <button type="submit" class="btn btn-primary float-right mt-3" onclick="insertData()"> Insert </button> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="expenses">
                        <br>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                            <div class="mb-5">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Name</label>
                                                        <input type="text" id="expense_name" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Designation</label>
                                                        <input type="text" id="designation" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Pay Rate </label>
                                                        <input type="number" id="expense_pay_rate" class="form-control " placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label labels">Total Hours </label>
                                                        <input type="number" id="expense_total_hours" class="form-control " placeholder="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary " onclick="addExpenseData()"> +Add </button>
                                                    <button type="submit" class="btn btn-primary ml-2" onclick="insertData()"> Insert </button>
                                                </div>

                                            </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table" id="expenseBreakupTable">
                                                    <thead class=" text-primary">
                                                        <!-- <tr> -->
                                                        <th>S.No</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Pay Rate</th>
                                                        <th>Total Hours</th>
                                                        <th>Per Day Cost</th>
                                                        <th>Total Staff Cost</th>
                                                        <!-- </tr> -->
                                                    </thead>
                                                    <tbody id="expenseBreakup">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
        </div>


    </div>
</main>


<script>
    var serviceBreakup = [];
    var doctorBreakup = [];
    var expenseBreakup = [];

    function addServiceData() {
        var counter = 1;
        var date = document.getElementById("date").value;
        var service_name = document.getElementById("service_name").value;
        var collection = document.getElementById("collection").value;
        var no_of_patients = document.getElementById("no_of_patients").value;
        if (date === "" || service_name === "" || collection === "" || no_of_patients === "") {
            alert("Please fill all the fields.");
        } else {
            const data = {
                "date": date,
                "service_name": service_name,
                "collection": collection,
                "no_of_patients": no_of_patients
            }
            serviceBreakup.push(data);
            // console.log(serviceBreakup);
            let text = "<tbody name='userdata'>"
            for (let index = 0; index < serviceBreakup.length; index++) {
                counter = index + 1
                text += "<tr><td>" + counter + "</td><td>" + serviceBreakup[index].date + "</td><td>" + serviceBreakup[index].service_name + "</td><td>" + serviceBreakup[index].no_of_patients + "</td><td>" + serviceBreakup[index].collection + "</td></td>";
            }
            text += "</tbody>"
            document.getElementById("serviceBreakupTable").innerHTML = text;
            document.getElementById("service_name").value = '';
            document.getElementById("collection").value = '';
            document.getElementById("no_of_patients").value = '';
        }
    }

    function addDoctorData() {
        var counter = 1;
        var date = document.getElementById("date").value;
        var doctor_name = document.getElementById("doctor_name").value;
        var doctor_patients = document.getElementById("doctor_patients").value;
        var pay_rate = document.getElementById("pay_rate").value;
        var total_hours = document.getElementById("total_hours").value;
        var per_day_cost = document.getElementById("per_day_cost").value;
        var doctor_collection = document.getElementById("doctor_collection").value;
        if (date === "" || doctor_name === "" || doctor_patients === "" || pay_rate === "" || total_hours === "" || per_day_cost === "" || doctor_collection === "") {
            alert("Please fill all the fields.");
        } else {
            const data = {
                "date": date,
                "doctor_name": doctor_name,
                "doctor_patients": doctor_patients,
                "pay_rate": pay_rate,
                "total_hours": total_hours,
                "per_day_cost": per_day_cost,
                "doctor_collection": doctor_collection,
            }
            doctorBreakup.push(data);
            let text = "<tbody name='userdata'>"
            for (let index = 0; index < doctorBreakup.length; index++) {
                counter = index + 1
                text += "<tr><td>" + counter + "</td><td>" + doctorBreakup[index].date + "</td><td>" + doctorBreakup[index].doctor_name + "</td><td>" + doctorBreakup[index].doctor_patients + "</td><td>" + doctorBreakup[index].pay_rate + "</td><td>" + doctorBreakup[index].total_hours + "</td><td>" + doctorBreakup[index].per_day_cost + "</td><td>" + doctorBreakup[index].doctor_collection + "</td></tr>";
            }
            text += "</tbody>"
            document.getElementById("doctorBreakup").innerHTML = text;
            document.getElementById("doctor_name").value = '';
            document.getElementById("doctor_patients").value = '';
            document.getElementById("pay_rate").value = '';
            document.getElementById("total_hours").value = '';
            document.getElementById("per_day_cost").value = '';
            document.getElementById("doctor_collection").value = '';
        }
    }

    function addExpenseData() {
        var counter = 1;
        var date = document.getElementById("date").value;
        var expense_name = document.getElementById("expense_name").value;
        var designation = document.getElementById("designation").value;
        var pay_rate = document.getElementById("expense_pay_rate").value;
        var total_hours = document.getElementById("expense_total_hours").value;
        if (date === "" || expense_name === "" || designation === "" || pay_rate === "" || total_hours === "") {
            alert("Please fill all the fields.");
        } else {
            const data = {
                "date": date,
                "expense_name": expense_name,
                "designation": designation,
                "pay_rate": pay_rate,
                "total_hours": total_hours,
            }
            expenseBreakup.push(data);
            console.log(expenseBreakup);
            let text = "<tbody name='userdata'>"
            for (let index = 0; index < expenseBreakup.length; index++) {
                counter = index + 1
                text += "<td><td>" + counter + "</td><td>" + expenseBreakup[index].date + "</td><td>" + expenseBreakup[index].expense_name + "</td><td>" + expenseBreakup[index].designation + "</td><td>" + expenseBreakup[index].pay_rate + "</td><td>" + expenseBreakup[index].total_hours + "</td><td>" + 50 + "</td><td>" + 60 + "</td><td>" + 50 + "</td></tr>";
            }
            text += "</tbody>"
            document.getElementById("expenseBreakupTable").innerHTML = text;
            document.getElementById("expense_name").value = '';
            document.getElementById("designation").value = '';
            document.getElementById("pay_rate").value = '';
            document.getElementById("total_hours").value = '';
        }
    }

    function insertData() {
        var serviceBreakupTable = document.getElementById("serviceBreakupTable");
        var doctorBreakupTable = document.getElementById("doctorBreakup");
        if (serviceBreakupTable.rows.length < 1 && doctorBreakupTable.rows.length < 1) {
            alert('Please enter service or doctor data first');
        } else {
            var serviceData = [];
            var doctorData = [];
            var expenseData = [];
            var obj = {};
            // service data
            for (let index = 0; index < serviceBreakupTable.rows.length; index++) {
                var tableRow = serviceBreakupTable.rows[index];
                const tableRows = {
                    "date": tableRow.cells[1].innerText,
                    "service_name": tableRow.cells[2].innerText,
                    "no_of_patients": tableRow.cells[3].innerText,
                    "collection": tableRow.cells[4].innerText
                }
                serviceData.push(tableRows);
            }
            obj['service'] = serviceData;

            // doctors data
            for (let index = 0; index < doctorBreakupTable.rows.length; index++) {
                var tableRow = doctorBreakupTable.rows[index];
                const tableRows = {
                    "date": tableRow.cells[1].innerText,
                    "doctor_name": tableRow.cells[2].innerText,
                    "doctor_patients": tableRow.cells[3].innerText,
                    "pay_rate": tableRow.cells[4].innerText,
                    "total_hours": tableRow.cells[5].innerText,
                    "per_day_cost": tableRow.cells[6].innerText,
                    "doctor_collection": tableRow.cells[7].innerText
                }
                console.log(tableRows);
                doctorData.push(tableRows);
            }
            obj['doctor'] = doctorData;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '/admin/dailyBreakup',
                data: {
                    data: obj,
                    _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    console.log(data);
                    // window.location.href = "/admin/dailyBreakup";
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(data);

                },
            });
        }
    }
</script>



@endsection
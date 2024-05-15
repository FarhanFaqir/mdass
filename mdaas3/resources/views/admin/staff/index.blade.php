@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class=" mb-3">Manage Staff</h1>
            <!-- Add Back Button -->
            <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #4A6FDC; color: #fff;"><i class="fas fa-backward"></i></Button></a>
        </div>

        <!-- Add Revenue Button -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <Button class="btn btn-flat mb-2 m-t-5 btn-primary" data-toggle="modal" data-target="#createModal" style="color: #fff;">Add New Staff</Button>
            <button id="print" onclick="ExportToExcel('xlsx')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
        </div>

        <!-- Create Modal Start -->
        <div class="modal" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header d-flex">
                        <h4 class="modal-title">Please Enter Staff Details</h4>
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{url('admin/staff')}}">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <input type="Text" name="staff_name" id="staff_name" value="{{ old('staff_name') }}" class="form-control" placeholder="Staff Name">
                                    @if ($errors->has('staff_name'))
                                    <span class="text-danger">{{ $errors->first('staff_name') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <input type="text" name="designation" id="designation" value="{{ old('designation') }}" class="form-control" placeholder="Designation">
                                    @if ($errors->has('designation'))
                                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <input type="number" name="pay_rate" id="pay_rate" min="0" oninput='handleClick(this);' value="{{ old('pay_rate') }}" class="form-control" placeholder="Pay Rate">
                                    @if ($errors->has('pay_rate'))
                                    <span class="text-danger">{{ $errors->first('pay_rate') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 p-2">
                                    <input type="number" name="fixed_amount" id="fixed_amount" value="{{ old('fixed_amount') }}" class="form-control d-none" placeholder="Fixed Amount">
                                    @if ($errors->has('fixed_amount'))
                                    <span class="text-danger">{{ $errors->first('fixed_amount') }}</span>
                                    @endif
                                </div>
                            </div>


                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm m-b-30 m-t-30">Submit</button>
                                <button type="reset" name="reset" id="reset" class="btn btn-dark btn-sm m-b-30 m-t-30">Reset</button>
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- create model end -->

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body table-responsive">
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Staff Name</th>
                            <th>Designation</th>
                            <th>Pay Rate</th>
                            <th>Fixed Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $res)
                        <tr>
                            <td style="color: #383737;">{{ $loop->index + 1 }}</td>
                            <td style="color: #383737; font-weight: bold;">{{ $res->staff_name }}</td>
                            <td style="color: #383737; ">{{ $res->designation }}</td>
                            <td style="color: #383737;">${{ number_format($res->pay_rate,2) }}</td>
                            <td style="color: #383737;">${{ number_format($res->fixed_amount,2) }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{url('/admin/staff')}}/{{ $res->id }}/edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                <form class="ml-1" action="{{url('/admin/staff/delete')}}/{{ $res->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-xs" style="background-color: #e74a3b; color:#fff;" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>



<script type="text/javascript">
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>

<script>
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('datatablesSimple');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('Staff Details.' + (type || 'xlsx')));
    }
</script>

<script>
    function handleClick() {
        var pay_rate = document.getElementById("pay_rate").value;
        if (pay_rate == 0) {
            var fixed_amount = document.getElementById("fixed_amount");
            fixed_amount.classList.remove("d-none");
            // element.classList.add("required");
        } else {
            
                var fixed_amount = document.getElementById("fixed_amount");
                // fixed_amount.classList.remove("d-none");
                element.classList.add("d-none");
        }
    }
</script>


@endsection
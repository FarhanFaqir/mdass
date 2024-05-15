@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class="mb-3">Customers</h1>
            <!-- Add Back Button -->
            <div>
                <!-- <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #2306d5; color: #fff;"><i class="fas fa-backward"></i></Button></a> -->
                <button id="print" onclick="ExportToExcel('xlsx')" class=" btn btn-sm btn-primary mt-2"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
            </div>
        </div>

        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Customers</li>
            <a href="{{url('/admin/customer/create')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-fw fa-plus"></i> New Customer</Button></a>
        </ol>

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body" style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-stripped" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>CNIC/Passport</th>
                            <th>Country</th>
                            <th>Telephone</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer) 
                        <tr>
                            <td style="color: #000;">{{ $loop->index + 1 }}</td>
                            <td style="color: #000;">{{ $customer->customer_name }}</td>
                            <td style="color: #000;">{{ $customer->cnic_passport }}</td>
                            <td style="color: #000;">{{ $customer->country }}</td>
                            <td style="color: #000;">{{ $customer->tel_no }}</td>
                            <td style="color: #000;">{{ $customer->mobile }}</td>
                            <td style="color: #000;">{{ $customer->email }}</td>
                            <td style="color: #000;">
                                @if($customer->status == 1) 
                                 <a href="" class="btn btn-xs" style="background-color: #1cc88a; color: #fff" title="Checked In"> <i class="fa fa-sign-in-alt"></i>Checked  In</a>
                                @else
                                <a href="" class="btn btn-xs btn-danger" title="Checked Out"><i class="fa fa-sign-out-alt"></i>Checked Out</a>
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                        <a href="{{url('/admin/customer')}}/{{ $customer->id }}/edit" title="Eidt"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                        <form class="ml-1" action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs" title="Delete" style="background-color: #e74a3b; color:#fff;" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button>
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
    window.$(document).ready(function() {
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
            XLSX.writeFile(wb, fn || ('Customers.' + (type || 'xlsx')));
    }
</script>


@endsection
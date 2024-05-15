@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mr-2">
            <h2 class="mb-3">Reservations</h2>
            <!-- Add Back Button -->
            <div>
                <!-- <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #2306d5; color: #fff;"><i class="fas fa-backward"></i></Button></a> -->
                <button id="print" onclick="ExportToExcel('xlsx')" class=" btn btn-sm btn-primary mt-2"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
            </div>
        </div>

        <!-- <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Re</li>
            <a href="{{url('/admin/room/create')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-fw fa-plus"></i> New Room</Button></a>
        </ol> -->

        <!-- Datatable -->
        <div class="card mb-4 mt-0">
            <div class="card-body" style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-stripped" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Guest</th>
                            <th>Room</th>
                            <th>Checkin Date</th>
                            <th>Checkin Time</th>
                            <th>Checkout Date</th>
                            <th>Checkout Time</th>
                            <th>Vehicle No</th>
                            <th>Deposite</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td style="color: #000;">{{ $loop->index + 1 }}</td>
                            <td style="color: #000;">{{ $reservation->customer->customer_name }}</td>
                            <td style="color: #000;">{{ $reservation->room->floor }}-{{ $reservation->room->room_code }}</td>
                            <td style="color: #000;">{{ $reservation->checkin_date }}</td>
                            <td style="color: #000;">{{ $reservation->checkin_time }}</td>
                            <td style="color: #000;">{{ $reservation->checkout_date }}</td>
                            <td style="color: #000;">{{ $reservation->checkout_time }}</td>
                            <td style="color: #000;">{{ $reservation->vehicle_no }}</td>
                            <td style="color: #000;">{{ $reservation->deposite }}</td>
                            <td style="color: #000;">
                                @if($reservation->status == 1) 
                                 <button class="btn btn-xs d-flex" style="background-color: #1cc88a; color: #fff" title="Checked In"><i class="fa fa-sign-in-alt"></i>CheckedIn</button>
                                @else
                                <button class="btn btn-xs btn-danger" title="Checked Out"><i class="fa fa-sign-out-alt"></i>Checked Out</button>
                                @endif
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
            XLSX.writeFile(wb, fn || ('Reservations Data.' + (type || 'xlsx')));
    }
</script>


@endsection
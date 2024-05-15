@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class="mb-3">Rooms</h1>
            <!-- Add Back Button -->
            <div>
                <!-- <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #2306d5; color: #fff;"><i class="fas fa-backward"></i></Button></a> -->
                <button id="print" onclick="ExportToExcel('xlsx')" class=" btn btn-sm btn-primary mt-2"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
            </div>
        </div>

        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Rooms</li>
            <a href="{{url('/admin/room/create')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-fw fa-plus"></i> New Room</Button></a>
        </ol>

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body" style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-stripped" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Floor</th>
                            <th>Room Type</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Reserved?</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td style="color: #000;">{{ $loop->index + 1 }}</td>
                            <td style="color: #000;">{{ $room->room_code }}</td>
                            <td><img height="80px" width="150" src="{{ asset('uploads/rooms') }}/{{ $room->image }}"></td>
                            <td style="color: #000;">{{ $room->floor }}</td>
                            <td style="color: #000;">{{ $room->type }}</td>
                            <td style="color: #000;">{{ $room->capacity }}</td>
                            <td style="color: #000;">Rs. {{ $room->fare }}</td>
                            <td style="color: #000;">
                                @if($room->is_reserved) 
                                 <a href="" class="btn btn-xs btn-danger" title="Reserved"><i class='fa fa-times'></i> Reserved</a>
                                @else
                                  <a href="" class="btn btn-xs btn-primary" title="Available"><i class='fa fa-check'></i> Available</a>
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                @can('room-edit')
                                <a href="{{url('/admin/room')}}/{{ $room->id }}/edit" title="Edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                @endcan
                                @can('room-delete')
                                <form class="ml-1" action="{{ route('room.destroy', $room->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs" title="Delete" style="background-color: #e74a3b; color:#fff;" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button>
                                </form>
                                @endcan
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
            XLSX.writeFile(wb, fn || ('Rooms Data.' + (type || 'xlsx')));
    }
</script>


@endsection
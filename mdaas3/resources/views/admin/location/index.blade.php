@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
       
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active text-dark font-weight-bold">Manage Locations</li>
            <div>
            <a href="{{url('/admin/location/create')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-fw fa-plus"></i> New Location</Button></a>
            <a href="{{url('/admin/location/search')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Search Location</Button></a>
                <button id="print" onclick="ExportToExcel('xlsx')" class=" btn btn-sm btn-primary"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
            </div>
           
        </ol>

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body" style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-stripped" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Location Name</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Tehsil</th>
                            <th>Mineral</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $location) 
                            <tr>
                                <td style="color: #000;">{{ $loop->index + 1 }}</td>
                                <td style="color: #000;">{{ $location->location_name }}</td>
                                <td style="color: #000;">{{ $location->division }}</td>
                                <td style="color: #000;">{{ $location->district }}</td>
                                <td style="color: #000;">{{ $location->tehsil }}</td>
                                <td style="color: #000;">{{ $location->mineral }}</td>
                                <td style="color: #000;">{{ $location->latitude }}</td>
                                <td style="color: #000;">{{ $location->longitude }}</td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{url('/admin/location')}}/{{ $location->id }}/edit" title="Edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                    <form class="ml-1" action="{{ route('location.destroy', $location->id) }}" method="POST">
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
            XLSX.writeFile(wb, fn || ('Locations.' + (type || 'xlsx')));
    }
</script>


@endsection
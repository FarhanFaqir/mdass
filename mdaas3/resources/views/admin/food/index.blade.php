@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class="mb-3">Foods</h1>
            <!-- Add Back Button -->
            <div>
                <!-- <a href="{{ url()->previous() }}" title='back'><Button class="btn btn-sm mt-2" style="background-color: #2306d5; color: #fff;"><i class="fas fa-backward"></i></Button></a> -->
                <button id="print" onclick="ExportToExcel('xlsx')" class=" btn btn-sm btn-primary mt-2"><i class="fas fa-download fa-sm text-white-50"></i> Print</button>
            </div>
        </div>

        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Foods</li>
            <a href="{{url('/admin/food/create')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;"><i class="fas fa-fw fa-plus"></i> New Food</Button></a>
        </ol>

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body" style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-stripped" style="white-space: nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Food Name</th>
                            <th>Category</th>
                            <th>Cost</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Preparation Time </th>
                            <th>Is Ready? </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food) 
                            <tr>
                                <td style="color: #000;">{{ $loop->index + 1 }}</td>
                                <td style="color: #000;">{{ $food->code }}</td>
                                <td style="color: #000;">{{ $food->food_name }}</td>
                                <td style="color: #000;">{{ $food->category->name }}</td>
                                <td style="color: #000; width: 10%;">{{ $food->cost }} PKR</td>
                                <td style="color: #000;">{{ $food->price }} PKR</td>
                                <td style="color: #000;">{{ $food->qty }} PKR</td>
                                <td style="color: #000;">
                                    @if($food->duration) 
                                     {{ date('h:i A', strtotime($food->duration)) }}
                                    @endif
                                </td>
                                <td style="color: #000;" class="text-center">
                                    @if($food->is_ready) 
                                    <a href="" class="btn btn-xs btn-primary" title="Check"><i class='fa fa-check'></i></a>
                                    @else
                                    <a href="" class="btn btn-xs btn-danger font-weight-bold" title="Cross" style="font-size: 15px; padding: 0px 8px">X</a>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-end">
                                    <a href="{{url('/admin/food')}}/{{ $food->id }}/edit" title="Edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                    <form class="ml-1" action="{{ route('food.destroy', $food->id) }}" method="POST">
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
            XLSX.writeFile(wb, fn || ('Foods.' + (type || 'xlsx')));
    }
</script>


@endsection
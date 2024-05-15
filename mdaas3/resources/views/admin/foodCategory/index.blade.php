@extends('admin/layout')

@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between mt-2 mr-2">
            <h1 class="mb-3">Food Category</h1>
        </div>

        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Food Category</li>
        </ol>

        <div class="row m-1">
            <div class="col-md-4 p-3 card h-50">
                <form action="{{ route('foodCategory.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 control-label font-weight-bold">Name &nbsp<span style="color: red; font-size: 12px">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" placeholder="Category Name" value="{{ old('name') }}" class="form-control" />
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-4 control-label font-weight-bold">Description </label>
                            <div class="col-md-8">
                                <input type="text" name="description" id="description" placeholder="Description" value="{{ old('description') }}" class="form-control" />
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" name="submit" id="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <!-- Datatable -->
                <div class="card mb-4">
                    <div class="card-body" style="overflow-x:auto;">
                        <table id="datatablesSimple" class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category) 
                                <tr>
                                    <td style="color: #000;">{{ $loop->index + 1 }}</td>
                                    <td style="color: #000;">{{ $category->name }}</td>
                                    <td style="color: #000;">{{ $category->description }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{url('/admin/foodCategory')}}/{{ $category->id }}/edit" title="Eidt"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                        <form class="ml-1" action="{{ route('foodCategory.destroy', $category->id) }}" method="POST">
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
        </div>
    </div>

</main>



<script type="text/javascript">
    window.$(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>

@endsection
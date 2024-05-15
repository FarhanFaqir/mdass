@extends('admin/layout')

@section('content')
<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Users</li>
            <a href="{{url('/admin/register')}}?id={{Auth::user()->id}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Add New User</Button></a>
        </ol>

            <!-- Datatable -->
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count((array)$data))
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                
                                <td>
                                    <a href="{{url('/admin/user/editUser')}}?id={{ $d->id }}" title="Edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                    <a href="{{url('/admin/user/delete')}}?id={{ $d->id }}" title="Delete"><button type="button" class="btn btn-xs" style="background-color: #e74a3b; color:#fff;" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
</main>
<!-- Layout Content End-->

<script type="text/javascript">
    window.$(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>

@endSection
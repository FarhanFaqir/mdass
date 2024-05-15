@extends('admin/layout')

@section('content')
<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles</h1>
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Manage Roles</li>
            @can('role-create')
            <a href="{{ route('roles.create') }}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Add New Role</Button></a>
            @endcan
        </ol>
        
            <!-- Datatable -->
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a href="{{ route('roles.show',$role->id) }}" title="View"><button type="button" class="btn btn-xs" style="background-color: #4e73df; color: #fff;"><i class="fa fa-folder-open"></i></button></a>
                                    @can('role-edit')
                                    <a href="{{ route('roles.edit',$role->id) }}" title="Edit"><button type="button" class="btn btn-xs" style="background-color: #5a5c69; color:#fff;"><i class="fas fa-edit"></i></button></a>
                                    @endcan
                                    @can('role-delete')
                                    <a href="{{ url('role/delete') }}?id={{$role->id}}" title="Delete"><button type="button" class="btn btn-xs" style="background-color: #e74a3b; color:#fff;" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                                    @endcan

                                    <!-- @can('role-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-xs'], ) !!}
                                    {!! Form::close() !!}
                                    @endcan -->
                                </td>
                            </tr>
                            </tr>
                            @endforeach
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
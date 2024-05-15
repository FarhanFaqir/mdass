@extends('admin/layout')

@section('content')
<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles</h1>
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">View Role</li>
            <a href="{{route('roles.index')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Back</Button></a>
        </ol>

        <!-- Datatable -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permissions:</strong> <br>
                        <div class="row d-flex p-2">
                        @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="col-md-2 label bg-dark m-1">{{ $v->name }},</label>                    
                        @endforeach
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<!-- Layout Content End-->

@endSection
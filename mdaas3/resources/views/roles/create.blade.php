@extends('admin/layout')


@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles</h1>
        <ol class="breadcrumb mb-2">
            <li class="breadcrumb-item active"> Add Role</li>
        </ol>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Role Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>User Permission:</strong>
                        <br />
                        <div class="row">
                            @foreach( $user_permission as $permission)
                            <div class="form-check m-2 pl-4 d-inline">
                                    <input class="form-check-input border-color" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                                    <label class="form-check-label">
                                        {{ $permission->name}}
                                    </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group ">
                        <strong>Role Permission:</strong>
                        <br />
                        <div class="row">
                            @foreach( $role_permission as $permission)
                            <div class="form-check m-2 pl-4 d-inline">
                                <input class="form-check-input border-color" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                                <label class="form-check-label">
                                    {{ $permission->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Room Permission:</strong>
                        <br />
                        <div class="row">
                            @foreach( $room_permission as $permission)
                            <div class="form-check m-2 pl-4 d-inline">
                                    <input class="form-check-input border-color" type="checkbox" value="{{ $permission->id}}" name="permission[]">
                                    <label class="form-check-label">
                                        {{ $permission->name}}
                                    </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Add Role</button>
                </div>
            </div>
            {!! Form::close() !!}
</main>


@endsection
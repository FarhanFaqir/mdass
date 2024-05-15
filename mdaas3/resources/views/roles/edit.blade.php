@extends('admin/layout')


@section('content')

<!-- Layout Content Start-->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Roles</h1>
        <ol class="breadcrumb d-flex justify-content-between">
            <li class="breadcrumb-item active">Edit Role</li>
            <a href="{{route('roles.index')}}"><Button class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Back</Button></a>
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


        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    <div class="row d-flex p-1">
                    @foreach($permission as $value)
                    <label class="m-1 p-1">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br />
                    @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-sm" style="background-color: #0f172b; color: #fff;">Update</button>
            </div>
        </div>
        {!! Form::close() !!}
</main>


@endsection
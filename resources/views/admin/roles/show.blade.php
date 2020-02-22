@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card card-primary card-outline">
                <div class="card-header text-center">
                    <h1>{{$role->name}}</h1>
                </div>
                <div class="card-body box-profile">
                    <h3>El rol tiene ámbito:</h3>
                    <li class="ml-3">{{ $role->guard_name }}</li>
                    <h3>Tiene los siguientes permisos:</h3>
                    @foreach($role->permissions->pluck('name') as $permission)
                        <li class="ml-3">{{ $permission }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

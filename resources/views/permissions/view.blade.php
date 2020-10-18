@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Permission</h2></div>

                <div class="card-body">
                    @include('custom.message')
                      <form action="{{route('permission.show',$permission->id)}}" method="GET">
                        @csrf

                    <div class="containter">
                        <h3>Permission Data</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name',$permission->name) }}" required readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug',$permission->slug) }}" required readonly>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" required readonly>{{ old('description',$permission->description )}}
                            </textarea>
                        </div>
                        <hr>

                        @if($permission->hasRoles())
                            <h3>Roles List</h3>
                            @foreach($permission->roles as $role)

                                <div class="custom-control custom-checkbox">
                                        {{$role->id}}
                                        -
                                        {{$role->name}}
                                        <em>( {{$role->description}})</em>

                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a  class="btn btn-warning btn-sm" href="{{ route('permission.edit',$permission->id)}}">Edit</a>
                    <a  class="btn btn-danger btn-sm" href="{{ route('permission.index')}}">Back</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


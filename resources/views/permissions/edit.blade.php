@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Permission</h2></div>

                <div class="card-body">
                    @include('custom.message')
                      <form action="{{route('permission.update',$permission->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="containter">
                        <h3>Required Data</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name',$permission->name) }}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug',$permission->slug) }}"required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" required>{{ old('description',$permission->description )}}
                            </textarea>
                        </div>
                        <hr>

                        <h4>Roles List</h4>


                        @foreach($roles as $role)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                    class="custom-control-input"
                                    id="role_{{$role->id}}"
                                    value="{{$role->id}}"
                                    name="role[]"


                                    @if(is_array(old('role')) && in_array($role->id,old('role')))
                                        checked
                                    @elseif(is_array($role_permissions) && in_array("$role->id",$role_permissions))
                                        checked
                                     @endif
                                    >

                                <label class="custom-control-label" for="role_{{$role->id}}">
                                    {{$role->id}}
                                    -
                                    {{$role->name}}
                                    <em>( {{$role->description}})</em>
                                </label>

                            </div>
                        @endforeach


                    </div>

                    <input type="submit" value="Save" class="btn btn-primary">
                    <a  class="btn btn-danger btn-sm" href="{{ route('permission.index')}}">Back</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


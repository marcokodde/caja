@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2></div>

                <div class="card-body">
                    @include('custom.message')
                      <form action="{{route('role.show',$role->id)}}" method="GET">
                        @csrf

                    <div class="containter">
                        <h3>Required Data</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name',$role->name) }}" required readonly>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description" required readonly>{{ old('description',$role->description )}}
                            </textarea>
                        </div>
                        <hr>

                        <h4>Full Access?</h4>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fulaccessno" name="full_access"  class="custom-control-input" value="0"
                            disabled
                            @if($role['full_access'] == 0)
                                checked
                            @elseif(old('full_access') == 0)
                                checked
                            @endif

                            >
                            <label class="custom-control-label" for="fulaccessno">No</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="fullaccessyes" name="full_access" class="custom-control-input" value="1"
                            disabled
                            @if($role['full_access'] == 1)
                                checked
                            @elseif(old('full_access') == 1)
                                checked
                            @endif
                            >
                            <label class="custom-control-label" for="fullaccessyes">Yes</label>
                        </div>
                        @if($role->hasPermissions())
                            <h3>Permissions List</h3>
                            @foreach($role->permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                        class="custom-control-input"
                                        id="permission_{{$permission->id}}"
                                        disabled
                                        value="{{$permission->id}}"
                                        name="permission[]"
                                        @if(is_array(old('permission')) && in_array($permission->id,old('permission')))
                                            checked
                                        @elseif(is_array($permission_role) && in_array("$permission->id",$permission_role))
                                            checked
                                         @endif
                                        >

                                    <label class="custom-control-label" for="permission_{{$permission->id}}">
                                        {{$permission->id}}
                                        -
                                        {{$permission->name}}
                                        <em>( {{$permission->description}})</em>
                                    </label>

                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a  class="btn btn-warning btn-sm" href="{{ route('role.edit',$role->id)}}">Edit</a>
                    <a  class="btn btn-danger btn-sm" href="{{ route('role.index')}}">Back</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


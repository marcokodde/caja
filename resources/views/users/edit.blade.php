@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit User</h2></div>

                <div class="card-body">
                    @include('custom.message')
                      <form action="{{route('user.update',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="containter">
                        <h3>Required Data</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name',$user->name) }}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email',$user->email) }}"required>
                        </div>

                        <div class="form-group">
                            <select name="roles" id="roles" class="form-control col-md-3" >
                                @foreach($roles as $role)

                                    <option value="{{$role->id}}"
                                        @isset($user->roles[0]->name)
                                            @if($user->roles[0]->name == $role->name)
                                                selected
                                            @endif
                                        @endisset
                                        >
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <hr>

                    </div>

                    <input type="submit" value="Save" class="btn btn-primary">
                    <a  class="btn btn-danger btn-sm" href="{{ route('user.index')}}">Back</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


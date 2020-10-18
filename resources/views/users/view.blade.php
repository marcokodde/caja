@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>View User</h2></div>

                <div class="card-body">
                    @include('custom.message')
                      <form action="{{route('user.show',$user->id)}}" method="GET">
                        @csrf

                    <div class="containter">
                        <h3>Required Data</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name',$user->name) }}" required disabled>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email',$user->email) }}"required disabled>
                        </div>

                        <div class="form-group">
                            <select name="roles" id="roles" class="form-control col-md-3" disabled >
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
                    <a  class="btn btn-warning btn-sm" href="{{ route('user.edit',$user->id)}}">Edit</a>
                    <a  class="btn btn-danger btn-sm" href="{{ route('user.index')}}">Back</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


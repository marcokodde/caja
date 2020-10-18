@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>List of Roles</h2></div>
                @include('custom.message')
                <div class="card-body">

                   @if( Auth::user()->hasPermission('roles.create'))
                        <a class="btn btn-primary float-right mb-1" href="{{route('role.create')}}">Create A Role</a>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Full Access</th>
                            <th colspan="3" align="right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->description}}</td>
                                    <td align="center">
                                        <input type="checkbox" disabled="disabled"
                                        @if($role->full_access){
                                            checked="cheked"
                                        }
                                        @endif
                                        >
                                    </td>
                                    <td>
                                        @if( Auth::user()->hasPermission('roles.show'))
                                            <a  class="btn btn-secondary btn-sm" href="{{ route('role.show',$role->id)}}">Show</a>
                                        @endif
                                    </td>


                                    <td>
                                        @if( Auth::user()->hasPermission('roles.edit'))
                                            <a  class="btn btn-warning btn-sm" href="{{ route('role.edit',$role->id)}}">Edit</a>
                                        @endif
                                    <td>
                                        @if( Auth::user()->hasPermission('roles.destroy'))

                                        <form action="{{ route('role.destroy',$role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>List of Permissions</h2></div>
                @include('custom.message')
                <div class="card-body">

                   @if( Auth::user()->hasPermission('permissions.create'))
                        <a class="btn btn-primary float-right mb-1" href="{{route('permission.create')}}">Create A Permission</a>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th colspan="3" align="right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->slug}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td>
                                        @if( Auth::user()->hasPermission('permissions.show'))
                                            <a  class="btn btn-secondary btn-sm" href="{{ route('permission.show',$permission->id)}}">Show</a>
                                        @endif
                                    </td>


                                    <td>
                                        @if( Auth::user()->hasPermission('permissions.edit'))
                                            <a  class="btn btn-warning btn-sm" href="{{ route('permission.edit',$permission->id)}}">Edit</a>
                                        @endif
                                    <td>
                                        @if( Auth::user()->hasPermission('roles.destroy'))

                                        <form action="{{ route('permission.destroy',$permission->id)}}" method="post">
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
                    {{$permissions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

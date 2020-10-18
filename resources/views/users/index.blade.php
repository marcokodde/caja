@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>List of Users</h2></div>
                @include('custom.message')
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role(s)</th>
                            <th colspan="3" align="right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @isset($user->roles[0]->name)
                                            {{$user->roles[0]->name}}
                                        @endisset
                                    </td>
                                    <td>
                                        @can('view', [$user,['users.show','usersown.show']])
                                            <a  class="btn btn-secondary btn-sm" href="{{ route('user.show',$user->id)}}">Show</a>
                                        @endcan

                                    </td>

                                    <td>
                                       @can('update', [$user,['users.edit','usersown.edit']])
                                            <a  class="btn btn-warning btn-sm" href="{{ route('user.edit',$user->id)}}">Edit</a>
                                        @endcan

                                    <td>
                                        @if( Auth::user()->hasPermission('users.destroy'))

                                        <form action="{{ route('user.destroy',$user->id)}}" method="post">
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">List des utlisateur</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Non</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('admin.users.edit',$user->id )}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{route('admin.users.destroy',$user->id )}}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprime</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <br>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

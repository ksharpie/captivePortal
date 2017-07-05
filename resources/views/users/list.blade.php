@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="/users">Users</a></li>
                        <li role="presentation"><a href="/">Home</a></li>
                        @if (Auth::user()->id == 1)
                          <li role="presentation" class="text-right pull-right"><a href="/new-user">Create New User</a></li>
                        @endif
                    </ul>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email address</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td><a href="/users/{{$user->id}}">{{ $user->name }}</a></td>
                            <td><a href="/users/{{$user->id}}">{{ $user->email }}</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

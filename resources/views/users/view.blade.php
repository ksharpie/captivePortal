@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/users">Go Back</a></li>
                          @if (Auth::user()->id == 1 and $user->id != 1)
                            <li role="presentation"><a href="/users/delete/{{$user->id}}">Delete User</a></li>
                          @endif
                      </ul>
                  </div>

                  <div class="panel-body">
                    <form method="POST" action="/edit-user/{{$user->id}}">
                      {{ method_field('PATCH')}}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group required">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        <div class="form-text text-muted">@if (array_key_exists('name', $errors->toArray())) {{ $errors->toArray()['name'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="email" class="control-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        <div class="form-text text-muted">@if (array_key_exists('email', $errors->toArray())) {{ $errors->toArray()['email'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="form-text text-muted">@if (array_key_exists('password', $errors->toArray())) {{ $errors->toArray()['password'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="password_confirmation" class="control-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation')}}">
                        <div class="form-text text-muted">@if (array_key_exists('password_confirmation', $errors->toArray())) {{ $errors->toArray()['password_confirmation'][0] }} @endif</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

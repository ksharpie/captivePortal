@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/users">Go Back</a></li>
                      </ul>
                  </div>
                  <div class="panel-body">
                    <form method="POST" action="/new-user" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group required">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                        <div class="form-text text-muted">@if (array_key_exists('name', $errors->toArray())) {{ $errors->toArray()['name'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="email" class="control-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                        <div class="form-text text-muted">@if (array_key_exists('email', $errors->toArray())) {{ $errors->toArray()['email'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}">
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

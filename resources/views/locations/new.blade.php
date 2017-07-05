@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/locations">Go Back</a></li>
                      </ul>
                  </div>
                  <div class="panel-body">
                    <form method="POST" action="/new-location" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group required">
                        <label for="location_name" class="control-label">Location Name</label>
                        <input type="text" class="form-control" id="location_name" name="location_name" value="{{ old('location_name')}}">
                        <div class="form-text text-muted">@if (array_key_exists('location_name', $errors->toArray())) {{ $errors->toArray()['location_name'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="location_address" class="control-label">Location Address</label>
                        <input type="location_address" class="form-control" id="location_address" name="location_address" value="{{ old('location_address')}}">
                        <div class="form-text text-muted">@if (array_key_exists('location_address', $errors->toArray())) {{ $errors->toArray()['location_address'][0] }} @endif</div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

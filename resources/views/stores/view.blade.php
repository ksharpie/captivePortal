@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/stores">Go Back</a></li>
                          <li role="presentation"><a href="/stores/delete/{{$store->id}}">Delete Company</a></li>
                      </ul>
                  </div>

                  <div class="panel-body">
                    <form method="POST" action="/edit-store/{{$store->id}}">
                      {{ method_field('PATCH')}}

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" value="{{ $store->company_name }}">
                      </div>
                      <div class="form-group">
                        <label for="serviceDescription">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="service_description" rows="3">{{ $store->service_description }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="telephoneNumber">Telephone Number</label>
                        <input type="text" class="form-control" id="telephoneNumber" name="telephone_number" value="{{ $store->telephone_number }}">
                      </div>
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $store->website }}">
                      </div>

                      @if($store->has_logo)
                        <div class="form-group">
                          <label for="website">Company Logo</label><br/>
                          <image src="{{$store->logo_path}}" class="img-thumbnail" style="height:200px; width:200px;"></image>
                        </div>
                      @endif
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

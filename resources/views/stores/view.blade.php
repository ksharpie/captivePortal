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
                      <div class="form-group required">
                        <label for="companyName" class="control-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" value="{{ $store->company_name }}">
                        <div class="form-text text-muted">@if (array_key_exists('company_name', $errors->toArray())) {{ $errors->toArray()['company_name'][0] }} @endif</div>
                      </div>
                      <div class="form-group required">
                        <label for="locationId" class="control-label">Company Location</label>
                        <select class="form-control" id="locationId" name="location_id">
                          <option value="">Please select a location</option>
                          @foreach ($locations as $location)
                            @if ($location->id == $store->location_id)
                              <option value="{{ $location->id }}" selected="selected">{{ $location->location_name }}</option>
                            @else
                              <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endif
                          @endforeach
                        </select>
                        <div class="form-text text-muted">@if (array_key_exists('location_id', $errors->toArray())) {{ $errors->toArray()['location_id'][0] }} @endif</div>
                      </div>
                      <div class="form-group required">
                        <label for="serviceDescription" class="control-label">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" name="service_description" rows="3">{{ $store->service_description }}</textarea>
                        <div class="form-text text-muted"> @if (array_key_exists('service_description', $errors->toArray())) {{ $errors->toArray()['service_description'][0] }} @endif </div>
                      </div>
                      <div class="form-group required">
                        <label for="telephoneNumber" class="control-label">Telephone Number</label>
                        <input type="text" class="form-control" id="telephoneNumber" name="telephone_number" value="{{ $store->telephone_number }}">
                        <div class="form-text text-muted"> @if (array_key_exists('telephone_number', $errors->toArray())) {{ $errors->toArray()['telephone_number'][0] }} @endif </div>
                      </div>
                      <div class="form-group required">
                        <label for="website" class="control-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{ $store->website }}">
                        <div class="form-text text-muted"> @if (array_key_exists('website', $errors->toArray())) {{ $errors->toArray()['website'][0] }} @endif </div>
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

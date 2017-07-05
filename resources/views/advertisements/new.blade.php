@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/">Go Back</a></li>
                      </ul>
                  </div>
                  <div class="panel-body">
                    <form method="POST" action="/new-advertisement" enctype="multipart/form-data">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group required">
                        <label for="companyName" class="control-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" value="{{ old('company_name')}}">
                        <div class="form-text text-muted">@if (array_key_exists('company_name', $errors->toArray())) {{ $errors->toArray()['company_name'][0] }} @endif</div>
                      </div>

                      <div class="form-group required">
                        <label for="offer" class="control-label">Offer</label>
                        <textarea class="form-control" id="offer" rows="3" name="offer">{{ old('offer')}}</textarea>
                        <div class="form-text text-muted">@if (array_key_exists('offer', $errors->toArray())) {{ $errors->toArray()['offer'][0] }} @endif</div>
                      </div>
                      <div class="form-group required">
                        <label for="expiryDate" class="control-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiryDate" name="expiry_date" value="{{ old('expiry_date')}}">
                        <div class="form-text text-muted">@if (array_key_exists('expiry_date', $errors->toArray())) {{ $errors->toArray()['expiry_date'][0] }} @endif</div>
                      </div>
                      <div class="form-group required">
                        <label for="category" class="control-label">Advertisement Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category')}}">
                        <div class="form-text text-muted">@if (array_key_exists('category', $errors->toArray())) {{ $errors->toArray()['category'][0] }} @endif</div>
                      </div>
                      <div class="form-group required">
                        <label for="advertisement_logo" class="control-label">Advertisement Logo</label>
                        <input type="file" class="form-control" id="advertisement_logo" name="advertisement_logo">
                        <div class="form-text text-muted">@if (array_key_exists('advertisement_logo', $errors->toArray())) {{ $errors->toArray()['advertisement_logo'][0] }} @endif</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/">Go Back</a></li>
                          <li role="presentation"><a href="/advertisements/delete/{{$advertisement->id}}">Delete Advertisement</a></li>
                      </ul>
                  </div>

                  <div class="panel-body">
                    <form method="POST" action="/edit-advertisement/{{$advertisement->id}}">
                      {{ method_field('PATCH')}}

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name" value="{{ $advertisement->company_name }}">
                      </div>
                      <div class="form-group">
                        <label for="offer">Offer</label>
                        <textarea class="form-control" id="offer" rows="3" name="offer">{{ $advertisement->offer }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="text" class="form-control" id="expiryDate" name="expiry_date" value="{{ $advertisement->expiry_date }}">
                      </div>
                      <div class="form-group">
                        <label for="category">Advertisement Category</label>
                        <input type="text" class="form-control" id="category"  name="category" value="{{ $advertisement->category }}">
                      </div>
                      @if($advertisement->has_logo)
                        <div class="form-group">
                          <label for="website">Advertisement Logo</label><br/>
                          <image src="{{$advertisement->logo_path}}" class="img-thumbnail" style="height:200px; width:200px;"></image>
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

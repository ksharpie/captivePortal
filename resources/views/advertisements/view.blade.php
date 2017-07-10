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

                      <div class="form-group required">
                        <label for="companyName" class="control-label">Company</label>
                        <select type="text" class="form-control" id="companyName" name="store_id">
                          <option value="">Please select a company</option>
                          @foreach ($stores as $store)
                            @if ($store->id == $advertisement->store_id)
                              <option value="{{ $store->id }}" selected="selected">{{ $store->company_name }}</option>
                            @else
                              <option value="{{ $store->id }}">{{ $store->company_name }}</option>
                            @endif
                          @endforeach
                        </select>
                        <div class="form-text text-muted">@if (array_key_exists('store_id', $errors->toArray())) {{ $errors->toArray()['store_id'][0] }} @endif</div>
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
                          <label for="website">Advertisement {{ $advertisement->category }}</label><br/>
                          @if ($advertisement->category == "Picture")
                            <image src="{{$advertisement->logo_path}}" class="img-thumbnail" style="height:200px; width:200px;"></image>
                          @else
                            <video autoplay loop style="height:200px; width:200px;">
                              <source src="{{ $advertisement->logo_path }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                          @endif
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

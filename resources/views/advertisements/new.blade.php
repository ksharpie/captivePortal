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

                      <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name">
                      </div>
                      <div class="form-group">
                        <label for="offer">Offer</label>
                        <textarea class="form-control" id="offer" rows="3" name="offer"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                      </div>
                      <div class="form-group">
                        <label for="category">Advertisement Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                      </div>
                      <div class="form-group">
                        <label for="advertisement_logo">Advertisement Logo</label>
                        <input type="file" class="form-control" id="advertisement_logo" name="advertisement_logo">
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

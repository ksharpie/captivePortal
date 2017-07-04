@extends('layouts.admin')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <ul class="nav nav-pills">
                          <li role="presentation"><a href="/stores">Go Back</a></li>
                      </ul>
                  </div>

                  <div class="panel-body">
                    <form method="POST" action="/new-store" enctype="multipart/form-data">

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                      <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control" id="companyName" name="company_name">
                      </div>
                      <div class="form-group">
                        <label for="serviceDescription">Service Description</label>
                        <textarea class="form-control" id="serviceDescription" rows="3" name="service_description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="telephoneNumber">Telephone Number</label>
                        <input type="text" class="form-control" id="telephoneNumber" name="telephone_number">
                      </div>
                      <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                      </div>
                      <div class="form-group">
                        <label for="company_logo">Company Logo</label>
                        <input type="file" class="form-control" id="company_logo" name="company_logo">
                      </div>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="/">Advertisements</a></li>
                        <li role="presentation"><a href="/stores">Stores</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Company Name</th>
                          <th>Offer</th>
                          <th>Expiry Date</th>
                          <th>Advertisement Category</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Kentucky Fried Chicken</td>
                          <td>20% off all fried chicken</td>
                          <td>20/6/2017</td>
                          <td>Picture</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

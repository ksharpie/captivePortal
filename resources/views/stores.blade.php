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
                          <th>Service Description</th>
                          <th>Telephone Number</th>
                          <th>Website</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Kentucky Fried Chicken</td>
                          <td>We Sell Fried Chicken</td>
                          <td>1876-565-7693</td>
                          <td>kfc.jm.com</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

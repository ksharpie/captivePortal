@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="/locations">Locations</a></li>
                        <li role="presentation"><a href="/">Home</a></li>
                        <li role="presentation" class="text-right pull-right"><a href="/new-location">Add New Location</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Location Name</th>
                          <th>Location Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($locations as $location)
                          <tr>
                            <td><a href="/locations/{{$location->id}}">{{ $location->location_name }}</a></td>
                            <td><a href="/locations/{{$location->id}}">{{ $location->location_address }}</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="/">Advertisements</a></li>
                        <li role="presentation" class="active"><a href="/stores">Stores</a></li>
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
                        @foreach ($stores as $store)
                          <tr>
                            <td><a href="/stores/{{$store->id}}">{{ $store->company_name }}</a></td>
                            <td><a href="/stores/{{$store->id}}">{{ $store->service_description }}</a></td>
                            <td><a href="/stores/{{$store->id}}">{{ $store->telephone_number }}</a></td>
                            <td><a href="/stores/{{$store->id}}">{{ $store->website }}</a></td>
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

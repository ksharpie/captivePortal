@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="/">Advertisements</a></li>
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
                        @foreach ($advertisements as $advertisement)
                          <tr>
                            <td><a href="/advertisements/{{$advertisement->id}}">{{ $advertisement->company_name }}</a></td>
                            <td><a href="/advertisements/{{$advertisement->id}}">{{ $advertisement->offer }}</a></td>
                            <td><a href="/advertisements/{{$advertisement->id}}">{{ $advertisement->expiry_date }}</a></td>
                            <td><a href="/advertisements/{{$advertisement->id}}">{{ $advertisement->category }}</a></td>
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

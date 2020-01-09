@extends('managers.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Restaurant Workers</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>LastName</th>
                            <th>DNI</th>
                            <th>Area</th>
                            <th>Admin?</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
    </div>
@endsection
@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h3 class="card-title">Hotel Clients</h3>
                    <a href="{{ route('client.create') }}" class="btn bg-newOjbect float-right">New Client</a>
                </div>
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>UserName</th>
                            <th>Room Number</th>
                            <th>Hotel Account</th>
                            <th>Enter date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Miguel</td>
                            <td>Cortez</td>
                            <td>Y4558259-4SD</td>
                            <td>Restaurant</td>
                            <td>Si</td>
                        </tr>
                        <tr>
                            <td>Miguelinho</td>
                            <td>Cortez</td>
                            <td>Z4558259-4SD</td>
                            <td>Room Service</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>Miquel</td>
                            <td>Chavez</td>
                            <td>Y4558259-4SF</td>
                            <td>Restaurant</td>
                            <td>NO</td>
                        </tr>
                        <tr>
                            <td>Marta</td>
                            <td>Bella</td>
                            <td>Y4csf8259-4SD</td>
                            <td>Pool</td>
                            <td>Si</td>
                        </tr>
                        <tr>
                            <td>Oriol</td>
                            <td>Cortes</td>
                            <td>Z4cfed59-4SD</td>
                            <td>Room Service</td>
                            <td>Si</td>
                        </tr>
                        <tr>
                            <td>M.Gaya</td>
                            <td>Cortes</td>
                            <td>Ycdss8259-4SF</td>
                            <td>Restaurant</td>
                            <td>NO</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
    </div>
@endsection